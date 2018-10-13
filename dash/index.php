<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exypnos : Dashboard</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery-3.3.1.min.js" charset="utf-8"></script>
  <script src="../js/bootstrap.min.js" charset="utf-8"></script>
</head>
<body>
  <?php
  require_once '../tasks/checkSession.php';
  require_once '../content/navBar.php';
  ?>
  <div class="container-fluid mt-4">
    <div class="row">
      <div class="col-md-6">
        <form id="postForm" method="post" class="mb-4">
          <div class="card bg-light text-dark">
            <div class="card-body">
              <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" maxlength="70">
              </div>
              <div class="form-group">
                <label for="title">Short Description:</label>
                <input type="text" class="form-control" id="shortdes" name="shortdes" maxlength="100">
              </div>
              <div class="form-group">
                <label for="post">Post:</label>
                <textarea class="form-control" id="post" name="post" rows="10" cols="80"></textarea>
              </div>
            </div>
          </div>
          <div class="card bg-light text-dark">
            <div class="card-body">
              <div class="form-group">
                <label for="coverimg">Cover Image URL:</label>
                <input type="text" class="form-control" id="coverimg" name="coverimg" maxlength="60">
              </div>
              <div class="form-group">
                <label for="cardimg1">Card Image 1 URL:</label>
                <input type="text" class="form-control" id="cardimg1" name="cardimg1" maxlength="60">
              </div>
              <div class="form-group">
                <label for="cardimg2">Card Image 2 URL:</label>
                <input type="text" class="form-control" id="cardimg2" name="cardimg2" maxlength="60">
              </div>
            </div>
          </div>
          <div class="card bg-light text-dark">
            <div class="card-body">
              <div class="form-group">
                <label for="authorid">Author:</label>
                <select class="form-control" id="authorid" name="authorid">
                  <?php
                  require_once('../config/config.php');
                  $stmt = mysqli_prepare($link, "SELECT author_id,uname FROM author");
                  mysqli_stmt_execute($stmt);
                  $result = mysqli_stmt_get_result($stmt);
                  mysqli_stmt_close($stmt);

                  while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['author_id'] . '">' . $row['uname'] . "</option>";
                  }

                  mysqli_close($link);
                  ?>
                </select>
              </div>
            </div>
          </div>
          <hr>
          <button type="submit" class="btn btn-primary btn-block">Post</button>
          <button type="reset" class="btn btn-danger btn-block">Reset</button>
        </form>
      </div>
      <div class="col-md-6">
        <div class="card bg-light text-dark">
          <div class="card-body">
            <div id="preview">
              PREVIEW
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <script src="../js/addPost.js" charset="utf-8"></script>
</body>
</html>
