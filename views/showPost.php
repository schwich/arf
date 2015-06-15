<?php
  include_once '../includes/arf_config.php';
  $is_logged_in = $arf->check_login();
  $is_admin = $arf->check_if_admin();

  $header = file_get_contents('./header.php');
  echo $header;
  
  $arf->print_contextual_header();
?>
<style>
    .message-box {
        padding: 10px;
        background-color: #f8f8f8;
        margin-top: 30px;
    }
    
    #btn-contact {
        margin-top: 20px;
        background-color: #0084ff;
        border-color: #0084ff;
        width: 309px;
        font-size: 18px;
    }
    
    #btn-contact span {
        padding-right: 12px;
    }
    
    .table-bordered td {
        padding: 10px;
    }
    
    h2 {
        font-weight: 200;
        letter-spacing: 3px;
        margin-bottom: 25px;
    }
    
    .pet-image {
        border: 1px solid #ddd;
        padding: 10px;
        max-height: 100%;
        max-width: 100%;
    }
    
    .controls {
      margin-left: 15px;
    }

    .controls .action {
        border-radius: 3px;
        border: 2px solid #fff;
        padding: 8px;
    }
</style>
    <div class="container"style='padding: 80px;'>
        <div class="message-box">
            <h2>Pet Info</h2>
            <div class="row">
                <div class="col-md-4">
                    <table class="table-bordered">
                        <tbody>
                    <?php
                        include_once '../includes/db_connect.php';
                        include_once '../includes/arf_config.php';

                        // get id of post to show (sent via the form)
                        //$post_id_to_show = $_POST['post_id'];

                        // get the post's id from the query params
                        if (isset($_GET['id'])) {
                            try {
                               $row = $model_animal_posts->get_post($_GET['id']);

                               $recipient_id = $row['user_id'];
                                
                                echo "<tr><td>Name: </td><td>" . $row['pet_name'] . "</td></tr>";
                                echo "<tr><td>Species: </td><td>" . $row['species'] . "</td></tr>";
                                echo "<tr><td>Breed: </td><td>" . $row['breed'] . "</td></tr>";
                                echo "<tr><td>Sheltered or homed: </td><td>" . $row['pet_from'] . "</td></tr>";
                                echo "<tr><td>Age: </td><td>". $row['age'] . "</td></tr>";
                                echo "<tr><td>Spayed? </td><td>" . $row['spayed'] . "</td></tr>";
                                echo "<tr><td>Gender: </td><td>" . $row['gender'] . "</td></tr>";

                                $stripped_pet_bio = substr($row['pet_bio'], 0, -1);
                                echo "<tr><td>Pet bio: </td><td>" . $stripped_pet_bio . "</td></tr>";
                                
                                // Close table, and div.col-md-4
                                echo "</tbody>";
                                echo "</table>";
                                echo "</div>";
                                
                                // get the images associated with the post
                                $stmt = $db->prepare("SELECT image_file_path FROM animal_post_images "
                                    . "WHERE post_id = $row[id]");
                                $stmt->execute();
                                $row = $stmt->fetch();
                                
                                echo "<div class='col-md-4'>";
                                echo "<img class='pet-image' src=\"" . $row['image_file_path'] . "\">";
                                echo "</div>";

                            } catch (Exception $ex) {}
                        } 
                    ?>
                        
                    
        </div>
        <form action='../views/newMessage.php?post_id=<?php echo $_GET['id'] ?>' method="POST">
            <div class='form-group'>
                <input type='hidden' name='recipient_id' class='form-control' 
                       value="<?php echo $recipient_id; ?>">
            </div>
            <button type='submit' class='btn btn-primary' id="btn-contact">
                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>Contact Owner
            </button>
        </form>
    </div>
<?php
  $footer = file_get_contents('./shortFooter.php');
  echo $footer;
?>