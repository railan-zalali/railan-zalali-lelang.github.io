<?php 
if (!isset($_SESSION['login'])) {
	header('location: login.php');
	exit;
}
?>
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-info" role="alert">
			<i class="fas fa-edit"></i> Input Data barang
		</div>
		<?php
		if (empty($_GET['alert'])) {
			echo "";
		}
		elseif ($_GET['alert'] == 1) { ?>
			<div class="alert alert-success alert-dismissible fade show pesan" id="pesan" role="alert">
				<strong><i class="fas fa-check-circle"></i> Sukses!</strong> Data barang berhasil disimpan.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php
		} 
		elseif ($_GET['alert'] == 2) { ?>
			<div class="alert alert-success alert-dismissible fade show pesan" id="pesan" role="alert">
				<strong><i class="fas fa-check-circle"></i> Sukses!</strong> Data barang berhasil diubah.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php
		} 
		elseif ($_GET['alert'] == 3) { ?>
			<div class="alert alert-success alert-dismissible fade show pesan" id="pesan" role="alert">
				<strong><i class="fas fa-check-circle"></i> Sukses!</strong> Data barang berhasil dihapus.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php
		} 
		elseif ($_GET['alert'] == 4) { ?>
			<div class="alert alert-danger alert-dismissible fade show pesan" id="pesan" role="alert">
				<strong><i class="fas fa-times-circle"></i> Gagal!</strong> nama_barang <b><?php echo $_GET['nama_barang']; ?></b> sudah ada.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php
		}
		?>  
		<div class="card">
			<div class="card-body">
				<form class="needs-validation" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-5">		
							<div class="form-group col-md-12">
								<label>Nama Barang</label>
								<input type="text" class="form-control" name="nama_barang" autocomplete="off" required>
							</div>
							<div class="form-group col-md-12">
								<label>Harga Awal</label>
								<input type="number" class="form-control" id="rupiah" name="harga_awal" autocomplete="off" required>
							</div>
							<div class="form-group col-md-12">
								<label>Deskripsi</label>
								<textarea class="form-control" rows="3" name="deskripsi" autocomplete="off" required></textarea>
							</div>
							<div class="form-group col-md-12">
								<label>Tanggal</label>
								<input type="date" class="form-control" name="tgl" autocomplete="off" required>
							</div>
							<div class="form-group col-md-12">
								<label>Foto Barang</label>
								<input type="file" class="form-control-file mb-3" id="foto" name="foto" onchange="return validasiFile()" autocomplete="off" required>
							</div>
							<div class="form-group col-12 right">
								<input type="submit" class="btn btn-info btn-submit mr-2"  style="width: 100%;" name="simpan" value="Simpan">
							</div>
						</div>
						<div class="col">
							<div class="form-group col-md-12">
								<h3>Notifikasi</h3>
								<?php
								$no = 1;
								$id_user = $_SESSION['id_user'];
								$query = mysqli_query($db, "SELECT *, a.nama_lengkap as nama_penjual, b.nama_lengkap as nama_pembeli,
									MAX(penawaran_harga) AS harga_terakhir FROM list_penawaran
									INNER JOIN tb_barang ON list_penawaran.id_barang = tb_barang.id_barang
									INNER JOIN tb_masyarakat a ON a.id_user = list_penawaran.id_user 
									LEFT JOIN tb_masyarakat b ON b.id_user = list_penawaran.id_user_pembeli
									WHERE list_penawaran.id_user = '$id_user'
									ORDER BY penawaran_harga DESC");
									?>
									<div class="col-sm-12 wapper-scroll-y my-custom-scrollbar" style="position: relative; height: 290px; overflow: auto; display: block;">
										<?php while ($data = mysqli_fetch_assoc($query)) { ?>
											<div class="alert alert-info alert-dismissible" role="alert">
												Barang <strong><?php echo $data['nama_barang'];?></strong>
												Ditawar Oleh <strong><?php echo $data['nama_pembeli']; ?></strong>
												Dengan Harga <strong><?php echo "Rp." .number_format($data['harga_terakhir']);?></strong>
												Silahkan Hubungi <strong><u><?php echo $data['telp']; ?></u></strong>
											</div>
											<?php
										} ?>
									</div>
								</div>
							</div>
							<div class="my-md-4 pt-md-1 border-top"> </div>
						</form>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<?php 
						include "pages/tampil_data.php";
						?>
					</div>
				</div>
			</div>
		</div>
		<?php
// panggil file database.php untuk koneksi ke database
// session_start();
		require_once "database/connection.php";
// jika tombol simpan diklik
		if (isset($_POST['simpan'])) {
    // ambil data hasil submit dari form
			$nama_barang	= mysqli_escape_string($db, trim($_POST['nama_barang']));
			$harga_awal 	= mysqli_escape_string($db, trim($_POST['harga_awal']));
			$tgl 			= mysqli_escape_string($db, trim(date('y-m-d', strtotime($_POST['tgl']))));
			$deskripsi 		= mysqli_escape_string($db, trim($_POST['deskripsi']));
			$nama_file     	= $_FILES['foto']['name'];
			$tmp_file      	= $_FILES['foto']['tmp_name'];
    // Set path folder tempat menyimpan filenya
			$path          	= "assets/img/".$nama_file;
        // upload file
			if(move_uploaded_file($tmp_file, $path)) {
            // Jika file berhasil diupload, Lakukan : 
            // perintah query untuk menyimpan data ke tabel barang
				$insert = mysqli_query($db, "INSERT INTO tb_barang(id_barang,id_user,nama_barang,harga_awal,deskripsi_barang,tgl,gambar)
					VALUES('','$_SESSION[id_user]','$nama_barang','$harga_awal','$deskripsi','$tgl','$nama_file')")
				or die('Ada kesalahan pada query insert : '.mysqli_error($db));
            // cek query
				if ($insert) {	
					echo "<script>document.location.href = 'inner-page.php?page=tambah&alert=1'</script>";

				}
			}
		}
		// tutup koneksi
		mysqli_close($db);  
		?>

