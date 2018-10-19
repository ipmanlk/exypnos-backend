<?php
require_once 'checkSession.php';
require_once '../config/config.php';

$stmt = mysqli_prepare($link, "SELECT * FROM category");
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$catData = [];
while ($row = mysqli_fetch_assoc($result)) {
  $catData[] = $row;
}
mysqli_stmt_close($stmt);
mysqli_close($link);
echo (json_encode($catData));
?>
