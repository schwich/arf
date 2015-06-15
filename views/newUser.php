<?php
  include_once '../includes/arf_config.php';
  $is_logged_in = $arf->check_login();
  $is_admin = $arf->check_if_admin();

  $header = file_get_contents('./header.php');
  echo $header;
  
  $arf->print_contextual_header();
?>
<style>
    .controls {
        margin-left: 15px;
    }

    .controls .action {
        border-radius: 3px;
        border: 2px solid #fff;
        padding: 8px;
    }
    
    h2 {
        letter-spacing: 3px;
        font-weight: 200;
    }
    
    label {
        letter-spacing: 1px;
        font-size: 16px;
    }
    
    .form-control, .btn-primary {
        font-size: 16px;
        height: 40px;
    }
    
    .form-control:focus {
        border-color: #4ca8ff;
    }
    
    input:-webkit-autofill {
        -webkit-box-shadow: 0 0 0px 1000px white inset;
    }
    
    .btn-primary, .btn-primary:hover, .btn-primary:focus, .btn-primary:active {
        background-color: #0084ff;
        border-color: #0084ff;
        width: 100%;
        letter-spacing: 1px;
        font-size: 18px;
    }
    
    
    
    
</style>
        <a href='../index.php' class='btn btn-default'>back to home page</a>
        <div class='container'>
            <div class='row'>
                <div style='padding:80px;' class='col-md-6 col-md-offset-3'>
                    <h2 class="header-style center"> Sign up for an account </h2>
                    <form action='../controllers/createUser.php' method='POST' style='padding: 20px;'>
                        
                        <div class='form-group'>
                            <label for='username'>Username</label>
                            <input type='text' name='username' class='form-control' placeholder="Enter a username">
                        </div>
            
                        <div class='form-group'>
                            <label for='user_email'>Email</label>
                            <input type='email' name='user_email' class='form-control' placeholder="Enter your email address">
                        </div>
            
                        <div class='form-group'>
                            <label for='user_firstname'>First Name</label>
                            <input type="text" name='user_firstname' class="form-control" placeholder='Enter your first name'>
                        </div>
                        
                        <div class='form-group'>
                            <label for='user_lastname'>Last Name</label>
                            <input type="text" name='user_lastname' class="form-control" placeholder='Enter your last name'>
                        </div>
                        
                        <div class='form-group'>
                            <label for='user_password'>Password</label>
                            <input type="password" name='user_password' class="form-control" placeholder='Enter your password'>
                        </div>
            
                        <button type='submit' class='btn btn-primary'
                                style="margin-top: 20px;">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="../assets/js/app.js"></script>
<?php
  $footer = file_get_contents('./shortFooter.php');
  echo $footer;
?>


