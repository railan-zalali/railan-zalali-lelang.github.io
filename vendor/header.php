<?php 
session_start();
require_once "database/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Lelang - Page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/all.min.css">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    img {
      width: 150px;
    } 
    .navbar{
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1;
      background: linear-gradient(45deg, rgba(86, 58, 250, 0.9) 0%, rgba(116, 15, 214, 0.9) 100%), url(../img/hero-bg.jpg) center center no-repeat;
    }
    .main-header a{
      color: rgba(255, 255, 255, 0.9) ;
    }
  </style>
</head>
<body>
  <header class="main-header">
   <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#">Lelang Ol</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="inner-page.php?page="> Daftar Barang </a>
          </li>
          <li class="nav-item dropdown">
            <?php if (isset($_SESSION['login'])) { ?>
              <a class="nav-link dropdown-toggle btn" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user mr-2"></i>Akun Saya
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background: linear-gradient(45deg, rgba(86, 58, 250, 0.9) 0%, rgba(116, 15, 214, 0.9) 100%), url(../img/hero-bg.jpg) center center no-repeat">
                <a class="dropdown-item" href="#"><?php echo $_SESSION['nama_lengkap']; ?> </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="inner-page.php?page=tambah"> Lelang Saya </a>
                <a class="dropdown-item" href="inner-page.php?page=db"> Pembelian Saya </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="forms/proses/logout.php"> Log Out</a>
              </div>
            </li>
          <?php } else { ?>
            <a href='forms/login.php' class='get-started-btn scrollto'>Log In</a>;
          <?php } ?>
        </ul>
      </div>
    </div>
  </header>