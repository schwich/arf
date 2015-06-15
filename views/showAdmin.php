<?php
  include_once '../includes/arf_config.php';
  $is_logged_in = $arf->check_login();
  $is_admin = $arf->check_if_admin();

  $header = file_get_contents('./header.php');
  echo $header;
  
  $arf->print_contextual_header();
?>


<main>
    <h2 class="header-style">Admin Page</h2>
    <input type="text" name="search" class="form-control" id="filter" placeholder="Search ...">
    <span class="filter-header" style="font-weight: 500;">Select Filter</span>
    <select class="filter-selector">
        <option>Users</option>
        <option>Posts</option>
    </select>

<style>
  main {
    margin-top: 40px;
    padding: 50px;
    padding-left: 80px;
    padding-right: 80px;
  }

  h2 {
    padding-left: 3px;
    font-weight: 200;
    letter-spacing: 3px;
    font-size: 34px;
    margin-bottom: 30px;
  }

  #filter {
    width: 400px;
    margin-bottom: 20px;
    height: 40px;
    padding-left: 17px;
    border-radius: 3px;
    outline: none;
    border: 1px solid #dfdfdf;
    font-size: 17px;
  }

  .form-control:focus {
    -webkit-box-shadow: none;
    box-shadow: none;
  }

  .table-responsive {
    margin-top: 20px;
  }

  .filter-selector {
    font-size: 16px;
  }

  .filter-header {
    margin-right: 10px;
  }

  @media (max-width: 500px) {
    #filter {
      width: 100%;
    }
  }

  .post-table {

  }

  .table-wrapper {
    height: 200px;       /* Just for the demo          */
    overflow-y: auto;    /* Trigger vertical scroll    */
    overflow-x: hidden;  /* Hide the horizontal scroll */
    overflow: -moz-scrollbars-vertical;
    overflow: scroll;
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



  <?php
            include_once "../includes/db_connect.php";

            try {
                $sql = $db->prepare("SELECT id, username, email, firstname, lastname FROM users");
                $sql->execute();
                // specify that the returned array is an associative array
                $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
                //$row = $sql->fetch();
                     }
                     
                catch (PDOException $e) {
                $error_log = fopen("../assets/error_log.txt", "w");
                fwrite($error_log, $e->getMessage());
                fclose($error_log);
            }

        ?>

        <!-- User Table (visible by default) -->
        <div class="table-responsive">
          <table class="table table-bordered user-table">
            <thead>
              <tr class="table-header">
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
              
              </tr>
            </thead>
            <tbody>
            
             <?php while ($row = $sql->fetch()){ ?>
              	<tr class="filterable-row">
                    
                <?php
				echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['firstname']. "</td>";
                echo "<td>" . $row['lastname']. "</td>";
                echo "<td>" . $row['username']. "</td>";
                echo "<td>" . $row['email']. "</td>";
                 ?>       
                <td>               
 <button type="button" class="btn btn-warning" class="glyphicon glyphicon-trash" aria-hidden="true"
<?php echo "onclick=\"window.document.location='../controllers/deleteUser.php?id=$row[id]&admin=true'\">"; ?> DELETE </button>
               </td>                    					
              </tr>
                                          
              <?php } ?>
              
            </tbody>
          </table>
        </div>
        
        
  <?php
            include_once "../includes/db_connect.php";

            try {
                $sql = $db->prepare("SELECT id, pet_name, species, breed, pet_from,"
                        . " age, spayed, gender FROM animal_posts");
                $sql->execute();
                // specify that the returned array is an associative array
                $result = $sql->setFetchMode(PDO::FETCH_ASSOC);              
                
          }
                     
                catch (PDOException $e) {
                $error_log = fopen("../assets/error_log.txt", "w");
                fwrite($error_log, $e->getMessage());
                fclose($error_log);
            }

        ?>
        <!-- Post Table (hidden by defualt) -->
        <div class="table-responsive">
          <table class="table table-bordered post-table hide">
            <thead>
              <tr class="table-header">
                <th>Post ID</th>
                <th>Pet Name</th>
                <th>Pet Species</th>
                <th>Pet Breed</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>             
              
              <?php while ($row = $sql->fetch()){ ?>
              <tr class="filterable-row">
                                                           
                <td><?php echo $row['id'];?></td>
                <td> <?php echo $row['pet_name'];?> </td>
                <td><?php echo $row['species'];?></td>
                <td><?php echo $row['breed'];?></td>
                 <td>        
                 <button type="button" class="btn btn-warning" class="glyphicon glyphicon-trash" aria-hidden="true"
<?php echo "onclick=\"window.document.location='../controllers/deletePost.php?id=$row[id]&admin=true'\">"; ?> DELETE </button>                      </td>
                </tr>
               
              <?php } ?>
            </tbody>
          </table>
        </div>
        


    <script type="text/javascript">
      function traverseRowItems (rowNode, startIdx, endIdx) {
        var items = '';

        for (var i = startIdx; i < endIdx; i++) {
          items += rowNode.find('td').eq(i).text() + '\n';
        }

        return items;
      }

      $(document).ready(function () {

        // Action handler
        $('.select-action').change(function (e) {
          if (e.target.value === 'Delete') {
            var row = $($(this).parent()).parent();
            var actionMessage = 'Are you sure you want to delete the following ';

            var isUser = !$('.user-table').hasClass('hide');
            if (isUser) {
              actionMessage += 'user:\n';
              actionMessage += '---------------------------------------------------------\n';
              actionMessage += traverseRowItems($(row[0]), 1, 6);
            } else {
              actionMessage += 'post:\n';
              actionMessage += '---------------------------------------------------------\n';
              actionMessage += traverseRowItems($(row[0]), 1, 5);
            }

            if (window.confirm(actionMessage)) {
              // Remove user X
              row.remove();
              $('#filter').val('');
              $('#filter').keyup();
              
              
            } else {
              // Reset action to default
              $(this).val('Select');
            }
          }
        });

        // Switch between user and post table
        $('.filter-selector').change(function (e) {
          var value = e.target.value.toLowerCase();

          if (value === 'posts') {
            $('.user-table').addClass('hide');
            $('.post-table').removeClass('hide');
          } else {
            $('.user-table').removeClass('hide');
            $('.post-table').addClass('hide');
          }
        });

        // Filter data tables
        $('#filter').keyup(function (e) {
            var re = new RegExp(e.target.value, 'i');

            $('.filterable-row').hide();

            $('.filterable-row').filter(function () {
                var rowValue = $(this).text();
                return re.test(rowValue);
            }).show();
        });

        // Prevent form submission
        $('form').on('submit', function (e) {
          e.prevetDefault();
        });
      });

    </script>
  </body>
   
<?php
  $footer = file_get_contents('./footer.php');
  echo $footer;
?>
</html>

