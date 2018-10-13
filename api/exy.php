<?php

require_once ('../config/config.php');

$getData = mysqli_query($link, "SELECT * FROM posts ORDER BY post_id DESC");
$postData = array();


while ($row = mysqli_fetch_assoc($getData)) {
  $postData[] = $row;
}

echo json_encode($postData);

mysqli_close($link);
?>