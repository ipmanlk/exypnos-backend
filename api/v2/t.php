<?php
header('Access-Control-Allow-Origin: *');
if ($_GET['s']) {
  if ($_GET['s'] !== "4a2204811369") {
    exit();
  }

  if (isset($_GET['r'])) {
    // register user
    $reg = trim($_GET['r']);
    $data = file_get_contents('https://exypnos.navinda.xyz/api/v2/userAdd.php?r=' . $reg);
    echo $data;
  }

  if (isset($_GET['up_c'])) {
    //check version
    $data = file_get_contents('https://exypnos.navinda.xyz/api/v2/updateCheck.php');
    echo $data;
    exit();
  }

  if (isset($_GET['fav_a'])) {
    //fav add
    $id = $_GET['post_id'];
    $suser_code = $_GET['suser_code'];
    $data = file_get_contents('https://exypnos.navinda.xyz/api/v2/favAdd.php?post_id=' . $id . '&suser_code=' . $suser_code);
    echo $data;
    exit();
  }

  if (isset($_GET['fav_g'])) {
    //favs get
    $suser_code = $_GET['suser_code'];
    $data = file_get_contents('https://exypnos.navinda.xyz/api/v2/favsGet.php?suser_code=' . $suser_code);
    echo $data;
    exit();
  }

  if (isset($_GET['fav_d'])) {
    //fav delete
    $id = $_GET['post_id'];
    $suser_code = $_GET['suser_code'];
    $data = file_get_contents('https://exypnos.navinda.xyz/api/v2/favDel.php?post_id=' . $id . '&suser_code=' . $suser_code);
    echo $data;
    exit();
  }


  if (isset($_GET['lke_a'])) {
    //like add
    $id = $_GET['post_id'];
    $suser_code = $_GET['suser_code'];
    $data = file_get_contents('https://exypnos.navinda.xyz/api/v2/likeAdd.php?post_id=' . $id . '&suser_code=' . $suser_code);
    echo $data;
    exit();
  }

  if (isset($_GET['lke_g'])) {
    // like get
    $id = trim($_GET['post_id']);
    $data = file_get_contents('https://exypnos.navinda.xyz/api/v2/likeGet.php?post_id=' . $id);
    echo $data;
    exit();
  }

  if (isset($_GET['lke_c'])) {
    // like check
    $id = $_GET['post_id'];
    $suser_code = $_GET['suser_code'];
    $data = file_get_contents('https://exypnos.navinda.xyz/api/v2/likeCheck.php?post_id=' . $id . '&suser_code=' . $suser_code);
    echo $data;
    exit();
  }

  if (isset($_GET['id']) && isset($_GET['cat_id']) && isset($_GET['p_list'])) {
    // get posts by cat
    $id = trim($_GET['id']);
    $cat_id = trim($_GET['cat_id']);
    $data = file_get_contents('https://exypnos.navinda.xyz/api/v2/postsByCat.php?id=' . $id . "&cat_id=" . $cat_id);
    echo $data;
    exit();
  }

  if (isset($_GET['id'])  && isset($_GET['p_list'])) {
    // get posts
    $id = trim($_GET['id']);
    $data = file_get_contents('https://exypnos.navinda.xyz/api/v2/postsList.php?id=' . $id);
    echo $data;
    exit();
  }

  if (isset($_GET['id'])  && isset($_GET['p_get'])) {
    // get posts
    $id = trim($_GET['id']);
    $data = file_get_contents('https://exypnos.navinda.xyz/api/v2/postGet.php?id=' . $id);
    echo $data;
    exit();
  }

  if (isset($_GET['c_list'])) {
    // get categroies
    $id = trim($_GET['id']);
    $data = file_get_contents('https://exypnos.navinda.xyz/api/v2/catsGet.php');
    echo $data;
  }
}
?>