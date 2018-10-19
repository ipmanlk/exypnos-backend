<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exypnos : Category</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/r-2.2.2/datatables.min.css"/>
  <script src="../js/jquery-3.3.1.min.js" charset="utf-8"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/r-2.2.2/datatables.min.js"></script>
  <script src="../js/bootstrap.min.js" charset="utf-8"></script>
</head>
<body>
  <?php
  require_once '../tasks/checkSession.php';
  require_once '../content/navBar.php';
  ?>
  <div class="container-fluid mt-4">
    <div class="row">
      <div class="container mb-4">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <button type="button" class="btn btn-primary" onclick="addCatModal();">Add New Category</button>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="row">
      <div class="container">
        <div class="col-md-12">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              require_once("../config/config.php");
              $result=mysqli_query($link,"SELECT * FROM category");
              while ($row=mysqli_fetch_array($result)) {
                echo '<tr>';
                echo '<td>' . $row['cat_id'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' .
                '<button type="button" class="btn btn-primary" onclick="editCatModal(' ."'" . $row['cat_id'] . "'". ',' ."'" . $row['name'] . "'". ')">Edit</button>'
                .
                '<button type="button" class="btn btn-danger ml-2" onclick="deleteCat(' ."'" . $row['cat_id'] . "'". ')">Delete</button>'
                . '</td>';
                echo '</tr>';
              }
              mysqli_close($link);
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>


    <!-- The Modal -->
    <div class="modal fade" id="catModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 id="modalTitle" class="modal-title">Modal Heading</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <input type="text" class="form-control" id="category" name="category" autofocus>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button id="btnAddCat" onclick="addCat();" type="button" class="btn btn-primary">Add Cateogry</button>
            <button id="btnEditCat" onclick="editCat();" type="button" class="btn btn-primary">Update Category</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>

  </div>

  <script>
  // selected cat ID
  var selectedCatID;

  // data table
  const dataTable = $('.table').DataTable( {
    responsive: true,
    order: [[ 0, "asc" ]]
  });

  function addCatModal() {
    $('#modalTitle').text("Add Category");
    $('#btnAddCat').show();
    $('#btnEditCat').hide();
    showModal();
  }

  function editCatModal(catID, catName) {
    $('#modalTitle').text("Edit Category : " + catName);
    $('#category').val(catName);
    $('#btnAddCat').hide();
    $('#btnEditCat').show();
    showModal();
    selectedCatID = catID;
  }

  function editCat() {
    var category = $('#category').val();
    var data = {
      cat_id: selectedCatID,
      cat_name: category
    }
    var url = '../tasks/updateCategory.php';
    sendRequest(url, data);
  }

  function deleteCat(catID) {
    var data = {cat_id: catID}
    var url = '../tasks/deleteCategory.php';
    sendRequest(url, data);
  }

  function addCat() {
    var category = $('#category').val();
    var data = {cat_name: category};
    var url = '../tasks/addCategory.php';
    sendRequest(url, data);
  }


  function sendRequest(url,data) {
    hideModal();
    $.ajax({
      type: 'POST',
      url: url,
      data: data,
      dataType: "html",
      async: true,
      success: function(msg) {
        showOutput(url,msg);
        setTimeout(refreshPage, 1000);
      }
    });
  }


  function showModal() {
    $('#catModal').modal('show');
  }

  function hideModal() {
    $('#catModal').modal('hide');
  }

  function showOutput(url, msg) {
    var type,result;
    switch (url) {
      case '../tasks/addCategory.php':
      type = "Add Category";
      break;
      case '../tasks/updateCategory.php':
      type = "Edit Category";
      break;
      case '../tasks/deleteCategory.php':
      type = "Delete Category";
      break;
    }
    switch (msg) {
      case "1":
      result = " Completed!"
      break;
      default:
      result = " Failed!"
    }

    alert(type + result);
  }

  function refreshPage() {
    window.location = 'category.php';
  }
  </script>
</body>
</html>
