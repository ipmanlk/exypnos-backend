<?php
require_once 'checkSession.php';
// 1 - add category success
// 2 - add category fail
if (USER_PERMISSION == 1) {
  require_once '../config/config.php';
  $required = array('cat_name');
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

  $stmt = mysqli_prepare($link, "INSERT INTO category(name) VALUES(?)");
  mysqli_stmt_bind_param($stmt,'s', $cat_name);

  $cat_name = trim($values['cat_name']);

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
