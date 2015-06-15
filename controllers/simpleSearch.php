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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/app.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <style>
      filtered-search {
          text-align: center;
      }
  </style>

  <body>
      <div class="container">
          <div class="row">
   <button class='btn btn-default' onclick="window.history.back()"
           style='margin: 10px; '>go back</button>
           
   <form class="form-horizontal" action="filteredSearch.php" method="POST"
         style="margin-top: 10px;">
       <div class="form-group col-md-2">
           <label>Species</label>
           <div class="checkbox">
               <label>
                   <input type="checkbox" name="cat">Cat
               </label>
           </div>
           <div class="checkbox">
               <label>
                   <input type="checkbox" name="dog">Dog
               </label>
           </div>
       </div>
       <div class="form-group col-md-2 filtered-search">
           <label>Homed or Sheltered?</label>
           <div class="checkbox">
               <label>
                   <input type="checkbox" name="homed">Homed
               </label>
           </div>
           <div class="checkbox">
               <label>
                   <input type="checkbox" name="sheltered">Sheltered
               </label>
           </div>
       </div>
       <div class="form-group col-md-2 filtered-search">
           <label>Gender</label>
           <div class="checkbox">
               <label>
                   <input type="checkbox" name="male">Male
               </label>
           </div>
           <div class="checkbox">
               <label>
                   <input type="checkbox" name="female">Female
               </label>
           </div>
       </div>
       <div class="form-group col-md-2 filtered-search">
           <label>Spayed?</label>
           <div class="checkbox">
               <label>
                   <input type="checkbox" name="spayed_yes">Yes
               </label>
           </div>
           <div class="checkbox">
               <label>
                   <input type="checkbox" name="spayed_no">No
               </label>
           </div>
       </div>
       <div class="form-group col-md-2">
           <label>Age</label>
           <div class="checkbox">
               <label>
                   <input type="checkbox" name="age_lessthan1y">< 1 year
               </label>
           </div>
           <div class="checkbox">
               <label>
                   <input type="checkbox" name="age_1yto3y">1 - 3 years
               </label>
           </div>
           <div class="checkbox">
               <label>
                   <input type="checkbox" name="age_3yto10y">3 - 10 years
               </label>
           </div>
           <div class="checkbox">
               <label>
                   <input type="checkbox" name="age_morethan10y">10+ years
               </label>
           </div>
       </div>
       <div class="form-group">
           <button type="submit" class="btn btn-primary">Filter Search</button>
       </div>
   </form>
          </div>
          <div class="row">
    <?php
    include_once "../includes/db_connect.php";

    $search_term = $_POST['search_term'];

    try {
            $sql = $db->prepare("SELECT id, pet_name, species, breed, pet_from, pet_bio "
                    . "FROM animal_posts WHERE species = '$search_term'"
                    . "OR breed = '$search_term'"
                    . "OR pet_from = '$search_term'");
            $sql->execute();
            
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
            
            echo "<table class='table table-hover' style='margin-top: 15px;'><tr><th>Pet name</th>"
                . "<th>Pet species</th><th>Pet breed</th><th>Homed or Sheltered</th>"
                    . "<th>Pet Bio</th></tr>";

                // for each row in the whole table
                while ($row = $sql->fetch()) {
                    echo "<tr style='cursor: pointer;'"
                    . "onclick=\"window.document.location='../views/showPost.php?id=$row[id]'\">";
                    echo "<td>" . $row['pet_name'] . "</td>";
                    echo "<td>" . $row['species'] . "</td>";
                    echo "<td>" . $row['breed'] . "</td>";
                    echo "<td>" . $row['pet_from'] . "</td>";
                    echo "<td>" . $row['pet_bio'] . "</td>";
                    echo "</tr>";
                }

            echo "</table>";
    
    } catch (PDOException $e) {
                echo $e;
    }
    ?>
          </div>
      </div>
</body>
</html>
