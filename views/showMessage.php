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
        background-color: white;
        padding: 10px;
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
<div class='container' style="padding:80px;">
    <h2 class="header-style center"> Showing Message </h2>
<div class="message-box">
<?php

include_once '../includes/arf_config.php';

$message = $model_messages->get_message($_GET['id']);

echo "From: " . $message['sender_id'] . " (user ID number)<br>";

$stripped_message = substr($message['message'], 1, -1);
echo "<h3>" . $stripped_message . "</h3><br>";

//echo "<h3>" . $message['message'] . "</h3>";

echo "<i>Message Sent: ";
echo $message['created_at'] . "</i>";

?>
</div>




<form action='../controllers/createMessage.php' method='POST' >
                        
    <div class="form-group" style="margin-top: 60px;"><strong>Reply:</strong>
        <textarea class='form-control' name='message' rows="10"></textarea>
    </div>
                        
    <div class='form-group'>
        <input type='hidden' name='recipient_id' class='form-control' 
            value="<?php echo $message['sender_id']; ?>">
    </div>
            
    <button type='submit' class='btn btn-primary'
            style="margin-top: 20px;">Send Reply</button>
</form>
</div>

<?php
  $footer = file_get_contents('./shortFooter.php');
  echo $footer;
?>