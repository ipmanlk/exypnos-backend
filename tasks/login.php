<?php
// 1 - login success
// 2 - username or password is wrong
require_once '../config/config.php';
if (isset($_POST['pwd']) && !empty($_POST['pwd']) && isset($_POST['uname']) && !empty($_POST['uname'])) {
  $pwd = $_POST['pwd'];
  $username = $_POST['uname'];
  $stmt = mysqli_prepare($link, "SELECT author_id, password FROM author WHERE uname=?");
  mysqli_stmt_bind_param($stmt,'s', $username);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  mysqli_stmt_close($stmt);
  mysqli_close($link);
  if (mysqli_num_rows($result) == 1) {
    $result = mysqli_fetch_array($result);
    $hash = $result['password'];
    $author_id = $result['author_id'];
    if (password_verify($pwd, $hash)) {
      session_start();
      $_SESSION['username'] = $username;
      $_SESSION['author_id'] = $author_id;
      echo "1";
    } else {
      echo "2";
    }
  } else {
    echo "2";
  }
}
?>
