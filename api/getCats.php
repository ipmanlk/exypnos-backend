<?php
// output list of categories
header('Access-Control-Allow-Origin: *');
require_once ('../config/config.php');
$stmt = mysqli_prepare($link, "SELECT * FROM category");
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
mysqli_stmt_close($stmt);
mysqli_close($link);

while ($row = mysqli_fetch_assoc($result)) {
  $catsData[] = $row;
}

echo (json_encode($catsData));
?>