<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exypnos : Dashboard</title>
  <?php require_once '../../content/head.php'; ?>
</head>
<body>
  <?php
  require_once '../../tasks/checkSession.php';
  require_once '../../content/navBar.php';
  require_once '../../config/config.php';

  header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
  header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");

  $stmt = mysqli_prepare($link, "SELECT uname, description, a.name AS name, profile_img, email,s.name as status FROM author a, author_level s WHERE a.author_level = s.level_id AND a.author_id=?");

  mysqli_stmt_bind_param($stmt, "i", $_SESSION['author_id']);
  mysqli_stmt_execute($stmt);
  // put post data in $row array
  $row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
  mysqli_stmt_close($stmt);
  mysqli_close($link);

  $uname = $row['uname'];
  $about = $row['description'];
  $name = $row['name'];
  $profileimg = $row['profile_img'];
  $email = $row['email'];
  $status = $row['status'];

  ?>
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top" src="https://www.w3schools.com/bootstrap4/img_avatar1.png" alt="Card image">
          <div class="card-body">
            <h4 class="card-title"><?php echo $name; ?></h4>
            <p class="card-text"><?php echo $about; ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Profile</h4>
            <span class="card-text">
              <form>
                <div class="form-group">
                  <label>Status: <?php echo (' '. $status) ?> </label>
                </div>
                <div class="form-group">
                  <label for="uname">Username:</label>
                  <input type="text" class="form-control" id="uname" name="uname" maxlength="60"  value=<?php echo '"'. $uname .'"'?> disabled>
                </div>
                <div class="form-group">
                  <label for="name">Full Name:</label>
                  <input type="text" class="form-control" id="name" name="name" maxlength="50"  value=<?php echo '"'. $name .'"'?>  disabled>
                </div>
                <div class="form-group">
                  <label for="email">E-Mail:</label>
                  <input type="email" class="form-control" id="email" name="email" maxlength="40"  value=<?php echo '"'. $email .'"'?>  disabled>
                </div>
                <div class="form-group">
                  <label for="profileimg">Profile Image URL (Link):</label>
                  <input type="text" class="form-control" id="profileimg" name="profileimg" maxlength="60"  value=<?php echo '"'. $profileimg .'"'?> disabled>
                </div>
                <div class="form-group">
                  <label for="about">About:</label>
                  <textarea id="about" name="about" rows="2" cols="80" class="form-control" style="resize: none;" maxlength="100" disabled>
                    <?php echo $about ?>
                  </textarea>
                </div>
                <div class="form-group">
                  <label for="pwd">Password:</label>
                  <input type="password" class="form-control" id="pwd" name="pwd" disabled>
                </div>
                <div class="form-group">
                  <label for="pwd2">Confirm Password:</label>
                  <input type="password" class="form-control" id="pwd2" name="pwd2" disabled>
                </div>
              </form>

            </span>
            <span id="editProfile" class="btn btn-danger">Edit Profile</span>
            <span type="submit" id="saveChanges" class="btn btn-success" style="display:none">Save Changes</span>
            <span id="cancelChanges" class="btn btn-warning" style="display:none">Cancel Changes</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../../js/profile.js" charset="utf-8"></script>

</body>
</html>
