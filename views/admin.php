
<?php
  $header = file_get_contents('./header.php');
  echo $header;
?>

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
</style>

<main>
  <h2 class="header-style">Admin Page</h2>
  <input type="text" name="search" class="form-control" id="filter" placeholder="Search ...">
  <span class="filter-header" style="font-weight: 500;">Select Filter</span>
  <select class="filter-selector">
    <option>Users</option>
    <option>Posts</option>
  </select>

  <!-- User Table (visible by default) -->
  <div class="table-responsive table-wrapper">
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
          <tr class="filterable-row">
            <td>
              <select class="select-action">
                <option>Select</option>
                <option>Delete</option>
              </select>
            </td>
            <td>1098</td>
            <td>Michael</td>
            <td>Simon</td>
            <td>msimon</td>
            <td>michael@gmail.com</td>
            <td>abc</td>
          </tr>
          <tr class="filterable-row">
            <td>
              <select class="select-action">
                <option>Select</option>
                <option>Delete</option>
              </select>
            </td>
            <td>1099</td>
            <td>Jordan</td>
            <td>Schwichtenberg</td>
            <td>jschwich</td>
            <td>jordan@gmail.com</td>
            <td>def</td>
          </tr>
          <tr class="filterable-row">
            <td>
              <select class="select-action">
                <option>Select</option>
                <option>Delete</option>
              </select>
            </td>
            <td>1200</td>
            <td>Sofia</td>
            <td>Balter</td>
            <td>sbalter</td>
            <td>sofia@gmail.com</td>
            <td>ghi</td>
          </tr>
          <tr class="filterable-row">
            <td>
              <select class="select-action">
                <option>Select</option>
                <option>Delete</option>
              </select>
            </td>
            <td>1201</td>
            <td>Thomas</td>
            <td>Cassady</td>
            <td>tcassady</td>
            <td>thomas@gmail.com</td>
            <td>jkl</td>
          </tr>
          <tr class="filterable-row">
            <td>
              <select class="select-action">
                <option>Select</option>
                <option>Delete</option>
              </select>
            </td>
            <td>1202</td>
            <td>Jared</td>
            <td>Halpert</td>
            <td>jhalpert</td>
            <td>jared@gmail.com</td>
            <td>mno</td>
          </tr>
        </tbody>
    </table>
  </div>

  <!-- Post Table (hidden by defualt) -->
  <div class="table-responsive table-wrapper post-table">
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
        <tr class="filterable-row">
          <td>
            <select class="select-action">
              <option>Select</option>
              <option>Delete</option>
            </select>
          </td>
          <td>1203</td>
          <td>Mango</td>
          <td>Cat</td>
          <td>Domestic Shorthair</td>
        </tr>
        <tr class="filterable-row">
          <td>
            <select class="select-action">
              <option>Select</option>
              <option>Delete</option>
            </select>
          </td>
          <td>1204</td>
          <td>Pusheen</td>
          <td>Cat</td>
          <td>Fat Cat</td>
        </tr>
        <tr class="filterable-row">
          <td>
            <select class="select-action">
              <option>Select</option>
              <option>Delete</option>
            </select>
          </td>
          <td>1205</td>
          <td>Mr. Charles</td>
          <td>Dog</td>
          <td>Dachshund</td>
        </tr>
        <tr class="filterable-row">
          <td>
            <select class="select-action">
              <option>Select</option>
              <option>Delete</option>
            </select>
          </td>
          <td>1206</td>
          <td>Fluffy</td>
          <td>Cat</td>
          <td>Ragdoll</td>
        </tr>
        <tr class="filterable-row">
          <td>
            <select class="select-action">
              <option>Select</option>
              <option>Delete</option>
            </select>
          </td>
          <td>1207</td>
          <td>Darth</td>
          <td>Dog</td>
          <td>Jedi</td>
        </tr>
      </tbody>
    </table>
  </div>
</main>

</div>

<?php
  $footer = file_get_contents('./footer.php');
  echo $footer;
?>

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
