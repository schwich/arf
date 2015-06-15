<?php

  include_once '../includes/arf_config.php';

  session_start();
  $row = $model_users->get_user($_SESSION['user_id']);

  $is_logged_in = $arf->check_login();
  $is_admin = $arf->check_if_admin();

  $header = file_get_contents('./header.php');
  echo $header;
  
  $arf->print_contextual_header();

?>
<style>
    
    .editUser-container {
        padding-top: 80px;
    }

    .center {
        display: -webkit-flex;
        display: flex;
        -webkit-flex-direction: column;
        flex-direction: column;
        -webkit-align-items: center;
        align-items: center;
        -webkit-justify-content: center;
        justify-content: center;
    }

    .center-row {
        -webkit-flex-direction: row;
        flex-direction: row;
    }

    form {
        width: 400px;
        padding: 20px;
        padding-top: 8px;
    }

    .form-control, .btn-primary {
        height: 40px;
    }

    .form-control, label, .btn-primary {
        font-size: 16px;
    }

    .form-control:focus {
        border-color: #66b5ff;
    }
    
    input:-webkit-autofill {
        -webkit-box-shadow: 0 0 0px 1000px white inset;
    }

    label {
        letter-spacing: 1px;
        margin-bottom: 8px;
        margin-left: 3px;
    }

    h2 {
        font-weight: 200;
        letter-spacing: 3px;
    }

    .btn-primary {
        letter-spacing: 1px;
        width: 360px;
    }

    .btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:focus {
        background-color: #0084ff;
        border-color: #0084ff;
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
<div class="container editUser-container center">
    <h2>Account Info</h2>
    <form action='../controllers/updateUser.php' method='POST'>

        <div class='form-group'>
            <label for='username'>Username</label>
            <input type='text' name='username' class='form-control' value="<?php echo $row['username']; ?>" />
        </div>

        <div class='form-group'>
            <label for='user_email'>Email</label>
            <input type='email' name='user_email' class='form-control' value="<?php echo $row['email']; ?>" />
        </div>

        <div class='form-group'>
            <label for='user_firstname'>First Name</label>
            <input type="text" name='user_firstname' class="form-control" value="<?php echo $row['firstname']; ?>" />
        </div>

        <div class='form-group'>
            <label for='user_lastname'>Last Name</label>
            <input type="text" name='user_lastname' class="form-control" value="<?php echo $row['lastname']; ?>" />
        </div>

        <div class='form-group'>
            <label for='user_password'>Password</label>
            <input type="password" name='user_password' class="form-control" value="<?php echo $row['password']; ?>" />
        </div>

        <button type='submit' class='btn btn-primary' id="btn-update" style="margin-top: 20px;">Update Account Info</button>
    </form>