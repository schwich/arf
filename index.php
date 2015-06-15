<?php
  include_once 'includes/arf_config.php';
  $is_logged_in = $arf->check_login();
  $is_admin = $arf->check_if_admin();

  $header = file_get_contents('./views/header.php');
  echo $header;
  
  $arf->print_contextual_header();
?>
<style>
  body {
    background-color: #f8f8f8;
  }

  .jumbotron {
    padding-top: 100px;
    height: 86%;
  }

  h2, h3 {
    font-weight: 200;
    letter-spacing: 2px;
  }

  #arf-description span, ul li {
    font-size: 17px;
  }

  #arf-description span {
    line-height: 33px;
  }

  .getting-started, .featured-pets {
    margin-top: 25px;
  }

  ul {
    list-style: none;
    list-style-type: decimal;
  }

  li {
    padding: 5px;
  }

  .getting-started a, a:hover {
    color: #0084ff;
    text-decoration: underline;
  }
  
  .getting-started ul li {
      list-style: decimal;
  }

  .jumbotron {
      background-color: #f8f8f8;
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

  .animal-card {
    width: 170px;
    border: 0px solid #dedede;
    border-radius: 5px;
    float: left;
    margin: 20px;
    box-shadow: 0px 2px 5px #888888;
  }

  .animal-card:hover {
    cursor: pointer;
  }

  .animal-card-description {
    height: 118px;
    background-color: #fff;
    padding-top: 17px;
    padding-left: 4px;
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 3px;
    border: 0px solid #dedede;
  }

  .animal-card-species {
    font-style: italic;
  }
  
  .animal-card li {
    font-size: 14px;
    margin: 0px;
  }

  .animal-card-name {
    font-weight: 500;
  }

  .animal-card-child-bg-color {
    background-color: #dedede;
    border-radius: 4px;
    padding: 2px 5px;
  }

  .animal-card img {
    border-radius: 3px;
    border-bottom-left-radius: 0px;
    border-bottom-right-radius: 0px;
  }

  li {
    list-style: none;
    margin: 13px 0px;
  }

  .animal-card-list {
    margin-top: -16px;
    margin-bottom: 10px;
    margin-left: -33px;
  }

  #card-container {
    border: 0px solid black;
    width: 662px;
    margin-top: 10px;
  }
  
  .featured-pets h3 {
      padding-left: 20px;
  }
  
  .featured-pets {
      margin-left: -30px;
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
<div class="jumbotron">
  <div class="container">
    <h2 class="header-style">Hi! Welcome to Arf!</h2>

    <section id="arf-description">
      <span>We exist to connect people with pets looking for a new home. Whether you’re looking for the perfect companion or putting a pet up for adoption, Arf is here to help!</span>
    </section>
    
    <div class="row">
        
      <div class="col-md-5 getting-started">
        <h3>Getting Started</h3>
        <ul>
          <li>Find pets to adopt by clicking <a href="views/search.php">here</a></li>
          <li>Put your pet up for adoption by clicking <a href="views/newPost.php">here</a></li>
          <li><a href="views/loginForm.php">Sign in</a> or <a href="views/newUser.php">register</a> for an account</li>
        </ul>
      </div>
       
      <div class="col-md-7 featured-pets">
        <h3>Featured Pets</h3>
        
        <div class="animal-card" onclick="window.document.location='views/showPost.php?id=8'">
            <section class="center">
                <img src="images/ice-cream-with-candy-sprinkles.jpg" height="140" width="170" />
            </section>
            <section class="animal-card-description">
                <ul class="animal-card-list">
                    <li class="animal-card-name"><span>Sprinkles</span></li>
                    <li class="animal-card-bio"><span>This little guy loves sitting in bowls.</span></li>
                    <li class="animal-card-species"><span class="animal-card-child-bg-color">cat</span></li>
                </ul>
            </section>
        </div>
        
        <div class="animal-card" onclick="window.document.location='views/showPost.php?id=13'">
            <section class="center">
                <img src="images/pizzah-push.png" height="140" width="170" />
            </section>
            <section class="animal-card-description">
                <ul class="animal-card-list">
                    <li class="animal-card-name"><span>Pusheen</span></li>
                    <li class="animal-card-bio"><span>Pizza maniac. </span></li>
                    <li class="animal-card-species"><span class="animal-card-child-bg-color">cat</span></li>
                </ul>
            </section>
        </div>
        
        <div class="animal-card" onclick="window.document.location='views/showPost.php?id=11'">
            <section class="center">
                <img src="images/cat-tilting-head.jpg" height="140" width="170" />
            </section>
            <section class="animal-card-description">
                <ul class="animal-card-list">
                    <li class="animal-card-name"><span>Tilty</span></li>
                    <li class="animal-card-bio"><span>Tilty likes chasing lasers and reading</span></li>
                    <li class="animal-card-species"><span class="animal-card-child-bg-color">cat</span></li>
                </ul>
            </section>
        </div>
      </div>
    
    </div>
    
    
    
  </div>
</div>

<?php
  $footer = file_get_contents('./views/footer-index.php');
  echo $footer;
?>
