<?php
if (isset($_GET['r']) && !empty($_GET['r'])) {
  require_once '../config/config.php';
  $uuid = trim($_GET['r']);
  $hash = hash('sha512', $uuid);
  $code = substr($hash, 0, 20);

  // check if device is already registered
  $stmt = mysqli_prepare($link, "SELECT code FROM shadow_user WHERE code=?");
  mysqli_stmt_bind_param($stmt,'s', $code);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  mysqli_stmt_close($stmt);

  // if device is registered
  if (mysqli_num_rows($result) == 1) {
    // show registered code
    echo $code;
  } else {
    // generate new code
    $stmt = mysqli_prepare($link, "SELECT suser_id FROM shadow_user ORDER BY suser_id DESC LIMIT 1");
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    $result = mysqli_fetch_assoc($result);
    $suser_id = (int) ($result['suser_id']);
    $suser_id = $suser_id + 1;

    $stmt = mysqli_prepare($link, "INSERT INTO shadow_user(suser_id, code) VALUES(?,?)");

    mysqli_stmt_bind_param($stmt,'is', $suser_id, $code);

    if (mysqli_stmt_execute($stmt)) {
      echo $code;
    }
  }

  mysqli_stmt_close($stmt);
  mysqli_close($link);
}
?>