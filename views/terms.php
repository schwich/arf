<?php
  include_once '../includes/arf_config.php';
  $is_logged_in = $arf->check_login();
  $is_admin = $arf->check_if_admin();

  $header = file_get_contents('./header.php');
  echo $header;
  
  $arf->print_contextual_header();
?>

  <style>
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

  <main id="terms-region">
    <h2 class="header-style">Terms of Service</h2>
    <section class="text">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mattis blandit mattis.</br> Vestibulum non euismod felis. In nec sodales justo. Duis id malesuada nisl. </br>Mauris efficitur augue nec cursus congue. Cras nibh nunc, tincidunt at tempor non, vehicula nec quam. Proin tempus augue vel libero elementum, at auctor mi mollis.
    </section>
    <section class="text">
      Donec dignissim euismod mauris eget ultricies. Curabitur nisi sapien, auctor et venenatis id, malesuada vitae ex. Integer congue viverra quam sit amet venenatis. Sed faucibus tellus vitae ipsum mollis tristique. Nullam euismod accumsan maximus. Nunc maximus semper magna at volutpat. Sed finibus erat id mattis feugiat. Nam sed consequat libero.
    </section>
    <section class="text">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mattis blandit mattis.</br> Vestibulum non euismod felis. In nec sodales justo. Duis id malesuada nisl. </br>Mauris efficitur augue nec cursus congue. Cras nibh nunc, tincidunt at tempor non, vehicula nec quam. Proin tempus augue vel libero elementum, at auctor mi mollis.
    </section>
  </main>

<?php
  $footer = file_get_contents('./shortFooter.php');
  echo $footer;
?>
