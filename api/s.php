<?php
header('Access-Control-Allow-Origin: *');
if ($_GET['s']) {
  if ($_GET['s'] !== "4a2204811369") {
    exit();
  }
  if (isset($_GET['id']) && isset($_GET['cat_id'])) {
    $id = trim($_GET['id']);
    $cat_id = trim($_GET['cat_id']);
    $data = file_get_contents('https://exypnos.navinda.xyz/api/cats.php?id=' . $id . "&cat_id=" . $cat_id);
    echo $data;
    exit();
  }
  if (isset($_GET['id'])) {
    $id = trim($_GET['id']);
    $data = file_get_contents('https://exypnos.navinda.xyz/api/exy.php?id=' . $id);
    echo $data;
    exit();
  }
  if (isset($_GET['sp'])) {
    $id = trim($_GET['id']);
    $data = file_get_contents('https://exypnos.navinda.xyz/api/getCats.php');
    echo $data;
  }
}
?>