<?php 
$barang = mysqli_query($db, "SELECT * FROM tb_barang");
$jumlah_barang = mysqli_num_rows($barang);

$masyarakat = mysqli_query($db, "SELECT * FROM tb_masyarakat");
$jumlah_masyarakat = mysqli_num_rows($masyarakat);

$lelang = mysqli_query($db, "SELECT * FROM tb_lelang WHERE status = 'dibuka'");
$jumlah_lelang = mysqli_num_rows($lelang);

?>
<section class="content">

  <div class="row">
    <div class="col-lg-3 col-xs-6">

      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo $jumlah_barang; ?></h3>

          <p>Jumlah Barang</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">

      <div class="small-box bg-green">
        <div class="inner"> 
          <h3><?php echo $jumlah_lelang; ?></h3>

          <p>Lelang</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">

      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?php echo $jumlah_masyarakat; ?></h3>

          <p>Jumlah Masyarakat</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">

      <div class="small-box bg-red">
        <div class="inner">
          <h3>5</h3>

          <p>Jumlah Petugas</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

  </div>

</section>