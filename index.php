<?php
session_start();
if (isset($_SESSION['username']) || !empty($_SESSION['username'])) {
  header("location: ./dash/");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exypnos : Log in</title>
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <script src="./js/jquery-3.3.1.min.js" charset="utf-8"></script>
  <script src="./js/bootstrap.min.js" charset="utf-8"></script>
</head>
<body class="bg-dark">
  <div class="container py-5">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6 mx-auto">
            <!-- form card login -->
            <div class="card rounded-0">
              <div class="card-header">
                <div class="text-center">
                  <img src="/img/logo.png" width="150px">
                </div>
              </div>
              <div class="card-body">
                <form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
                  <div class="form-group">
                    <label for="uname1">Username</label>
                    <input type="text" class="form-control form-control-lg rounded-0" value="" name="uname" id="uname1" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control form-control-lg rounded-0" id="pwd" name="pwd" required>
                  </div>
                  <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Login</button>
                </form>
              </div>
              <!--/card-block-->
            </div>
            <!-- /form card login -->

          </div>

        </div>
        <!--/row-->
      </div>
      <!--/col-->
    </div>
    <!--/row-->
  </div>
  <!--/container-->

  <!-- scripts -->
  <script src="./js/login.js" charset="utf-8"></script>

</body>
</html>
