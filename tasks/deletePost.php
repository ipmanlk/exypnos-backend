<?php
require_once 'checkSession.php';
// 1 - delete category success
// 2 - delete category fail
require_once '../config/config.php';
$required = array('post_id');
$values = array();

//check values are not empty && set properly
$error = false;
foreach($required as $field) {
  if (empty($_POST[$field]) || !isset($_POST[$field])) {
    $error = true;
    echo "2";
    break;
  } else {
    $values[$field] = $_POST[$field];
  }
}
if (USER_PERMISSION == 1) {
  $stmt = mysqli_prepare($link, "DELETE FROM post WHERE post_id=?");
  mysqli_stmt_bind_param($stmt,'i', $post_id);

  $post_id = trim($values['post_id']);

} else {
  $stmt = mysqli_prepare($link, "DELETE FROM post WHERE post_id=? AND author_id=?");
  mysqli_stmt_bind_param($stmt,'ii', $post_id, $author_id);

  $post_id = trim($values['post_id']);
  $author_id = $_SESSION['author_id'];
}

if(mysqli_stmt_execute($stmt)) {
  echo "1";
} else {
  echo "2";
}


mysqli_stmt_close($stmt);
mysqli_close($link);

?>
