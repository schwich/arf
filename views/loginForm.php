<?php
  include_once '../includes/arf_config.php';
  $is_logged_in = $arf->check_login();
  $is_admin = $arf->check_if_admin();

  $header = file_get_contents('./header.php');
  echo $header;
  
  $arf->print_contextual_header();
?>

<style>
  #login-wrapper {
    margin-top: 180px;
  }

  h2 {
    font-weight: 200;
    letter-spacing: 3px;
    padding-bottom: 10px;
  }

  .col-md-6 {
    width: 27%;
    margin-left: 36%;
  }

  @media (max-width: 700px) {
    .col-md-6 {
      width: 60%;
      margin-left: 20%;
    }
  }

  #login-button {
    width: 100%;
    background-color: #0084ff;
    border-color: #0084ff;
    font-size: 18px;
    letter-spacing: 1px;
  }

  #new-account {
    margin-top: 10px;
    font-size: 16px;
  }

  #new-account a {
    color: #000;
    text-decoration: underline;
    font-size: 18px;
  }

  #email, #password {
    width: 100%;
    height: 40px;
    padding-left: 17px;
    border-radius: 3px;
    outline: none;
    border: 1px solid #dfdfdf;
    font-size: 17px;
    margin: 12px 0px;
    margin-bottom: 20px;
  }
  
  .form-control {
      margin-bottom: 20px;
  }

  .form-control:focus {
    -webkit-box-shadow: none;
    box-shadow: none;
  }
  
  .controls {
      margin-left: 15px;
  }
  
  .controls .action {
      border-radius: 3px;
      border: 2px solid #fff;
      padding: 8px;
  }
  
  input:-webkit-autofill {
    -webkit-box-shadow: 0 0 0px 1000px white inset;
  }   
</style>

<div class='container' id="login-wrapper">
    <div class='row' style="padding-top: 50px;">
        <div class='col-md-6 col-md-offset-3'>
            <h2 class="header-style center">Log In</h2>
            <form action='../controllers/loginUser.php' method='POST'>
                <div class='form-group'>
                    <input id="email" type='email' name='user_email' class='form-control' placeholder="Enter your email address">
                </div>
                <div class='form-group'>
                    <input id="password" type="password" name='user_password' class="form-control" placeholder='Enter your password'>
                </div>
                <button type='submit' class='btn btn-primary' id="login-button">Log In</button>
                <div class='form-group center' id="new-account">
                    <a id="new-account" href="http://sfsuswe.com/~s15g09/views/newUser.php">New to Arf?</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
  function validateEmail (email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
  }

  $(document).ready(function onReady () {

    $('form').submit(function onSumbit (e) {
      var email, pword;

      email = $('#email').val();
      pword = $('#password').val();

      if (validateEmail(email) && pword.length > 0) {
        // Successful
      } else {
        e.preventDefault();
        alert('Required: Email and Password')
      }
    });
  });
</script>

<?php
  $footer = file_get_contents('./shortFooter.php');
  echo $footer;
?>
