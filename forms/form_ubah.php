<?php
// jika tombol ubah diklik
if (isset($_GET['id_barang'])) {
    	// ambil data get dari form
	$id_barang = $_GET['id_barang'];
	$query1 = mysqli_query($db, "SELECT * FROM tb_lelang WHERE id_barang = '$id_barang'")
	or die('ada kesalahan pada query tampil lelang '.mysqli_error($db));
	$data1 = mysqli_fetch_assoc($query1);
	$status = $data1['status'];
	if ($status=='dibuka') {
		echo "<script>
		alert('Anda tidak dapat mengedit barang karena sedang dalam proses lelang');
		document.location.href = 'inner-page.php?page=tambah'
		</script>";
		die;
	} 
        // perintah query untuk menampilkan data dari tabel barang berdasarkan id_barang
	$query = mysqli_query($db, "SELECT * FROM tb_barang WHERE id_barang='$id_barang'") or die('Query Error : '.mysqli_error($db));
	$data = mysqli_fetch_assoc($query);
    	// buat variabel untuk menampung data
	$id_barang          = $data['id_barang'];
	$nama_barang        = $data['nama_barang'];
	$harga_awal 		= $data['harga_awal'];
	$deskripsi_barang	= $data['deskripsi_barang'];
	$gambar 			= $data['gambar'];
}
?>
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-info" role="alert">
			<i class="fas fa-edit"></i> Ubah Data barang
		</div>
		<div class="card">
			<div class="card-body">
				<form class="needs-validation" action="forms/proses/proses_ubah.php" method="post" enctype="multipart/form-data" novalidate>
					<div class="row">
						<div class="col">
							<div class="form-group col-md-12">
								<label>Nama Barang</label>
								<input type="text" class="form-control" name="nama_barang" autocomplete="off" value="<?php echo $nama_barang;?>" required>
								<div class="invalid-feedback">Nama barang tidak boleh kosong.</div>
							</div>
							<div class="form-group col-md-12">
								<label>Harga Awal</label>
								<input type="number" name="harga_awal" class="form-control" min="<?php echo $nama_barang;?>" value="<?php echo $harga_awal;?>" required>
								<div class="invalid-feedback">Harga Awal tidak boleh kosong.</div>
							</div>
							<div class="form-group col-md-12">
								<label>Tanggal</label>
								<input type="date" class="form-control" name="tgl" autocomplete="off" required>
								<div class="invalid-feedback">tanggal tidak boleh kosong.</div>
							</div>
							<div class="form-group col-md-12">
								<label>Deskripsi</label>
								<textarea class="form-control" name="deskripsi_barang" autocomplete="off" required></textarea>
								<div class="invalid-feedback">Deskripsi tidak boleh kosong.</div>
							</div>
						</div>
						<div class="col">
							<div class="form-group col-md-12">
								<label>Foto Barang</label>
								<div id="imagePreview"><img class="foto-preview" style="width: 100%; max-width: 160px;" src="assets/img/<?php echo $gambar; ?>"/></div>
								<input type="file" class="form-control-file mt-2" id="foto" name="foto" onchange="return validasiFile()" autocomplete="off" value="<?php echo $gambar; ?>">
							</div>
							<div class="invalid-feedback">Deskripsi tidak boleh kosong.</div>
						</div>
					</div>
					<div class="my-md-4 pt-md-1 border-top"> </div>
					<div class="form-group col-6">
						<input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Submit">
						<a href="?page=tambah" class="btn btn-secondary btn-reset"> Batal </a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>