<?php 
session_start();
if (isset($_SESSION['login'])) {
  header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lelang | Log in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../admin/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../admin/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../admin/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../admin/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="index2.html"><b>Lelang</b>Online</a>
    </div>
    <div class="login-box-body">
      <p class="login-box-msg">
        <?php 
        if (isset($_GET['pesan'])) {
          if ($_GET['pesan']=="gagal") {
            echo "<div class='alert alert-danger'><strong>Gagal </strong>Username dan Pasword tidak sesuai !</div>";
          }
        }
        ?>
      </p>
      <form action="proses/check_login.php" method="post">
        <div class="form-group has-feedback">
          <input type="username" name="username" class="form-control" placeholder="Username" autocomplete="off" required>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" minlength="5" class="form-control" placeholder="Password" autocomplete="off" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <button type="submit" name="masuk" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
        </div>
        <!-- <small><a href="#">Lupa Password?</a></small><br> -->
        <small>Belum Punya Akun? <a href="register.php">klick disini</a></small>
      </form>
    </div>
  </div>
  <script src="../admin/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="../admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../admin/plugins/iCheck/icheck.min.js"></script>
</body>
</html>
