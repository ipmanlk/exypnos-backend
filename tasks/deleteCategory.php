<?php
require_once 'checkSession.php';
// 1 - delete category success
// 2 - delete category fail
if (USER_PERMISSION == 1) {
  require_once '../config/config.php';
  $required = array('cat_id');
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

  $stmt = mysqli_prepare($link, "DELETE FROM category WHERE cat_id=?");
  mysqli_stmt_bind_param($stmt,'s', $cat_id);

  $cat_id = trim($values['cat_id']);

  if(mysqli_stmt_execute($stmt)) {
    echo "1";
  } else {
    echo "2";
  }
  mysqli_stmt_close($stmt);
  mysqli_close($link);
} else {
  echo "2";
}
?>
