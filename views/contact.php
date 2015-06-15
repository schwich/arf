<?php
  include_once '../includes/arf_config.php';
  $is_logged_in = $arf->check_login();
  $is_admin = $arf->check_if_admin();

  $header = file_get_contents('./header.php');
  echo $header;
  
  $arf->print_contextual_header();
?>
<style>
    .centered-content {
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }
    
  #about-region .text, #contact-region .text, #terms-region .text {
    width: 600px;
    margin-top: 25px;
  }

  .header-style {
    padding-left: 3px;
    font-weight: 200;
    letter-spacing: 3px;
    font-size: 34px;
  }

  main {
    margin-top: 55px;
    padding-left: 75px;
    padding-top: 40px;
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

<main id="contact-region">
    <div class="centered-content">
        <h2 class="header-style">Contact Us</h2>
        <section class="text">
            "Arf: Pet Connection" is the term project for Group 9 in CSC 648/848 Software Engineering at San Francisco State University in the Spring 2015 semester. <br>
            <br><br>
            We can be contacted via email at <a href="mailto:csc648-group-9@googlegroups.com">csc648-group-9@googlegroups.com</a>
        </section>
    </div>
</main>

<?php
  $footer = file_get_contents('./shortFooter.php');
  echo $footer;
?>
