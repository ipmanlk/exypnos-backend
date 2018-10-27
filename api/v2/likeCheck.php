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

// grab user id
$stmt = mysqli_prepare($link, "SELECT suser_id FROM shadow_user WHERE code = ?");
mysqli_stmt_bind_param($stmt,'s', $suser_code);
$suser_code = $values['suser_code'];
mysqli_stmt_execute($stmt);
$result = mysqli_fetch_array(mysqli_stmt_get_result($stmt));
mysqli_stmt_close($stmt);

// get likes to psot from that user
$stmt = mysqli_prepare($link, "SELECT COUNT(*) AS user_like FROM post_like WHERE suser_id = ? AND post_id = ?");
mysqli_stmt_bind_param($stmt,'ii', $suser_id, $post_Id);
$suser_id = $result['suser_id'];
$post_Id = trim($values['post_id']);
mysqli_stmt_execute($stmt);
$result = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
echo ($result['user_like']);
mysqli_stmt_close($stmt);

// get views fpr current post
$views=0;
$stmt = mysqli_prepare($link, "SELECT views FROM post_view WHERE post_id = ?");
mysqli_stmt_bind_param($stmt,'i', $post_Id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if (mysqli_num_rows($result) == 1) {
  $result = mysqli_fetch_assoc($result);
  $views = (int)($result['views']);
}

mysqli_stmt_close($stmt);

// update views
if ($views == 0) {
  $stmt = mysqli_prepare($link, "INSERT INTO post_view(views, post_id) VALUES(?,?)");
} else {
  $stmt = mysqli_prepare($link, "UPDATE post_view SET views=? WHERE post_id = ?");
}

$views = $views + 1;

mysqli_stmt_bind_param($stmt,'ii', $views , $post_Id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

mysqli_close($link);
?>