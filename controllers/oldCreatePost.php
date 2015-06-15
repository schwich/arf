<?php
include_once "../includes/db_connect.php";
include_once "../includes/arf_config.php";

// values received from the form 
$pet_name = $_POST["pet_name"];
$species = $_POST["species"];
$breed = $_POST["breed"];
$pet_from = $_POST["pet_from"];

//$pet_bio = $_POST["pet_bio"];
//$pet_bio = substr(($arf->escape_string($_POST['pet_bio'])), 1, -2);
$pet_bio = $arf->escape_string($_POST['pet_bio']);

$spayed = $_POST['spayed'];
$gender = $_POST['gender'];
$age = intval($_POST['age']);

// the image received from the form
$image_file_1_path = "../images/" . basename($_FILES["post_image_1"]["name"]);

// get the image's MIME type
$imageFileType = pathinfo($_FILES['post_image_1']['name'], PATHINFO_EXTENSION);

// move the uploaded file into the images/ directory
move_uploaded_file($_FILES["post_image_1"]["tmp_name"], $image_file_1_path);

// record the image's width and height
list ($width, $height) = getimagesize($image_file_1_path);

// create thumbnail of primary image
$image_percent = 0.25;
$new_width = $width * $image_percent;
$new_height = $height * $image_percent;

// prepare thumbnail
$thumbnail = imagecreatetruecolor($new_width, $new_height);

// load image
if ($imageFileType == "jpg" || $imageFileType == "jpeg") {
    $image = imagecreatefromjpeg($image_file_1_path);
} else if ($imageFileType == "gif") {
    $image = imagecreatefromgif($image_file_1_path);   
} else if ($imageFileType == "png") {
    $image = imagecreatefrompng($image_file_1_path);
}

// resize image
imagecopyresampled($thumbnail, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

// image thumbnail file path
$thumbnail_path = $image_file_1_path . "_thumb";
        
// depending on filetype, create image
if ($imageFileType == "jpg" || $imageFileType == "jpeg") {
    imagejpeg($thumbnail, $thumbnail_path);
} else if ($imageFileType == "gif") {
    imagegif($thumbnail, $thumbnail_path); 
} else if ($imageFileType == "png") {
    imagepng($thumbnail, $thumbnail_path);
}

// insert values into database
try {
    include_once '../includes/arf_config.php';
    include_once '../includes/db_connect.php';
    
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
echo "<script>window.location = '../index.php'</script>";
