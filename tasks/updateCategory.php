<?php
require_once 'checkSession.php';
// 1 - update category success
// 2 - update category fail
if (USER_PERMISSION == 1) {
  require_once '../config/config.php';
  $required = array('cat_id', 'cat_name');
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

  $stmt = mysqli_prepare($link, "UPDATE category SET name=? WHERE cat_id=?");
  mysqli_stmt_bind_param($stmt,'si', $cat_name, $cat_id);

  $cat_name = trim($values['cat_name']);
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
