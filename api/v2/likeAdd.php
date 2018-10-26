<?php

$required = array('suser_code', 'post_id');
$values = array();

//check values are not empty && set properly
$error = false;
foreach($required as $field) {
  if (empty($_GET[$field]) || !isset($_GET[$field])) {
    $error = true;
    echo "2";
    exit();
  } else {
    $values[$field] = $_GET[$field];
  }
}

require_once ('../../config/config.php');

$stmt = mysqli_prepare($link, "SELECT suser_id FROM shadow_user WHERE code = ?");
mysqli_stmt_bind_param($stmt,'s', $suser_code);
$suser_code = $values['suser_code'];
mysqli_stmt_execute($stmt);
$result = mysqli_fetch_array(mysqli_stmt_get_result($stmt));
mysqli_stmt_close($stmt);

$stmt = mysqli_prepare($link, "INSERT INTO post_like(suser_id,post_id) values (?,?)");

mysqli_stmt_bind_param($stmt,'ii', $suser_id, $post_Id);

$suser_id = $result['suser_id'];

$post_Id = trim($values['post_id']);

if (mysqli_stmt_execute($stmt)) {
  echo "1";
} else {
  echo "2";
}

mysqli_stmt_close($stmt);

mysqli_close($link);

?>