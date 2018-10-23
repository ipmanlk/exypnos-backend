<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exypnos : Dashboard</title>
  <?php require_once '../content/head.php'; ?>
</head>
<body>
  <?php
  require_once '../tasks/checkSession.php';
  require_once '../content/navBar.php';
  ?>
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Post Title</th>
              <th>Posted Date</th>
              <th>Category</th>
              <th>Author</th>
              <th>Status</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once("../config/config.php");

            $result=mysqli_query($link,"SELECT post_id,uname,title,datetime,category.name AS category,post_status.name AS state, post.author_id AS author_id FROM author,post, category,post_status WHERE post.author_id = author.author_id AND post.cat_id = category.cat_id AND post.status_id = post_status.status_id ");

            while ($row=mysqli_fetch_array($result)) {
              echo '<tr>';
              echo '<td>' . $row['title'] . '</td>';
              $dateTime= new DateTime($row['datetime']);
              $dateTime->setTimezone(new DateTimeZone('Asia/Colombo'));
              $lkDateTime =  date_format($dateTime, 'Y-m-d H:i:s');
              echo '<td>' . $lkDateTime . '</td>';
              echo '<td>' . $row['category'] . '</td>';
              echo '<td>' . $row['uname'] . '</td>';
              echo '<td>' . $row['state'] . '</td>';
              echo '<td>'
              if ($_SESSION['author_id'] == $row['author_id']) {
                echo '<button type="button" class="btn btn-primary btn-sm" onclick="editPost(' ."'" . $row['post_id'] . "'". ')">Edit</button>';
              }
              echo '</td>';
              echo '<td>'
              if ($_SESSION['author_id'] == $row['author_id']) {
                echo '<button type="button" class="btn btn-danger ml-2 btn-sm" onclick="deletePost(' ."'" . $row['post_id'] . "'". ',this)">Delete</button>';
              }
              echo '</td>';
              echo '</tr>';
            }
            mysqli_close($link);
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- confirm modal -->
    <div class="modal fade" id="confirmModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Confirm Delete</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            Do you really want to delete this post?
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <button id="confirmDelete" type="button" class="btn btn-danger">Yes, Delete!</button>
          </div>

        </div>
      </div>
    </div>


  </div>
  <script src="../js/index.js" charset="utf-8"></script>
</body>
</html>
