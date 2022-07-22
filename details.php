<?php
$id_barang = $_GET['id_barang'];
$nama_barang = $_GET['nama_barang'];

$query = mysqli_query($db, "SELECT * FROM tb_lelang INNER JOIN tb_barang ON tb_lelang.id_barang = tb_barang.id_barang 
  WHERE nama_barang = '$nama_barang' ");
$data = mysqli_fetch_assoc($query);
?>
<section id="portfolio-details" class="portfolio-details">
  <div class="container" data-aos="fade-up">
    <div class="owl-carousel portfolio-details-carousel">
      <img src="assets/img/<?php echo $data['gambar']; ?>" class="img-fluid" alt="">
    </div>
    <div class="portfolio-info" style="width: 350px;">
      <h3>Info Barang</h3>
      <?php 
      $query = mysqli_query($db, "SELECT MAX(penawaran_harga) AS harga_terakhir FROM list_penawaran WHERE id_barang = '$id_barang' ");
      $row = mysqli_fetch_assoc($query);

      $ha = intval($row['harga_terakhir'] + (10/100) * $row['harga_terakhir']);
      ?>
      <ul>
        <li><strong>Nama</strong> : <?php echo $data['nama_barang']; ?></li>
        <li><strong>Tanggal Masuk</strong> : <?php echo $data['tgl']; ?></li>
        <li><strong>Harga Awal</strong> : <?php echo "Rp." . number_format ($data['harga_awal']); ?></li>
        <li><strong>Penawaran Tertinggi</strong> : <a class="btn btn-info btn-xs">
          <?php 
          $harga = mysqli_query($db, "SELECT MAX(penawaran_harga) AS harga_terakhir FROM list_penawaran WHERE id_barang = '$id_barang'");
          $hasil = mysqli_fetch_assoc($harga);
          if ($hasil['harga_terakhir'] > 0) {
            $harga_tertinggi = $hasil['harga_terakhir'];
            echo "Rp.".number_format($harga_tertinggi);
          } else {
            echo "Rp.".number_format($data['harga_awal']);
          }
          ?>
        </a></li>
      </ul>
      <?php if (isset($_SESSION['login'])) { ?>
        <?php if (!isset($_SESSION['ikut_lelang'])){ ?>
          <form action="" method="POST">
            <div class="slidecontainer">
              <label><strong>Penawaran Anda</strong> :</label>
              <input type="number" class="form-control" name="akhir" min="<?php echo $ha == 0 ? $data['harga_awal'] : $ha ?>" id="myRange" required>
              <input type="hidden" name="nama_barang" value="<?php echo $nama_barang ?>">
              <button type="submit" name="ikutlelang" class="btn btn-primary mt-2" style="width: 100%;">Ikut Lelang Dengan Harga  <span id="demo"></span> </button>
            </div>
          </form>
        <?php } if (isset($_SESSION['ikut_lelang'])) { ?>
          <form action="" method="POST">
            <div class="slidecontainer">
              <label><strong>Penawaran Anda</strong> :</label>
              <input type="number" class="form-control" name="akhir" min="<?php echo $ha == 0 ? $data['harga_awal'] : $ha ?>" id="myRange" required>
              <input type="hidden" name="nama_barang" value="<?php echo $nama_barang ?>">
              <button type="submit" name="ikutlelang" class="btn btn-primary mt-2" style="width: 100%;">Ikut Lelang Dengan Harga  <span id="demo"></span></button>
            </div>
          </form>
        <?php } } else { ?>
          <a href="forms/login.php" class="btn btn-warning"> Anda Harus Login Terlebih Dahulu</a>
        <?php } ?>
      </div>
      <div class="portfolio-description">
        <h2>Deskripsi</h2>
        <p>
          <?php echo $data['deskripsi_barang']; ?>
        </p>
      </div>
    </div>
  </section>
  <?php 
  if (isset($_POST['ikutlelang'])) {

   $id_user = $_SESSION['id_user'];
   $id_barang = $_GET['id_barang'];

   $query = mysqli_query($db, "SELECT * FROM tb_barang WHERE id_barang = '$id_barang'");
   $row = mysqli_fetch_assoc($query);

   if ($row['id_user'] == $id_user) {
    echo "<script>
    alert('Anda tidak dapat membeli barang anda sendiri');
    document.location.href = 'inner-page.php?page=details&id_barang=$id_barang&nama_barang=$nama_barang'
    </script>";
    die;
    }
  $harga_akhir = $_POST['akhir'];
  $nama_barang = $_POST['nama_barang'];
  $q = mysqli_query($db, "SELECT * FROM tb_lelang WHERE id_lelang AND id_barang = '$id_barang'");
  $d = mysqli_fetch_assoc($q);
  $queryupdate = mysqli_query($db, "INSERT INTO list_penawaran(id_list,id_barang,id_lelang,id_user,id_user_pembeli,penawaran_harga) 
    VALUES('','$id_barang','$d[id_lelang]','$d[id_user]','$id_user','$harga_akhir')")
  or die('ada kesalahan dengan UPDATE harga'.mysqli_error($db));
  if ($queryupdate) {
    $_SESSION['id_barang'] = $d['id_barang'];
    $_SESSION['id_lelang'] = $d['id_lelang'];
    $_SESSION['ikut_lelang'] = true;
    $_SESSION['lelang_akhir'] = $_POST['akhir'];
    echo "<script>document.location.href = 'inner-page.php?page=details&id_barang=$id_barang&nama_barang=$nama_barang'</script>";
  }
}
mysqli_close($db);
?>
