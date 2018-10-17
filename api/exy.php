<?php
header('Access-Control-Allow-Origin: *');

if (isset($_GET['id'])) {
  require_once ('../config/config.php');
  $id = $_GET['id'];
  if ($id == 0) {
    $stmt = mysqli_prepare($link, "SELECT post_id,title,cover_img,post,card_img1,card_img2,datetime,short_des,description as author_info, uname as author FROM posts,author WHERE post_id > ? AND posts.author_id=author.author_id ORDER BY post_id DESC LIMIT 5");
  } else {
    $stmt = mysqli_prepare($link, "SELECT post_id,title,cover_img,post,card_img1,card_img2,datetime,short_des,description as author_info, uname as author FROM posts,author WHERE post_id < ? AND posts.author_id=author.author_id ORDER BY post_id DESC LIMIT 5");
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