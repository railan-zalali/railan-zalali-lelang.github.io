<?php 
session_start();
if (isset($_SESSION['login'])) {
  header('location: ../index.php');
  die;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lelang | Registration Page</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../admin/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../admin/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../admin/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../admin/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="../index.php"><b>Lelang</b>Online</a>
    </div>
    <div class="register-box-body">
      <?php 
      if (isset($_GET['pesan'])) {
        if ($_GET['pesan']=="gagal") {
          echo "<div class='alert alert-danger alert-dismissible'> <strong> Gagal </strong>Username sudah ada !</div>";
        }
      }
      ?>
      <p class="login-box-msg">Register a new membership</p>
      <form action="proses/proses_simpan.php" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" minlength="5" name="nama_lengkap" placeholder="Nama Lengkap" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" minlength="5" name="username" placeholder="Username" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="number" class="form-control" minlength="11" maxlength="13" name="telp" placeholder="No.Telp" autocomplete="off" required>
          <span class="glyphicon glyphicon-phone form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" minlength="5" name="password" placeholder="Password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <button type="submit" name="simpan" class="btn btn-primary btn-block btn-flat">Register</button>
          </div>
        </div>
      </form>
      <div class="social-auth-links text-center">
        <a href="login.php" class="text-center">Saya Punya Akun</a>
      </div>
    </div>
  </div>
  <script src="../admin/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="../admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../admin/plugins/iCheck/icheck.min.js"></script>
  <script>
    function goodchars(e, goods, field) {
      var key, keychar;
      key = getkey(e);
      if (key == null) return true;
      keychar = String.fromCharCode(key);
      keychar = keychar.toLowerCase();
      goods   = goods.toLowerCase();
            // check goodkeys
            if (goods.indexOf(keychar) != -1)
              return true;
            // control keys
            if ( key==null || key==0 || key==8 || key==9 || key==27 )
              return true;
            if (key == 13) {
              var i;
              for (i = 0; i < field.form.elements.length; i++)
                if (field == field.form.elements[i])
                  break;
                i = (i + 1) % field.form.elements.length;
                field.form.elements[i].focus();
                return false;
              };
            // else return false
            return false;
          }
        </script>  
      </body>
      </html>
