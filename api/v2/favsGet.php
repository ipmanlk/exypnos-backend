<?php

$required = array('suser_code');
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

// get user id
$stmt = mysqli_prepare($link, "SELECT suser_id FROM shadow_user WHERE code = ?");
mysqli_stmt_bind_param($stmt,'s', $suser_code);
$suser_code = $values['suser_code'];
mysqli_stmt_execute($stmt);
$result = mysqli_fetch_array(mysqli_stmt_get_result($stmt));
mysqli_stmt_close($stmt);
$suser_id = $result['suser_id'];

$result = mysqli_query($link, "SELECT post_id,title,cover_img,datetime,short_des,cat_id, uname as author FROM post,author WHERE post.author_id=author.author_id AND post.status_id=1 AND post.post_id IN (SELECT post_id FROM shadow_user_favs WHERE suser_id='$suser_id')");

$favData = array();

while ($row = mysqli_fetch_array($result)) {
  $favData[($row['post_id'])] = $row;
}

echo (json_encode($favData));

mysqli_close($link);

?>