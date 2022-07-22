<?php 
include "database/connection.php";
$query = mysqli_query($db, "SELECT * FROM tb_lelang INNER JOIN tb_barang ON tb_lelang.id_barang = tb_barang.id_barang WHERE status ='dibuka'");
?>
<section id="services" class="services">
	<div class="container" data-aos="fade-up" width="250">
		<div class="section-title">
			<h2>Find Your Favorite Items</h2>
		</div>

		<div class="row">
			<?php while ($data = mysqli_fetch_assoc($query)) { ?>
				<div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
					<div class="icon-box iconbox-blue">

						<img style="width: 100%; max-width: 150px; height: 100%; max-height: 130px;" src="assets/img/<?php echo $data['gambar']; ?>" class="card-img-top">
						
						<h4><a href=""><?php echo $data['nama_barang']; ?></a></h4>
						<a class="select2"><strong><?php echo "Rp." . number_format ($data['harga_awal']); ?></strong></a>
						<div class="form-group">
							<a href="inner-page.php?page=details&id_barang=<?= $data['id_barang']?>&id_lelang=<?= $data['id_lelang']?>&nama_barang=<?= $data['nama_barang']?>" class="btn btn-primary mt-3" style="width: 100px;"> BELI </a>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>