<?php
require_once 'checkSession.php';
// 1 - data update successful
// 2 - inputs are missing
// 3 - data update error
$required = array('title', 'post', 'coverimg', 'cardimg1', 'cardimg2', 'authorid', 'shortdes','postid','categoryid','statusid');
$values = array();
//check values are not empty && set properly
$error = false;
foreach($required as $field) {
  if (empty($_POST[$field]) || !isset($_POST[$field])) {
    $error = true;
    echo "2";
    break;
  } else {
    $values[$field] = $_POST[$field];
  }
}

if (!$error) {
  require_once ('../config/config.php');

  if (USER_PERMISSION == 3) {
    //prepare statement to insert values
    $stmt = mysqli_prepare($link, "UPDATE post SET title=?,post=?,cover_img=?,card_img1=?,card_img2=?,author_id=?,short_des=?,cat_id=?,status_id=? WHERE post_id=? AND author_id=?");

    mysqli_stmt_bind_param($stmt,'sssssssiiii',$title,$post,$coverimg,$cardimg1,$cardimg2,$author,$shortdes,$categoryid,$statusid,$postid,$authorid);
  } else {
    //prepare statement to insert values
    $stmt = mysqli_prepare($link, "UPDATE post SET title=?,post=?,cover_img=?,card_img1=?,card_img2=?,author_id=?,short_des=?,cat_id=?,status_id=? WHERE post_id=?");

    mysqli_stmt_bind_param($stmt,'sssssssiii',$title,$post,$coverimg,$cardimg1,$cardimg2,$author,$shortdes,$categoryid,$statusid,$postid);
  }

  //assign values
  $title = $values['title'];
  $post = $values['post'];
  $coverimg = $values['coverimg'];
  $cardimg1 = $values['cardimg1'];
  $cardimg2 = $values['cardimg2'];
  $author = $values['authorid'];
  $shortdes = $values['shortdes'];
  $categoryid = $values['categoryid'];
  $postid = $values['postid'];
  $statusid = $values['statusid'];
  $authorid = $_SESSION['author_id'];
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
