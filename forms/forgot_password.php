<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="login/img/icon.png">
  <link rel="shortcut icon" href="profile.png">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="login/css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Change Password</title>
  <script type="text/javascript">
    function valid()
    {
      if(document.forgot.password.value!= document.forgot.confirmpassword.value)
      {
        alert("Password and Confirm Password Field do not match  !!");
        document.forgot.confirmpassword.focus();
        return false;
      }
      return true;
    }
  </script>
</head>
<form class="login-form" name="forgot" method="post">
        <a class="brand" href="../index.html">
          <div class="thumbnail"><center><img src="login/img/icon.png" height="60"/></center></div></a><p/>
          <div class="form-group">
            <input class="form-control" type="text" name="username" placeholder="username">
          </div>
          <div class="form-group">
            <input class="form-control" type="password" placeholder="New Password" id="password" name="password">
          </div>
          <div class="form-group">
            <input class="form-control" type="password" placeholder="Confirm Password" id="confirmpassword" name="confirmpassword">
          </div>
          <div class="form-group btn-container">
            <button type="submit" name="change" onclick="return valid();" class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET PASSWORD</button>
          </div>
        </form>
<body>
  <section class="material-half-bg">
    <div class="cover">
    </div>
    
  </section>
  <section class="login-content">
    <div class="login-box">
     <p style="padding-left:20%; color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></p>
     
     <p style="padding-left:20%; color:green">
      <?php if($msg){
        echo htmlentities($msg);
      }?></p>
    
      </div>
      <form action="" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="username" placeholder="Username">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" maxlength="13" name="telp" placeholder="Telp">
          <span class="glyphicon glyphicon-phone form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8" style="left: 6%;">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" name="simpan" class="btn btn-primary btn-block btn-flat">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </section>
  <!-- jQuery 3 -->
  <script src="../../Admin/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="../../Admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="../../Admin/plugins/iCheck/icheck.min.js"></script>

  </body>
  </html>




<?php session_start();
error_reporting(0);
include("../database/connection.php");
if(isset($_POST['simpan'])) {
  $_SESSION['simpan']='';
}

if(isset($_POST['simpan']))
{
 $username=$_POST['username'];
 $password=$_POST['password'];
 $query=mysqli_query($db,"SELECT * FROM tb_masyarakat WHERE username='$username'");
 $num=mysqli_fetch_array($query);
 if($num>0)
 {
  mysqli_query($db,"UPDATE tb_masyarakat SET password='$password' WHERE username='$username'");
  $msg="Password Changed Successfully";
}
else
{
  $errmsg="Invalid username";
}
}
?>

