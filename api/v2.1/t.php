<?php
header('Access-Control-Allow-Origin: *');
if ($_POST['s']) {
  if ($_POST['s'] !== "f6d9248ac046") {
    exit();
  }

  if (isset($_POST['r'])) {
    // register user
    $reg = trim($_POST['r']);
    $data = file_get_contents('https://exypnos.navinda.xyz/api/v2.1/userAdd.php?r=' . $reg);
    echo $data;
  }

  if (isset($_POST['up_c'])) {
    //check version
    $data = file_get_contents('https://exypnos.navinda.xyz/api/v2.1/updateCheck.php');
    echo $data;
    exit();
  }

  if (isset($_POST['cmd']) && $_POST['cmd'] == "fav_a") {
    //fav add
    $id = $_POST['post_id'];
    $suser_code = $_POST['suser_code'];
    $data = file_get_contents('https://exypnos.navinda.xyz/api/v2.1/favAdd.php?post_id=' . $id . '&suser_code=' . $suser_code);
    echo $data;
    exit();
  }

  if (isset($_POST['cmd']) && $_POST['cmd'] == "fav_g") {
    //favs get
    $suser_code = $_POST['suser_code'];
    $data = file_get_contents('https://exypnos.navinda.xyz/api/v2.1/favsGet.php?suser_code=' . $suser_code);
    echo $data;
    exit();
  }

  if (isset($_POST['cmd']) && $_POST['cmd'] == "fav_d") {
    //fav delete
    $id = $_POST['post_id'];
    $suser_code = $_POST['suser_code'];
    $data = file_get_contents('https://exypnos.navinda.xyz/api/v2.1/favDel.php?post_id=' . $id . '&suser_code=' . $suser_code);
    echo $data;
    exit();
  }


  if (isset($_POST['lke_a'])) {
    //like add
    $id = $_POST['post_id'];
    $suser_code = $_POST['suser_code'];
    $data = file_get_contents('https://exypnos.navinda.xyz/api/v2.1/likeAdd.php?post_id=' . $id . '&suser_code=' . $suser_code);
    echo $data;
    exit();
  }

  if (isset($_POST['lke_g'])) {
    // like get
    $id = trim($_POST['post_id']);
    $data = file_get_contents('https://exypnos.navinda.xyz/api/v2.1/likeGet.php?post_id=' . $id);
    echo $data;
    exit();
  }

  if (isset($_POST['lke_c'])) {
    // like check
    $id = $_POST['post_id'];
    $suser_code = $_POST['suser_code'];
    $data = file_get_contents('https://exypnos.navinda.xyz/api/v2.1/likeCheck.php?post_id=' . $id . '&suser_code=' . $suser_code);
    echo $data;
    exit();
  }

  if (isset($_POST['post_id']) && isset($_POST['cat_id']) && isset($_POST['p_list'])) {
    // get posts by cat
    $id = trim($_POST['post_id']);
    $cat_id = trim($_POST['cat_id']);
    $data = file_get_contents('https://exypnos.navinda.xyz/api/v2.1/postsByCat.php?id=' . $id . "&cat_id=" . $cat_id);
    echo $data;
    exit();
  }

  if (isset($_POST['post_id'])  && isset($_POST['p_list'])) {
    // get posts
    $id = trim($_POST['post_id']);
    $data = file_get_contents('https://exypnos.navinda.xyz/api/v2.1/postsList.php?id=' . $id);
    echo $data;
    exit();
  }

  if (isset($_POST['post_id'])  && isset($_POST['p_get'])) {
    // get posts
    $id = trim($_POST['post_id']);
    $data = file_get_contents('https://exypnos.navinda.xyz/api/v2.1/postGet.php?id=' . $id);
    echo $data;
    exit();
  }

  if (isset($_POST['c_list'])) {
    // get categroies
    $id = trim($_POST['id']);
    $data = file_get_contents('https://exypnos.navinda.xyz/api/v2.1/catsGet.php');
    echo $data;
  }
}
?>