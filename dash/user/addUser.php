<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exypnos : Add User</title>
  <?php require_once '../../content/head.php'; ?>
</head>
<body>
  <?php
  require_once '../../tasks/checkSession.php';
  require_once '../../content/navBar.php';
  ?>
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>User</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once("../../config/config.php");
            $result=mysqli_query($link,"SELECT uname, l.name FROM author a, author_level l WHERE a.author_level=l.level_id");
            while ($row=mysqli_fetch_array($result)) {
              echo '<tr>';
              echo '<td>' . $row['uname'] . '</td>';
              echo '<td>' . $row['name'] . '</td>';
              echo '</tr>';
            }
            mysqli_close($link);
            ?>
          </tbody>
        </table>
      </div>
      <div class="col-md-6">
        <form id="addUserForm" method="post" class="mb-4">
          <div class="card bg-light text-dark">
            <div class="card-body">
              <div class="form-group">
                <label for="uname">Username:</label>
                <input type="text" class="form-control" id="uname" name="uname" maxlength="60">
              </div>
              <div class="form-group">
                <label for="des">Description:</label>
                <input type="text" class="form-control" id="des" name="des" maxlength="100">
              </div>
              <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" name="pwd" maxlength="255">
              </div>
            </div>
          </div>

          <hr>
          <button type="submit" class="btn btn-primary btn-block">Add User</button>
          <button type="reset" class="btn btn-danger btn-block">Reset</button>
        </form>
      </div>
    </div>
  </div>
  <script src="../../js/addUser.js" charset="utf-8"></script>
</body>
</html>
