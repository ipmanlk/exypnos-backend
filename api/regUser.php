<?php
if (isset($_GET['r']) && !empty($_GET['r'])) {
  require_once '../config/config.php';
  $stmt = mysqli_prepare($link, "SELECT suser_id FROM shadow_user ORDER BY suser_id DESC LIMIT 1");
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  mysqli_stmt_close($stmt);

  $result = mysqli_fetch_assoc($result);
  $suser_id = (int) ($result['suser_id']);
  $suser_id = $suser_id + 1;
  $hash = hash('sha512',uniqid($suser_id, true));
  $code = substr($hash, 0, 20);

  $stmt = mysqli_prepare($link, "INSERT INTO shadow_user VALUES(?,?)");

  mysqli_stmt_bind_param($stmt,'is', $suser_id, $code);

  if (mysqli_stmt_execute($stmt)) {
    echo $code;
  } else {
    echo "string";
  }

  mysqli_stmt_close($stmt);
  mysqli_close($link);
}
?>