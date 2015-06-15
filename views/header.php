<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Arf | pet connection</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <style>
    body {
      background-color: #f8f8f8;
      margin-bottom: 100px;
    }

    .navbar {
      background-color: #0084ff;
      border-color: #0084ff;
    }

    #header {
      color: #fff;
      font-size: 30px;
      font-weight: 200;
      letter-spacing: 3px;
    }

    #toggle-button {
      border: 1px solid white;
    }

    .action, .action:hover {
      color: #fff;
      padding: 10px;
      letter-spacing: 2px;
    }

    .action:hover {
      text-decoration: none;
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

    .navbar-left {
      padding-top: 15px;
    }

    .navbar-inverse .navbar-toggle:focus, .navbar-inverse .navbar-toggle:hover {
      background-color: #0084ff;
      border-color: #0084ff;
    }
    .navbar-inverse .navbar-toggle:focus, .navbar-inverse .navbar-toggle:hover {
      background-color: none;
      border-color: none;
    }
    
    #navbar {
        margin-left: -114px;
    }
    
    #header img {
        margin-top: -28px;
    }
    
    #project-disclaimer {
        color: #C7C7C7;
        font-size: 12px;
        text-align: center;
        margin-bottom: -3px;
        padding-top: 1px;
        letter-spacing: 0.8px;
    }
  </style>
</head>

<body style='margin-bottom: 10px;'>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    
   <p id="project-disclaimer">SFSU Class Project Disclaimer | Group 9 | Copyright © 2015 Arf Pet Connection</p>

    <div class="navbar-header">
      <button id="toggle-button" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" id="header" href="http://sfsuswe.com/~s15g09/"><img src="http://sfsuswe.com/~s15g09/public/images/logo.png" /></a>
    </div>

    <section id="navbar-container" class="center">
      <div id="navbar" class="navbar-collapse collapse">

        <div class="navbar-left">
          <a class="action" href="http://sfsuswe.com/~s15g09/views/newPost.php">PUT PET UP FOR ADOPTION</a>
        </div>

        <div class="navbar-left">
          <a class="action" href="http://sfsuswe.com/~s15g09/views/search.php">FIND PET</a>
        </div>

        <div class="navbar-left">
          <a class="action" href="http://sfsuswe.com/~s15g09/views/about.php">ABOUT</a>
        </div>

        <div class="navbar-left">
          <a class="action" href="http://sfsuswe.com/~s15g09/views/contact.php">CONTACT</a>
        </div>
    </div>
  </section>

  </div>
</nav>
