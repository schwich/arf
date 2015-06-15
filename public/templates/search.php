<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Admin Page">
    <meta name="author" content="JH">
    <title>Arf - Browse</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../css/search.css" />
  </head>
  <div class="container">
  <?php
    $header = file_get_contents('./header.php');
    echo $header;
  ?>
  <style>
    #nav-ul {
      position: absolute;
      top: 18px;
    }
    #search-form {
      margin-top: 0;
    }

    h2 {
      padding-left: 3px;
      font-weight: 200;
      letter-spacing: 3px;
      font-size: 26px;
      margin-top: 100px;
      margin-left: 319px;
    }

    li a {
      margin-left: 8px;
    }

    .button {
      top: 10px;
    }


  </style>
  <h2 class="header-style">Search Pets</h2>
  <main class="center">

    <!-- Filter Results Form -->
      <form class="form-filter" id="search-form" action="filteredSearch.php">
        <table>
          <tr id="thead">
            <td>Species</td>
            <td>Gender</td>
            <td>Spayed</td>
            <td>Age (years)</td>
            <td>Home or sheltered?</td>
          </tr>
          <tr>
            <td>
              <div class="">
                <select name="species">
                  <option value="" class="opt-default">-</option>
                  <option value="cat">Cat</option>
                  <option value="dog">Dog</option>
                </select>
              </div>
            </td>
            <td>
              <div class="">
                <select name="gender">
                  <option value="" class="opt-default">-</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>
            </td>
            <td>
              <div class="">
                <select name="spayed">
                  <option value="" class="opt-default">-</option>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
              </div>
            </td>
            <td>
              <div class="">
                <select name="age">
                  <option value="" class="opt-default">-</option>
                  <option value="age < 1">&lt 1</option>
                  <option value="age < 3 AND age >= 1">1 - 3</option>
                  <option value="age < 10 AND age >= 3">3 - 10</option>
                  <option value="age > 10">10 +</option>
                </select>
              </div>
            </td>
            <td>
              <div class="">
                <select name="environment">
                  <option value="" class="opt-default">-</option>
                  <option value="shelter">Sheltered</option>
                  <option value="home">Home</option>
                </select>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <button id="filter-search" class="btn btn-default">Filter Results</button>
            </td>
            <td>
              <button type="button" id="clear" class="btn btn-default">Clear</button>
            </td>
        </table>
      </form>

      <div id="card-container"><div class="animal-card" onclick="window.document.location='../../views/showPost.php?id=4'"><section class="center"><img src="../../images/cat1.jpeg" height="140" width="180"></section><section class="animal-card-description"><ul><li class="animal-card-name"><span>test</span></li><li class="animal-card-bio"><span>test</span></li><li class="animal-card-species"><span class="animal-card-child-bg-color">cat</span></li></ul></section></div><div class="animal-card" onclick="window.document.location='../../views/showPost.php?id=8'"><section class="center"><img src="../../images/ice-cream-with-candy-sprinkles.jpg" height="140" width="180"></section><section class="animal-card-description"><ul><li class="animal-card-name"><span>Sprinkles</span></li><li class="animal-card-bio"><span>This little guy love ...</span></li><li class="animal-card-species"><span class="animal-card-child-bg-color">cat</span></li></ul></section></div><div class="animal-card" onclick="window.document.location='../../views/showPost.php?id=11'"><section class="center"><img src="../../images/cat-tilting-head.jpg" height="140" width="180"></section><section class="animal-card-description"><ul><li class="animal-card-name"><span>Tilty</span></li><li class="animal-card-bio"><span>Tilty likes chasing  ...</span></li><li class="animal-card-species"><span class="animal-card-child-bg-color">cat</span></li></ul></section></div><div class="animal-card" onclick="window.document.location='../../views/showPost.php?id=13'"><section class="center"><img src="../../images/pizzah-push.png" height="140" width="180"></section><section class="animal-card-description"><ul><li class="animal-card-name"><span>Pusheen</span></li><li class="animal-card-bio"><span>Pizza maniac. </span></li><li class="animal-card-species"><span class="animal-card-child-bg-color">cat</span></li></ul></section></div><div class="animal-card" onclick="window.document.location='../../views/showPost.php?id=14'"><section class="center"><img src="../../images/beep_med.png" height="140" width="180"></section><section class="animal-card-description"><ul><li class="animal-card-name"><span>Pusheen</span></li><li class="animal-card-bio"><span>Pizza maniac. Cheese ...</span></li><li class="animal-card-species"><span class="animal-card-child-bg-color">cat</span></li></ul></section></div><div class="animal-card" onclick="window.document.location='../../views/showPost.php?id=15'"><section class="center"><img src="../../images/beep_med.png" height="140" width="180"></section><section class="animal-card-description"><ul><li class="animal-card-name"><span>Pusheen</span></li><li class="animal-card-bio"><span>Pizza maniac. Cheese ...</span></li><li class="animal-card-species"><span class="animal-card-child-bg-color">cat</span></li></ul></section></div><div class="animal-card" onclick="window.document.location='../../views/showPost.php?id=16'"><section class="center"><img src="../../images/fat-pusheen.png" height="140" width="180"></section><section class="animal-card-description"><ul><li class="animal-card-name"><span>Fatty</span></li><li class="animal-card-bio"><span>El gato gordo</span></li><li class="animal-card-species"><span class="animal-card-child-bg-color">cat</span></li></ul></section></div><div class="animal-card" onclick="window.document.location='../../views/showPost.php?id=18'"><section class="center"><img src="../../images/pusheencat.png" height="140" width="180"></section><section class="animal-card-description"><ul><li class="animal-card-name"><span>Mr. Charles</span></li><li class="animal-card-bio"><span>Laid back and easy g ...</span></li><li class="animal-card-species"><span class="animal-card-child-bg-color">cat</span></li></ul></section></div><div class="animal-card" onclick="window.document.location='../../views/showPost.php?id=19'"><section class="center"><img src="../../images/pusheencat.png" height="140" width="180"></section><section class="animal-card-description"><ul><li class="animal-card-name"><span>Mr. Charles</span></li><li class="animal-card-bio"><span>Laid back and easy g ...</span></li><li class="animal-card-species"><span class="animal-card-child-bg-color">cat</span></li></ul></section></div></div>
  </main>
  <?php
    $footer = file_get_contents('./footer.php');
    echo $footer;
  ?>
</div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

  <script type="text/javascript">
    // Reset filter values to their defaults
    $('#clear').click(function (e) {
      $('.opt-default').attr('selected', 'selected');
    });

    // Validate filter submission
    $('form').submit(function (e) {
      var hasFilters;

      $('select').each(function (idx, el) {
        var value = $('[name=' + $(el).attr('name') + ']').val();

        if (value !== '') {
          hasFilters = true;
          return;
        }
      });

      //if (!hasFilters) {
        e.preventDefault();
      //}
    });
  </script>
</body>
</html>
