<?php
include 'vendor/header.php';
?>
<main id="main">
  <section class="inner-page" style="padding: 70px !important;">
    <div class="container">
      <?php 
      if (empty($_GET['page'])) {
        include 'pages/barang.php';
      } elseif ($_GET['page']=='tambah') {
        include 'forms/tambah_barang.php';
      } elseif ($_GET['page']=='db') {
        include 'pages/db.php';
      } elseif ($_GET['page']=='ubah') {
        include 'forms/form_ubah.php';
      } elseif ($_GET['page']=='details') {
        include 'details.php';
      }
      ?>
    </div>
  </section>
</main>
<?php 
include 'vendor/footer.php';
?>