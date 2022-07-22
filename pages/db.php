<?php 
if (!isset($_SESSION['login'])) {
  header("location: forms/login.php");
}
?>
<section class="services section-bg"> 
  <div class="container" data-aos="fade-up" width="250">
    <div class="section-title"> 
      <h2>Penawaran Anda</h2>
    </div>
    <div class="row">
      <?php
      $no = 1;
      $id_barang = $_SESSION['id_barang'];
      $query = mysqli_query($db, "SELECT *, a.nama_lengkap as nama_penjual, b.nama_lengkap as nama_pembeli FROM list_penawaran
       INNER JOIN tb_barang ON list_penawaran.id_barang = tb_barang.id_barang
       INNER JOIN tb_masyarakat a  ON a.id_user = list_penawaran.id_user 
       LEFT JOIN tb_masyarakat b   ON b.id_user = list_penawaran.id_user_pembeli 
       WHERE list_penawaran.id_barang = '$id_barang'
       ORDER BY penawaran_harga DESC");
       ?>
       <div class="col-sm-12 wapper-scroll-y my-custom-scrollbar" style="position: relative; height: 290px; overflow: auto; display: block;">
        <?php while ($data = mysqli_fetch_assoc($query)) { ?>
          <div class="alert alert-info alert-dismissible" role="alert">
            <strong><?php echo $data['nama_pembeli']; ?></strong>
            Penawar Dari Barang <strong><?php echo $data['nama_barang'];?></strong>
            Dengan Harga <strong><?php echo "Rp.". number_format($data['penawaran_harga']); ?></strong>
            Silahkan Hubungi <strong><u><?php echo $data['telp']; ?></u></strong>
          </div>
          <?php
        } ?>
      </div>
    </div>  
  </section>