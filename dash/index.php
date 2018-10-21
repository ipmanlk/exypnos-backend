<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exypnos : Dashboard</title>
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

    </div>
    <div class="row">
      <div class="container">
        <div class="col-md-12">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Post Title</th>
                <th>Posted Date</th>
                <th>Category</th>
                <th>Author</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              require_once("../config/config.php");
              if ($permission == 1) {
                $result=mysqli_query($link,"SELECT post_id,uname,title,datetime,name as category FROM author,post, category WHERE post.author_id = author.author_id AND post.cat_id = category.cat_id");
              } else {
                $author_id = $_SESSION['author_id'];

                $stmt = mysqli_prepare($link, "SELECT post_id,title,datetime,uname,name AS category FROM post,author,category WHERE post.author_id = ? AND post.author_id=author.author_id AND post.cat_id=category.cat_id");

                mysqli_stmt_bind_param($stmt,'i', $author_id);

                mysqli_stmt_execute($stmt);

                $result = mysqli_stmt_get_result($stmt);

                mysqli_stmt_close($stmt);

              }

              while ($row=mysqli_fetch_array($result)) {
                echo '<tr>';
                echo '<td>' . $row['title'] . '</td>';
                $dateTime= new DateTime($row['datetime']);
                $dateTime->setTimezone(new DateTimeZone('Asia/Colombo'));
                $lkDateTime =  date_format($dateTime, 'Y-m-d H:i:s');
                echo '<td>' . $lkDateTime . '</td>';
                echo '<td>' . $row['category'] . '</td>';
                echo '<td>' . $row['uname'] . '</td>';
                echo '<td>' .
                '<button type="button" class="btn btn-primary" onclick="editPost(' ."'" . $row['post_id'] . "'". ')">Edit</button>'
                .
                '<button type="button" class="btn btn-danger ml-2" onclick="deletePost(' ."'" . $row['post_id'] . "'". ')">Delete</button>'
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
  </div>
  <script src="../js/index.js" charset="utf-8"></script>
</body>
</html>
