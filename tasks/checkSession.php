<?php
session_start();
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
  header("location: ../index.php");
  exit;
}

define('USER_PERMISSION', $_SESSION['p']);
?>