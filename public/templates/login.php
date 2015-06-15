<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Arf • Login UI">
    <meta name="author" content="JH">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/app.css" />
    <link rel="stylesheet" type="text/css" href="../css/header.css" />
    <title>Arf - Login</title>
    <style>
      main {
        margin-top: 130px;
      }
    </style>
  </head>
  <body>
    <?php
      $header = file_get_contents('./header.php');
      echo $header;
    ?>
    <main>
      <form action="/" id="login" action="/login" accept-charset="UTF-8" method="post">
        <section class="center">
          <h2 class="header-style">Log In</h2>
        </section>
        <section class="center">
          <input type="text" name="email" id="email" placeholder="Email Address" />
        </section>
        <section class="center">
          <input type="text" name="password" id="password" placeholder="Password" />
        </section>
        <section class="center">
          <button id="login-btn" type="submit">Log In</button>
        </section>
      </form>
    </main>
    <footer>
      <section class="center">
        <span><a href="/views/signup.php" style="color:black;text-decoration:underline;">New to Arf? Create an account</a></span>
      </section>
    </footer>
    <?php
      $footer = file_get_contents('./footer.php');
      echo $footer;
    ?>
  </body>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      $('form').on('submit', function (e) {
        e.prevetDefault();
      });
    });
  </script>
</html>
