<?php
    include_once '../includes/arf_config.php';

    $post_id = $_GET['id'];

    $row = $model_animal_posts->get_post($post_id);

    session_start();
    
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
<div class='container'>
    <div class='row'>
        <div style='padding:80px;' class='col-md-6 col-md-offset-3'>
            <h2 class="header-style center"> Put your pet up for adoption </h2>
            <form action='../controllers/updatePost.php' method='POST' style='padding: 80px;'
                                      enctype="multipart/form-data">

                <div class='form-group'>
                    <label for='pet_name'>Pet name</label>
                    <input type='text' name='pet_name' class='form-control' value="<?php echo $row['pet_name'] ; ?>">
                </div>

                <div class='radio'><strong>Species</strong>
                    <label class='radio-inline' style="margin-left: 10px;">
                        <input type='radio' name='species' value='cat'  
                            <?php if ($row['species'] == 'cat') { echo "checked"; } ?> >
                        Cat
                    </label>
                    <label class='radio-inline'>
                        <input type='radio' name='species' value='dog'
                               <?php if ($row['species'] == 'dog') { echo "checked"; } ?> >
                        Dog
                    </label>
                </div>

                <div class='form-group'>
                    <label for='breed'>Breed</label>
                    <input type="text" name='breed' class="form-control" value="<?php echo $row['breed'] ; ?>">
                </div>

                <div class='radio'><strong>Sheltered or homed?</strong>
                    <label class='radio-inline' style="margin-left: 10px;">
                        <input type='radio' name='pet_from' value='shelter'
                               <?php if ($row['pet_from'] == 'shelter') { echo "checked"; } ?> >
                        Shelter
                    </label>
                    <label class='radio-inline'>
                        <input type='radio' name='pet_from' value='home'
                               <?php if ($row['pet_from'] == 'home') { echo "checked"; } ?> >
                        Home
                    </label>
                </div>

                <div class='radio'><strong>Is Pet Spayed?</strong>
                    <label class='radio-inline' style="margin-left: 10px;">
                        <input type='radio' name='spayed' value='yes'
                               <?php if ($row['spayed'] == 'yes') { echo "checked"; } ?> >
                        Yes
                    </label>
                    <label class='radio-inline'>
                        <input type='radio' name='spayed' value='no'
                               <?php if ($row['spayed'] == 'no') { echo "checked"; } ?> >
                        No
                    </label>
                </div>

                <div class='radio'><strong>Gender?</strong>
                    <label class='radio-inline' style="margin-left: 10px;">
                        <input type='radio' name='gender' value='male'
                               <?php if ($row['gender'] == 'male') { echo "checked"; } ?> >
                        Male
                    </label>
                    <label class='radio-inline'>
                        <input type='radio' name='gender' value='female'
                               <?php if ($row['gender'] == 'female') { echo "checked"; } ?> >
                        Female
                    </label>
                </div>

                <div class='form-group'>
                    <label for='breed'>Age</label>
                    <input type="text" name='age' class="form-control" value="<?php echo $row['age'] ; ?>">
                </div>

                <div class="form-group"><strong>Pet biography</strong>
                    <textarea class='form-control' name='pet_bio' rows="3"
                              style="margin-top: 5px;" value="<?php echo $row['pet_bio'] ; ?>"></textarea>
                </div>

                <div class="form-group">
                    <label for="post_image_1">Image</label>
                    <input class="form-control" type="file" name="post_image_1">
                </div>

                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" />
                <input type="hidden" name="post_id" value="<?php echo $row['id']; ?>" />

                <button type='submit' class='btn btn-primary'
                        style="margin-top: 20px;">update post details</button>
            </form>
        </div>
    </div>
</div>

<?php
  $footer = file_get_contents('./shortFooter.php');
  echo $footer;
?>