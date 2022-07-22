<?php 
session_start();
require 'database/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Lelang - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    .dropdown-item{
      color: rgba(255, 255, 255, 0.7) !important;
    }
    .dropdown-item:hover{
      /*color: red !important;*/
      background-color: rgb(89 23 143); 
    }
  </style>
</head>
<body>
  <header id="header" class="fixed-top ">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-xl-9 d-flex align-items-center">
          <h1 class="logo mr-auto"><a href="index.html">Lelang</a></h1>
          <nav class="nav-menu d-none d-lg-block">
            <ul>
              <li class="active"><a href="index.html">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="inner-page.php?page=">Daftar Barang</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </nav>
          <?php if (isset($_SESSION['login'])){ ?>
            <a class="nav-link dropdown-toggle btn" href="#" style="color: rgba(255, 255, 255, 0.7);" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user mr-2"></i>Akun Saya
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="color: #e2d1fa; background: linear-gradient(45deg, rgba(86, 58, 250, 0.9) 0%, rgba(116, 15, 214, 0.9) 100%), url(assets/img/hero-bg.jpg) center center no-repeat">
              <a class="dropdown-item" href="inner-page.php?page=tambah"> <?php echo $_SESSION['nama_lengkap']; ?> </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="inner-page.php?page=tambah"> Lelang Saya </a>
              <a class="dropdown-item" href="inner-page.php?page=db"> Pembelian Saya </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="forms/proses/logout.php"> Log Out</a>
            </div>
          </div>
        <?php } else { ?>
          <a href='forms/login.php' class='get-started-btn scrollto'>Log In</a>
        <?php } ?>
      </div>
    </div>
  </div>
</header>
<section id="hero" class="d-flex align-items-center">
  <div class="container-fluid" data-aos="fade-up">
    <div class="row justify-content-center">
      <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
        <h1>Bettter Digital Experience With Lelang</h1>
        <h2>We are team of talanted designers making websites Korlab SMK BUDI BAKTI CIWIDEY</h2>
        <div><a href="#about" class="btn-get-started scrollto">Get Started</a></div>
      </div>
      <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
        <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>
</section>
<main id="main">
  <section id="about" class="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="150">
          <img src="assets/img/about.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
          <h3>Voluptatem dignissimos provident quasi corporis</h3>
          <p class="font-italic">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua.
          </p>
          <ul>
            <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
            <li><i class="icofont-check-circled"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
            <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
          </ul>
          <a href="#" class="read-more">Read More <i class="icofont-long-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </section>
  <section id="counts" class="counts">
    <div class="container">
      <div class="row counters">
        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up">232</span>
          <p>Clients</p>
        </div>
        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up">521</span>
          <p>Projects</p>
        </div>
        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up">1,463</span>
          <p>Hours Of Support</p>
        </div>
        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up">15</span>
          <p>Hard Workers</p>
        </div>
      </div>
    </div>
  </section>
  <section id="contact" class="contact section-bg">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Contact</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="info-box mb-4">
            <i class="bx bx-map"></i>
            <h3>SMK BUDI BAKTI CIWIDEY</h3>
            <p>Jl.Babakan Tiga No.82, Ciwidey, Kec.Ciwidey, Kab.Bandung, Jawa Barat 40973-WF28+Q8 Ciwidey, Bandung, Jawa Barat (022) 5928262</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="info-box  mb-4">
            <i class="bx bx-envelope"></i>
            <h3>Email Us</h3>
            <p>railanzalali56@gmail.com</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="info-box  mb-4">
            <i class="bx bx-phone-call"></i>
            <h3>Call Us</h3>
            <p>(022) 5928262</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 ">
          <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.2413429348067!2d107.46368231405324!3d-7.098001671559312!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68f2b2c67ba193%3A0xab60fd034618b65a!2sSMK%20Budi%20Bakti%20Ciwidey!5e0!3m2!1sid!2sid!4v1586599647821!5m2!1sid!2sid" height="200" frameborder="0" style="border:0;" allowfullscreen="0" aria-hidden="true" tabindex="0" style="width: 100% !important ; overflow: hidden;"></iframe>
        </div>
        <div class="col-lg-6">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="form-row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="col-md-6 form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validate"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validate"></div>
            </div>
            <div class="mb-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>
<footer id="footer">
  <div class="container">

    <div class="copyright-wrap d-md-flex py-4">
      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>Railan</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a target="_blank" href="https://www.instagram.com/@railan_zll56">RailanZalali</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a target="_blank" href="https://www.facebook.com/railan321" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a target="_blank" href="https://www.instagram.com/@railan_zll56" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </div>
</footer>
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
<div id="preloader"></div>
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/vendor/counterup/counterup.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>