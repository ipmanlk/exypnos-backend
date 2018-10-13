<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exypnos : Add User</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery-3.3.1.min.js" charset="utf-8"></script>
  <script src="../js/bootstrap.min.js" charset="utf-8"></script>
</head>
<body>
  <?php
  require_once '../tasks/checkSession.php';
  require_once '../content/navBar.php';
  ?>
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-12">
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
  <script src="../js/addUser.js" charset="utf-8"></script>
</body>
</html>
