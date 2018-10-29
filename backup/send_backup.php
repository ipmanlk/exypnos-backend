<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './lib/src/Exception.php';
require './lib/src/PHPMailer.php';
require './lib/src/SMTP.php';

$path = "./BACKUP_DIR";

// get latest backup
$latest_ctime = 0;
$latest_filename = '';

$d = dir($path);
while (false !== ($entry = $d->read())) {
  $filepath = "{$path}/{$entry}";
  // could do also other checks than just checking whether the entry is a file
  if (is_file($filepath) && filectime($filepath) > $latest_ctime) {
    $latest_ctime = filectime($filepath);
    $latest_filename = $entry;
  }
}

$path = $path . '/' . $latest_filename;



/* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
$mail = new PHPMailer(TRUE);

/* Open the try/catch block. */
try {

  $mail->setFrom('exypnosapp@yandex.com', 'Exypnos');
  $mail->addAddress('navinda@yandex.com', 'Navinda');
  $mail->Subject = 'backup-' . time();
  $mail->Body = 'backup-' . time();
  $mail->addAttachment($path);
  $mail->isSMTP();
  $mail->Host = 'smtp.yandex.com';
  $mail->SMTPAuth = TRUE;
  $mail->SMTPSecure = 'ssl';
  $mail->Username = 'exypnosapp@yandex.com';
  $mail->Password = 'ulpolymvedzgcezt';
  $mail->Port = 465;

  /* Enable SMTP debug output. */
  // $mail->SMTPDebug = 4;



  $mail->send();
}
catch (Exception $e)
{
   /* PHPMailer exception. */
   echo $e->errorMessage();
}
catch (\Exception $e)
{
   /* PHP exception (note the backslash to select the global namespace Exception class). */
   echo $e->getMessage();
}

// delete backup
unlink($path);

?>