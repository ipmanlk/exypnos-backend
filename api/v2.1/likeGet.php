<?php
// output list of categories
$required = array('post_id');
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
$stmt = mysqli_prepare($link, "SELECT COUNT(post_id) AS post_likes FROM post_like WHERE post_id = ?");
mysqli_stmt_bind_param($stmt,'i', $post_id);
$post_id = $values['post_id'];
mysqli_stmt_execute($stmt);
$result = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
echo (json_encode($result));

mysqli_stmt_close($stmt);
mysqli_close($link);

?>