<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Admin Page">
    <meta name="author" content="JH">
    <title>Arf - Adopt</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/app.css" />
    <style>
      .form-group {
        padding-left: 30px;
      }

      #create-btn {
        width: 82%;
        margin-left: 30px;
      }

      .radio {
        padding-left: 30px;
      }
    </style>
  </head>
  <div class="container">
    <?php
      $header = file_get_contents('./header.php');
      echo $header;
    ?>
    <main id="adopt-region">
      <section class="center">
        <h2 class="header-style">Put Pet Up For Adoption</h2>
      </section>
      <form action="../controllers/createpost.php" method="POST" style="padding: 20px;" enctype="multipart/form-data">
        <div class="form-group">
          <!--<label for="pet_name">Pet name</label>-->
          <span>Pet name</span>
          <input type="text" name="pet_name" class="form-control flat" placeholder="Enter name of pet">
        </div>
        <div class="radio"><span>Species</span>
          <label class="radio-inline" style="margin-left: 10px;">
              <input id="cat" type="radio" name="species" value="cat">
              Cat
          </label>
          <label class="radio-inline">
              <input id="dog" type="radio" name="species" value="dog">
              Dog
          </label>
        </div>
        <div class="form-group">
          <!--<label for="breed">Breed</label>-->
          <span>Breed</span>
          <input type="text" name="breed" class="form-control flat" placeholder="Enter breed">
        </div>
        <div class="radio">
          <span>Sheltered or homed?</span>
          <label class="radio-inline" style="margin-left: 10px;">
              <input id="shelter" type="radio" name="pet_from" value="shelter">
              Shelter
          </label>
          <label class="radio-inline">
              <input id="home" type="radio" name="pet_from" value="home">
              Home
          </label>
        </div>
        <div class="form-group" id="upload-img-wrapper">
          <!--<label for="post_image_1">Image</label>-->
          <span>Image</span>
          <input id="upload-img" type="file" name="post_image_1">
        </div>
        <div class="form-group">
          <span>Pet biography</span>
          <textarea class="form-control flat" name="pet_bio" rows="3" style="margin-top: 5px;"></textarea>
        </div>
        <button id="create-btn" type="submit" class="btn btn-default">Create Post</button>
      </form>
    </main>
    <?php
      $footer = file_get_contents('./footer.php');
      echo $footer;
    ?>
  </div>

</body>
</html>
