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
    <title>Arf - Signup</title>
    <style>
      main {
        margin-top: 125px;
      }

    </style>
  </head>
  <body id="signup-region">
    <?php
      $header = file_get_contents('./header.php');
      echo $header;
    ?>
    <main>
      <form action="/" id="login" action="/login" accept-charset="UTF-8" method="post">
        <section class="center">
          <h2 class="header-style">Sign Up</h2>
        </section>
        <section class="center">
          <input type="text" name="email" id="email" placeholder="Email Address" />
        </section>
        <section class="center">
          <input type="text" name="password" id="password" placeholder="Password" />
        </section>
        <section class="center">
          <button id="login-btn" type="submit">Sign Up</button>
        </section>
      </form>
      <section class="center">
        <span>By signing up, you agree to the <a href="terms.php">Terms of Service</a></span>
      </section>
    </main>
    <footer>
      <section class="center">
        <span>Already have an account? <a href="login.php">Log In</a></span>
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
