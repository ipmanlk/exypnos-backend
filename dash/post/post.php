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

  $author_id = $_SESSION['author_id'];
  if (isset($_GET['action']) && !empty($_GET['action'])) {
    $title = $short_des  = $post = $cover_img = $card_img1 = $card_img2 = $post_id = $cat_id = $status_id="";
    $action = $_GET['action'];
    if ($action == 'edit') {
      if (isset($_GET['post_id']) && !empty($_GET['post_id'])) {
        // get post data related to post id
        $post_id = trim($_GET['post_id']);

        if (USER_PERMISSION == 1 || USER_PERMISSION == 2) {
          $stmt = mysqli_prepare($link, "SELECT author_id, title,cover_img,post,card_img1,card_img2,author_id,short_des,cat_id,status_id FROM post WHERE post_id=?");

          mysqli_stmt_bind_param($stmt, "i", $post_id);
        } else {
          $stmt = mysqli_prepare($link, "SELECT author_id, title,cover_img,post,card_img1,card_img2,author_id,short_des,cat_id,status_id FROM post WHERE post_id=? AND author_id=?");

          mysqli_stmt_bind_param($stmt, "ii", $post_id, $_SESSION['author_id']);
        }

        mysqli_stmt_execute($stmt);

        // put post data in $row array
        $row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
        mysqli_stmt_close($stmt);

        // assign post data
        $author_id = $row['author_id'];
        $title = $row['title'];
        $short_des = $row['short_des'];
        $post = $row['post'];
        $cover_img = $row['cover_img'];
        $card_img1 = $row['card_img1'];
        $card_img2 = $row['card_img2'];
        $cat_id = $row['cat_id'];
        $status_id = $row['status_id'];

      }
    }
  } else {
    echo "Action not found!";
    exit();
  }
  ?>
  <div class="container-fluid mt-4">
    <div class="row">
      <div class="col-md-6">
        <form id="postForm" method="post" class="mb-4">
          <div class="card bg-light text-dark">
            <div class="card-body">
              <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" maxlength="70" value=<?php echo '"'. $title .'"'; ?> autofocus>
              </div>
              <div class="form-group">
                <label for="title">Short Description:</label>
                <input type="text" class="form-control" id="shortdes" name="shortdes" maxlength="100" value=<?php echo '"'. $short_des .'"'; ?>>
              </div>
              <div class="form-group">
                <label for="post">Post:</label>
                <textarea class="form-control" id="post" name="post" rows="10" cols="80"><?php echo $post; ?></textarea>
              </div>
              <div class="form-group">
                <label for="category">Category:</label>
                <select class="form-control" id="categoryid" name="categoryid">
                  <?php
                  $result = mysqli_query($link, "SELECT * FROM category");
                  while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['cat_id'] == $cat_id) {
                      echo '<option value="' . $row['cat_id'] . '" selected>' . $row['name'] . '</option>';
                    } else {
                      echo '<option value="' . $row['cat_id'] . '">' . $row['name'] . '</option>';
                    }
                  }
                  mysqli_free_result($result);
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="card bg-light text-dark">
            <div class="card-body">
              <div class="form-group">
                <label for="coverimg">Cover Image URL:</label>
                <input type="text" class="form-control" id="coverimg" name="coverimg" maxlength="60" value=<?php echo '"'. $cover_img .'"'; ?>>
              </div>
              <div class="form-group">
                <label for="cardimg1">Card Image 1 URL:</label>
                <input type="text" class="form-control" id="cardimg1" name="cardimg1" maxlength="60" value=<?php echo '"'. $card_img1 .'"'; ?>>
              </div>
              <div class="form-group">
                <label for="cardimg2">Card Image 2 URL:</label>
                <input type="text" class="form-control" id="cardimg2" name="cardimg2" maxlength="60"  value=<?php echo '"'. $card_img2 .'"'; ?>>
              </div>
            </div>
          </div>
          <div class="card bg-light text-dark" style="display:none">
            <div class="card-body">
              <div class="form-group">
                <label for="authorid">Author:</label>
                <input type="text" class="form-control" id="authorid" name="authorid" maxlength="60"  value=<?php echo '"'. $author_id .'"'; ?>>
              </div>
            </div>
          </div>
          <div class="card bg-light text-dark " <?php if (USER_PERMISSION == 3) {
            echo 'style="display:none;"';
          } ?>>
            <div class="card-body">
              <div class="form-group">
                <label for="authorid">Status:</label>
                <select class="form-control" id="statusid" name="statusid">
                  <?php
                  $result = mysqli_query($link, "SELECT * FROM post_status");
                  while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['status_id'] == $status_id) {
                      echo '<option value="' . $row['status_id'] . '" selected>' . $row['name'] . '</option>';
                    } else {
                      echo '<option value="' . $row['status_id'] . '">' . $row['name'] . '</option>';
                    }
                  }
                  mysqli_free_result($result);
                  mysqli_close($link);
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="card bg-light text-dark" style="display:none">
            <div class="card-body">
              <div class="form-group">
                <label for="authorid">Post Id:</label>
                <input type="text" class="form-control" id="postid" name="postid" maxlength="60"  value=<?php echo '"'. $post_id .'"'; ?>>
              </div>
            </div>
          </div>
          <hr>
          <?php
          if ($action == 'edit') {
            echo '<button id="updatePostBtn" onclick="updatePost();"  class="btn btn-primary btn-block">Update Post</button>';
          } else {
            echo '<button id="addPostBtn" onclick="addPost();" class="btn btn-primary btn-block">Add Post</button>';
          }
          ?>
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
  <script src="../../js/post.js" charset="utf-8"></script>
</body>
</html>
