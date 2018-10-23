<?php
header('Access-Control-Allow-Origin: *');

if (isset($_GET['id']) && isset($_GET['cat_id'])) {
  require_once ('../config/config.php');
  $id = $_GET['id'];
  $cat_id = $_GET['cat_id'];

  if ($id == 0) {
    $stmt = mysqli_prepare($link, "SELECT post_id,title,cover_img,post,card_img1,card_img2,datetime,short_des,cat_id,description as author_info, uname as author FROM post,author WHERE post_id > ? AND post.author_id=author.author_id  AND post.status_id=1 AND cat_id=? ORDER BY post_id DESC LIMIT 5");
  } else {
    $stmt = mysqli_prepare($link, "SELECT post_id,title,cover_img,post,card_img1,card_img2,datetime,short_des,cat_id,description as author_info, uname as author FROM post,author WHERE post_id < ? AND post.author_id=author.author_id  AND post.status_id=1 AND cat_id=? ORDER BY post_id DESC LIMIT 5");
  }
  mysqli_stmt_bind_param($stmt, "ii", $id, $cat_id);
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