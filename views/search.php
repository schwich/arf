<?php
  include_once '../includes/arf_config.php';
  $is_logged_in = $arf->check_login();
  $is_admin = $arf->check_if_admin();

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
<script type="text/javascript">
  $(document).ready(function onReady () {
    // Reset filter values to their defaults
    $('#clear-btn').click(function (e) {
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

      if (!hasFilters) {
        e.preventDefault();
      }
    });
  });
</script>
<style>
  .col-md-4 {

    border: 0px solid blue;
  }

  .col-md-8 {
    border: 0px solid blue;
  }

  .row {
    margin-top: 90px;
  }

  .filter-values td {
    padding: 10px 7px;
  }

  h2 {
    font-weight: 200;
    letter-spacing: 2px;
    padding-left: 6px;
  }

  #filter-controls {
    padding-top: 20px;
    padding-left: 7px;
  }

  #clear-btn {
    margin-right: 10px;
  }

  #filter-search {
    background-color: #0084ff;
    color: #fff;
    letter-spacing: 1px;
  }

  .results-data {
    position: relative;
    left: 200px;
    top: 40px;
  }

  .results-row {
    padding-left: 21px;
    margin-top: 0px;
  }

  a:hover, a:active, a:visited {
    text-decoration: none;
    color: white;
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
    width: 180px;
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

  .animal-card-name {
    font-weight: 500;
    font-size: 16px;
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

  ul {
    margin-top: -16px;
    margin-bottom: 10px;
    margin-left: -33px;
  }

  #card-container {
    border: 0px solid black;
    width: 662px;
    margin-top: 40px;
  }
  
  .search-results-number {
    position: absolute;
    top: 100px;
    margin-left: 416px;
    font-size: large;
  }

</style>
<div class="container">
  <div class="row">
    <div class="col-md-4">
      <h2>Filter Pets</h2>
      <form class="form-filter" id="search-form" action="search.php">
        <table>

          <tr class="filter-values">
            <td >Species</td>
            <td class="filter-option">
              <div>
                <select name="species">
                  <option value="" class="opt-default">-</option>
                  <option value="cat">Cat</option>
                  <option value="dog">Dog</option>
                </select>
              </div>
            </td>
          </tr>

          <tr class="filter-values">
            <td>Sex</td>
            <td class="filter-option">
              <div>
                <select name="gender">
                  <option value="" class="opt-default">-</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>
            </td>
          </tr>

          <tr class="filter-values">
            <td>Neutered</td>
            <td class="filter-option">
              <div>
                <select name="spayed">
                  <option value="" class="opt-default">-</option>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
              </div>
            </td>
          </tr>

          <tr class="filter-values">
            <td>Age (years)</td>
            <td class="filter-option">
              <div>
                <select name="age">
                  <option value="" class="opt-default">-</option>
                  <option value="age < 1">&lt 1</option>
                  <option value="age < 3 AND age >= 1">1 - 3</option>
                  <option value="age < 10 AND age >= 3">3 - 10</option>
                  <option value="age > 10">10 +</option>
                </select>
              </div>
            </td>
          </tr>

          <tr class="filter-values">
            <td>Home or sheltered?</td>
            <td class="filter-option">
              <div>
                <select name="environment">
                  <option value="" class="opt-default">-</option>
                  <option value="shelter">Sheltered</option>
                  <option value="home">Home</option>
                </select>
              </div>
            </td>
          </tr>
        </table>
        <div id="filter-controls">
          <button type="button" id="clear-btn" class="btn btn-default" style="position: relative;bottom: 5px;">Clear</button>
          <button id="filter-search" class="btn btn-filer-search" style="position: relative;bottom: 5px;">Filter Pets</button>
        </div>
      </form>
    </div>
    <div class="col-md-8">
      <div class="row results-row">
        <div>
          <!--<h2>Results: <span>32 found, showing 9</span></h2>
          -->
        </div>

        <?php
            $number_of_results = 0;

            include_once '../includes/db_connect.php';

            parse_str($_SERVER['QUERY_STRING'], $qs);

            if (isset($qs['species']) && $qs['species'] != '') {
              $conditions[] = "species = '" . $qs['species'] . "'";
            }

            if (isset($qs['gender']) && $qs['gender'] != '') {
              $conditions[] = "gender = '" . $qs['gender'] . "'";
            }

            if (isset($qs['environment']) && $qs['environment'] != '') {
              $conditions[] = "pet_from = '" . $qs['environment'] . "'";
            }

            if (isset($qs['spayed']) && $qs['spayed'] != '') {
              $conditions[] = "spayed = '" . $qs['spayed'] . "'";
            }

            if (isset($qs['age']) && $qs['age'] != '') {
              $conditions[] = $qs['age'];
            }

            $search_query = "SELECT * FROM animal_posts";

            if (isset($conditions) && count($conditions) > 0) {
              $search_query .= " WHERE " . implode(' AND ', $conditions);
            }
            
            $sql = $db->prepare($search_query);
            $sql->execute();

            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
            

            
            echo '<div id="card-container">';

            // For each table row (pet)
            while ($row = $sql->fetch()) {
                $number_of_results++;
              $name = $row['pet_name'];
              $sex = $row['gender'];
              $age = $row['age'];
              $species = $row['species'];

              // Get the image for the post
              $image_query = $db->prepare("SELECT image_file_path FROM animal_post_images" . " WHERE post_id = $row[id]" 
                        . " AND thumbnail='yes'");
              $image_query->execute();
              $image_row = $image_query->fetch();

              // Construct animal card
              echo '<div class="animal-card" onclick="window.document.location=\'../views/showPost.php?id=' . $row['id'] . '\'">';
              echo   '<section class="center">';
              echo     '<img src="' . $image_row['image_file_path'] . '" height="140" width="180" />';
              echo   '</section>';
              echo   '<section class="animal-card-description">';
              echo     '<ul>';
              echo       '<li class="animal-card-name">';
              echo         '<span>' . $name . '</span>';
              echo       '</li>';
              echo       '<li class="animal-card-bio">';
              echo         '<span >' . $sex . ',  '. $age .' years old</span>';
              echo       '</li>';
              echo       '<li class="animal-card-species">';
              echo         '<span class="animal-card-child-bg-color">' . $species . '</span>';
              echo       '</li>';
              echo     '</ul>';
              echo   '</section>';
              echo '</div>';
          }


        ?>

      </div>
    </div>
  </div>
</div>

<?php
          echo '<div class="search-results-number">Number of Results: '.$number_of_results.
                  '</div>'
                  . '</div>';
  $footer = file_get_contents('./footer.php');
  echo $footer;
?>
