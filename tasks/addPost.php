<?php
require_once 'checkSession.php';
// 1 - data insert successful
// 2 - inputs are missing
// 3 - data insert error
$required = array('title', 'post', 'coverimg', 'cardimg1', 'cardimg2', 'authorid', 'shortdes','categoryid','statusid');
$values = array();
//check values are not empty && set properly
$error = false;
foreach($required as $field) {
  if (empty($_POST[$field]) || !isset($_POST[$field])) {
    $error = true;
    echo "2";
    exit();
  } else {
    $values[$field] = $_POST[$field];
  }
}

if (!$error) {
  require_once ('../config/config.php');
  //prepare statement to insert values
  $stmt = mysqli_prepare($link, "INSERT INTO post(title,post,cover_img,card_img1,card_img2,short_des,author_id,cat_id,status_id) VALUES(?,?,?,?,?,?,?,?,?)");
  mysqli_stmt_bind_param($stmt,'ssssssiii',$title,$post,$coverimg,$cardimg1,$cardimg2,$shortdes,$authorid, $categoryid, $statusid);

  //assign values
  $title = $values['title'];
  $post = $values['post'];
  $coverimg = $values['coverimg'];
  $cardimg1 = $values['cardimg1'];
  $cardimg2 = $values['cardimg2'];
  $authorid = $values['authorid'];
  $shortdes = $values['shortdes'];
  $categoryid = $values['categoryid'];
  $statusid =  $values['statusid'];

  if (USER_PERMISSION == 3) {
    $statusid = 2;
  }

  //execute statement & get result
  if (mysqli_stmt_execute($stmt)) {
    echo "1";
  } else {
    echo "3";
  }

  // close statement
  mysqli_stmt_close($stmt);

  // close connection
  mysqli_close($link);
}
?>
