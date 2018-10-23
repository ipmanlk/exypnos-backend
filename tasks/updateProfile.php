<?php
require_once 'checkSession.php';
// 1 - update profile success
// 2 - update profile fail
// 3 - inputs are missing
require_once '../config/config.php';
$required = array('uname', 'name','email','profileimg','about','pwd');
$values = array();

//check values are not empty && set properly
$error = false;
foreach($required as $field) {
  if (empty($_POST[$field]) || !isset($_POST[$field])) {
    $error = true;
    echo "3";
    exit();
  } else {
    $values[$field] = $_POST[$field];
  }
}

$stmt = mysqli_prepare($link, "UPDATE author SET uname=?,name=?,email=?,profile_img=?, description=?,password=? WHERE author_id=?");
mysqli_stmt_bind_param($stmt,'ssssssi', $uname,$name,$email,$profileimg,$about,$pwd,$authorid);

$uname = trim($values['uname']);
$name = trim($values['name']);
$email = trim($values['email']);
$profileimg = trim($values['profileimg']);
$about = trim($values['about']);
$pwd = password_hash($values['pwd'], PASSWORD_DEFAULT);
$authorid = $_SESSION['author_id'];

if(mysqli_stmt_execute($stmt)) {
  echo "1";
} else {
  echo "2";
}

mysqli_stmt_close($stmt);
mysqli_close($link);

?>
