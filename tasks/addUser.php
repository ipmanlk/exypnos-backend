<?php
require_once 'checkSession.php';
// 1 - add user success
// 2 - add user fail
require_once '../config/config.php';
$required = array('pwd', 'uname', 'des');
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

$stmt = mysqli_prepare($link, "INSERT INTO author(uname, description, password) VALUES(?,?,?)");
mysqli_stmt_bind_param($stmt,'sss', $username, $des, $pwd);


$username = trim($values['uname']);
$pwd = $values['pwd'];
$pwd = password_hash($pwd, PASSWORD_DEFAULT);
$des = $values['des'];

if(mysqli_stmt_execute($stmt)) {
  echo "1";
} else {
  echo "2";
}


mysqli_stmt_close($stmt);
mysqli_close($link);

?>
