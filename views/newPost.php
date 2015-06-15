<?php
  include_once '../includes/arf_config.php';
  $is_logged_in = $arf->check_login();
  if (!$is_logged_in) {
      // if not logged in, show message that you need to login, then 
      // redirect to login page
      echo "<script>var okPressed = confirm('You must be "
      . "logged in to put a pet up for adoption');"
              . "if (okPressed == true) {"
              . " window.location = 'loginForm.php'; }"
              . " else { window.location = window.history.back(); }</script>";
  }

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
</style>
<a href='../index.php' class='btn btn-default'>back to home page</a>
<div class='container'>
    <div class='row'>
        <div style='padding:80px;' class='col-md-6 col-md-offset-3'>
            <h2 class="header-style center"> Put your Pet up for Adoption </h2>
            <form action='../controllers/createPost.php' method='POST' style='padding: 20px;'
                  enctype="multipart/form-data">

                <div class='form-group'>
                    <label for='pet_name'>Pet name*</label>
                    <input type='text' name='pet_name' class='form-control' placeholder="Enter name of pet">
                </div>

                <div class='radio'><strong>Species*</strong>
                    <label class='radio-inline' style="margin-left: 10px;">
                        <input type='radio' name='species' value='cat'>
                        Cat
                    </label>
                    <label class='radio-inline'>
                        <input type='radio' name='species' value='dog'>
                        Dog
                    </label>
                </div>

                <div class='form-group'>
                    <label for='breed'>Breed*</label>
                    <input type="text" name='breed' class="form-control" placeholder='Enter breed'>
                </div>

                <div class='radio'><strong>Is pet sheltered or homed?*</strong>
                    <label class='radio-inline' style="margin-left: 10px;">
                        <input type='radio' name='pet_from' value='shelter'>
                        Shelter
                    </label>
                    <label class='radio-inline'>
                        <input type='radio' name='pet_from' value='home'>
                        Home
                    </label>
                </div>

                <div class='radio'><strong>Is pet spayed/neutered?*</strong>
                    <label class='radio-inline' style="margin-left: 10px;">
                        <input type='radio' name='spayed' value='yes'>
                        Yes
                    </label>
                    <label class='radio-inline'>
                        <input type='radio' name='spayed' value='no'>
                        No
                    </label>
                </div>

                <div class='radio'><strong>What sex is your pet?*</strong>
                    <label class='radio-inline' style="margin-left: 10px;">
                        <input type='radio' name='gender' value='male'>
                        Male
                    </label>
                    <label class='radio-inline'>
                        <input type='radio' name='gender' value='female'>
                        Female
                    </label>
                </div>

                <div class='form-group'>
                    <label for='breed'>Age*</label>
                    <input type="text" name='age' class="form-control" placeholder='Enter age (number of years only)'>
                </div>

                <div class="form-group"><strong>Pet biography*</strong>
                    <textarea class='form-control' name='pet_bio' rows="3"
                              style="margin-top: 5px;"></textarea>
                </div>

                <div class="form-group">
                    <label for="post_image_1">Image*</label>
                    <input class="form-control" type="file" name="post_image_1">
                </div>

                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" />

                <button type='submit' class='btn btn-primary'
                        style="margin-top: 20px;">Create Post</button>
                <br><i>*Required</i>
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
