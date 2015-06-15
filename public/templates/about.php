<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Admin Page">
    <meta name="author" content="JH">
    <title>Arf - About</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/app.css" />
  </head>
  <div class="container">
    <?php
      $header = file_get_contents('./header.php');
      echo $header;
    ?>
    <main id="about-region">
      <h2 class="header-style">About Us</h2>
      <section class="text">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mattis blandit mattis.</br> Vestibulum non euismod felis. In nec sodales justo. Duis id malesuada nisl. </br>Mauris efficitur augue nec cursus congue. Cras nibh nunc, tincidunt at tempor non, vehicula nec quam. Proin tempus augue vel libero elementum, at auctor mi mollis.
      </section>
      <section class="text">
        Donec dignissim euismod mauris eget ultricies. Curabitur nisi sapien, auctor et venenatis id, malesuada vitae ex. Integer congue viverra quam sit amet venenatis. Sed faucibus tellus vitae ipsum mollis tristique. Nullam euismod accumsan maximus. Nunc maximus semper magna at volutpat. Sed finibus erat id mattis feugiat. Nam sed consequat libero.
      </section>
      <section class="text">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mattis blandit mattis.</br> Vestibulum non euismod felis. In nec sodales justo. Duis id malesuada nisl. </br>Mauris efficitur augue nec cursus congue. Cras nibh nunc, tincidunt at tempor non, vehicula nec quam. Proin tempus augue vel libero elementum, at auctor mi mollis.
      </section>
      <section class="text">
        Donec dignissim euismod mauris eget ultricies. Curabitur nisi sapien, auctor et venenatis id, malesuada vitae ex. Integer congue viverra quam sit amet venenatis. Sed faucibus tellus vitae ipsum mollis tristique. Nullam euismod accumsan maximus. Nunc maximus semper magna at volutpat. Sed finibus erat id mattis feugiat. Nam sed consequat libero.
      </section>
    </main>
    <?php
      $footer = file_get_contents('./footer.php');
      echo $footer;
    ?>
  </div>

</body>
</html>
