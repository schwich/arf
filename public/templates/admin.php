<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Admin Page">
    <meta name="author" content="JH">
    <title>Arf - Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/app.css" />
  </head>
  <body>
    <div class="container">
      <?php
        $header = file_get_contents('./header.php');
        echo $header;
      ?>
      <main>
        <h2 class="header-style">Admin Page</h2>
        <input type="text" name="search" class="form-control" id="filter" placeholder="Search ...">
        <span class="filter-header" style="font-weight: 500;">Select Filter</span>
        <select class="filter-selector">
          <option>Users</option>
          <option>Posts</option>
        </select>

<?php
            include_once "../includes/db_connect.php";

            try {
                $sql = $db->prepare("SELECT id, username, email, firstname, lastname FROM users");
                $sql->execute();
                // specify that the returned array is an associative array
                $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
                $row = $sql->fetch();
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
                <th>Action</th>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
              </tr>
            </thead>
            <tbody>

    
             <?php while ($row = $sql->fetch()){ ?>
              <tr class="filterable-row">
                <td>
                  <select class="select-action">
                    <option>Select</option>
                    <option>Delete</option>
                    <option>Edit</option>
                  </select>
                </td>
                <td><?php echo $row['id'];?></td>
                <td> <?php echo $row['firstname'];?> </td>
                <td><?php echo $row['lastname'];?></td>
                <td><?php echo $row['username'];?></td>
                <td><?php echo $row['email'];?></td>
             
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
                $row = $sql->fetch();
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
                <th>Action</th>
                <th>Post ID</th>
                <th>Pet Name</th>
                <th>Pet Species</th>
                <th>Pet Breed</th>
              </tr>
            </thead>
            <tbody>
              
              <?php while ($row = $sql->fetch()){ ?>
              <tr class="filterable-row">
                <td>
                  <select class="select-action">
                    <option>Select</option>
                    <option>Delete</option>
                    <option>Edit</option>
                  </select>
                </td>
                <td><?php echo $row['id'];?></td>
                <td> <?php echo $row['pet_name'];?> </td>
                <td><?php echo $row['species'];?></td>
                <td><?php echo $row['breed'];?></td>
                           </tr>
              
              <?php } ?>
	   </tbody>
          </table>
        </div>
      </main>
      <?php
        $footer = file_get_contents('./footer.php');
        echo $footer;
      ?>
    </div>
    </body>

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
</html>
