<?php
if (isset($_GET['id'])) {
  require_once ('../../config/config.php');
  $id = $_GET['id'];
  if ($id == 0) {
    $stmt = mysqli_prepare($link, "SELECT post_id,title,cover_img,datetime,short_des,cat_id, uname as author FROM post,author WHERE post_id > ? AND post.author_id=author.author_id AND post.status_id=1 ORDER BY post_id DESC LIMIT 5");
  } else {
    $stmt = mysqli_prepare($link, "SELECT post_id,title,cover_img,datetime,short_des,cat_id, uname as author FROM post,author WHERE post_id < ? AND post.author_id=author.author_id AND post.status_id=1 ORDER BY post_id DESC LIMIT 5");
  }
  mysqli_stmt_bind_param($stmt, "s", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  mysqli_stmt_close($stmt);
  mysqli_close($link);

  $postData = array();

  while ($row = mysqli_fetch_assoc($result)) {
    $dateTime= new DateTime($row['datetime']);
    $dateTime->setTimezone(new DateTimeZone('Asia/Colombo'));
    $lkDateTime =  date_format($dateTime, 'Y-m-d g:i A');
    $row['datetime']=$lkDateTime;
    $postData[] = $row;
  }

  echo (json_encode($postData));

}
?>