<?php
  include_once '../includes/arf_config.php';
  $is_logged_in = $arf->check_login();
if (!$is_logged_in) {
      // if not logged in, show message that you need to login, then 
      // redirect to login page
      echo "<script>var okPressed = confirm('You must be "
      . "logged in to send a message');"
              . "if (okPressed == true) {"
              . " window.location = 'loginForm.php'; }"
              . " else { window.location = window.history.back(); }</script>";
  }

  $header = file_get_contents('./header.php');
  echo $header;
  
  $arf->print_contextual_header();
?>

<style>
  #newMessage-wrapper {
    margin-top: 140px;
  }

  h2 {
    font-weight: 200;
    letter-spacing: 3px;
    padding-bottom: 10px;
  }

  .col-md-6 {
    width: 30%;
    margin-left: 36%;
  }

  @media (max-width: 2000px) {
    .col-md-6 {
      width: 60%;
      margin-left: 25%;
    }
  }

  #send-button {
    width: 100%;
    background-color: #0084ff;
    border-color: #0084ff;
    font-size: 18px;
    letter-spacing: 1px;
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
        <div class='container' id="newMessage-wrapper">
            <div class='row'>
                <div class='col-md-6 col-md-offset-3'>
                    <h2 class="header-style center"><center>Send a Message</center></h2>
                    <form action='../controllers/createMessage.php?post_id=<?php echo $_GET['post_id'] ?>' method='POST' style='padding: 10px;'>
                        
                        <div class="form-group"><strong>Your message:</strong>
                            <textarea class='form-control' name='message' rows="7"
                                      style="margin-top: 5px;" placeholder="Enter your message"></textarea>
                        </div>
                        
                        <div class='form-group'>
                            <input type='hidden' name='recipient_id' class='form-control' 
                                value="<?php echo $_POST['recipient_id']; ?>">
                        </div>
            
                        <button type='submit' class='btn btn-primary' id="send-button">Send Message</button>
                    </form>
                </div>
            </div>
        </div>

<?php
  $footer = file_get_contents('./shortFooter.php');
  echo $footer;
?>