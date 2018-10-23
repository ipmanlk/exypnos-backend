<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exypnos : Category</title>
  <?php require_once '../../content/head.php'; ?>
</head>
<body>
  <?php
  require_once '../../tasks/checkSession.php';
  require_once '../../content/navBar.php';
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
              require_once("../../config/config.php");
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
  <script src="../../js/category.js" charset="utf-8"></script>
</body>
</html>
