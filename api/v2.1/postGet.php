<?php
if (isset($_GET['id'])) {
  require_once ('../../config/config.php');
  $id = $_GET['id'];
  $stmt = mysqli_prepare($link, "SELECT post_id, post, card_img1,card_img2, description as author_info FROM post,author WHERE post_id = ?");
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  mysqli_stmt_close($stmt);
  mysqli_close($link);

  $row = mysqli_fetch_assoc($result);

  echo (json_encode($row));
}
?>