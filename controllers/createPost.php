<?php
include_once "../includes/db_connect.php";
include_once "../includes/arf_config.php";
  
// define variables and set to empty values
$pet_name = $species = $gender = $breed = $pet_from = $pet_bio = $spayed = $age = "";

  // values received from the form 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$pet_name = test_input($_POST["pet_name"]);
$species = $_POST["species"];
$breed = test_input($_POST["breed"]);
$pet_from = $_POST["pet_from"];
//$pet_bio = substr(($arf->escape_string($_POST['pet_bio'])), 1, -2);
$pet_bio = test_input($arf->escape_string($_POST['pet_bio']));
$spayed = $_POST['spayed'];
$gender = $_POST['gender'];
$age = test_input(intval($_POST['age']));
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// the image received from the form
$random_name = substr( "abcdefghijklmnopqrstuvwxyz" ,mt_rand( 0, 20 ), 1 ) .substr( md5( time( ) ) ,1 );
$image_file_1_path = "../images/" . $random_name . basename($_FILES["post_image_1"]["name"]);

/*if ($_FILES["post_image_1"]["size"] < 500000) {
	// move the uploaded file into the images/ directory
	move_uploaded_file($_FILES["post_image_1"]["tmp_name"], $image_file_1_path);
	}
	else
		echo "<script>window.location = '../views/newPost.php'</script>";*/
        
move_uploaded_file($_FILES["post_image_1"]["tmp_name"], $image_file_1_path);

// get the image's MIME type
$imageFileType = pathinfo($_FILES['post_image_1']['name'], PATHINFO_EXTENSION);

// record the image's width and height
list ($width, $height) = getimagesize($image_file_1_path);

  $ratio = $width/$height;
  $height_dest = 140;
  //$width_dest = $height_dest * $ratio;
  $width_dest = 180;
  
  /* try resising raw image into something smaller */
  $new_height_dest = 500;
  $new_width_dest = $new_height_dest * $ratio;
  
  $smaller_image = imagecreatetruecolor($new_width_dest, $new_height_dest);
  if ($imageFileType == "jpg" || $imageFileType == "jpeg") {
    $new_image = imagecreatefromjpeg($image_file_1_path);
} else if ($imageFileType == "gif") {
    $new_image = imagecreatefromgif($image_file_1_path);   
} else if ($imageFileType == "png") {
    $new_image = imagecreatefrompng($image_file_1_path);
} else {
    $new_image = imagecreatefromjpeg($image_file_1_path);
}
imagecopyresampled($smaller_image, $new_image, 0, 0, 0, 0, $new_width_dest, $new_height_dest, $width, $height);
if ($imageFileType == "jpg" || $imageFileType == "jpeg") {
    imagejpeg($smaller_image, $image_file_1_path . "_r");
} else if ($imageFileType == "gif") {
    imagegif($smaller_image, $image_file_1_path . "_r"); 
} else if ($imageFileType == "png") {
    imagepng($smaller_image, $image_file_1_path . "_r");
} else {
    imagejpeg($smaller_image, $image_file_1_path . "_r");
}


// prepare thumbnail
$thumbnail = imagecreatetruecolor($width_dest, $height_dest);

// load image
if ($imageFileType == "jpg" || $imageFileType == "jpeg") {
    $image = imagecreatefromjpeg($image_file_1_path);
} else if ($imageFileType == "gif") {
    $image = imagecreatefromgif($image_file_1_path);   
} else if ($imageFileType == "png") {
    $image = imagecreatefrompng($image_file_1_path);
} else {
    $image = imagecreatefromjpeg($image_file_1_path);
}

// resize image
imagecopyresampled($thumbnail, $image, 0, 0, 0, 0, $width_dest, $height_dest, $width, $height);

// image thumbnail file path
$thumbnail_path = "../images/" . $random_name . "_thumb" . basename($_FILES["post_image_1"]["name"]);
        
// depending on filetype, create image
if ($imageFileType == "jpg" || $imageFileType == "jpeg") {
    imagejpeg($thumbnail, $thumbnail_path);
} else if ($imageFileType == "gif") {
    imagegif($thumbnail, $thumbnail_path); 
} else if ($imageFileType == "png") {
    imagepng($thumbnail, $thumbnail_path);
} else {
    imagejpeg($thumbnail, $thumbnail_path);
}

// insert values into database
try {
    include_once '../includes/arf_config.php';
    include_once '../includes/db_connect.php';
    
    // build sql statment to send to database
    
    // get user id from session 
    session_start();
    $user_id = $_SESSION['user_id'];
    
    $fields = array (
        'pet_name' => $pet_name,
        'species' => $species,
        'breed' => $breed,
        'pet_from' => $pet_from,
        'pet_bio' => $pet_bio,
        'age' => $age,
        'gender' => $gender,
        'spayed' => $spayed,
        'user_id' => $user_id
    );
    
    $last_id = $model_animal_posts->insert_post($fields);
    
    // now add the images (with the associated post_id info) to the 
    // animal_posts_images table
    $image_file_1_path = $image_file_1_path . "_r";
    $sql = "INSERT INTO animal_post_images(image_file_path, post_id, thumbnail)"
            . "VALUES ('$image_file_1_path', '$last_id', 'no')";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    
    // finally, insert the thumbnail
    $insert_thumb = "INSERT INTO animal_post_images(image_file_path, post_id, thumbnail)"
            . " VALUES ('$thumbnail_path', '$last_id', 'yes')";
    $thumb_stmt = $db->prepare($insert_thumb);
    $thumb_stmt->execute();

    
} catch (PDOEXCEPTION $e) {
    echo $e;
}

// now, redirect back to home page
echo "<script>window.location = '../views/showPost.php?id=$last_id'</script>";

