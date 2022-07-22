<?php
// panggil file database.php untuk koneksi ke database
require_once "../../database/connection.php";
// jika tombol simpan diklik
if (isset($_POST['submit'])) {
    // ambil data hasil submit dari form
	$nama_barang = $_POST['nama_barang'];
	$harga_awal = $_POST['harga_awal'];
		// $tgl = mysqli_real_escape_string($db, trim(date('Y-m-d', strtotime($_POST['tgl']))));
	$tgl = $_POST['tgl'];
	$deskripsi = $_POST['deskripsi'];
	$nama_file     = $_FILES['foto']['name'];
	$tmp_file      = $_FILES['foto']['tmp_name'];
    // Set path folder tempat menyimpan filenya
	$path          = "../../assets/img/".$nama_file;

    // perintah query untuk menampilkan nama_barang dari tabel siswa berdasarkan nama_barang dari hasil submit form
	$query = mysqli_query($db, "SELECT * FROM tb_barang")
	or die('Ada kesalahan pada query tampil data barang: '.mysqli_error($db));
	$rows = mysqli_num_rows($query);
    // jika nis sudah ada
    // jika nama_barang belum ada 
        // upload file
	if(move_uploaded_file($tmp_file, $path)) {
            // Jika file berhasil diupload, Lakukan : 
            // perintah query untuk menyimpan data ke tabel siswa
		$insert = mysqli_query($db, "INSERT INTO tb_barang(id_barang,nama_barang,harga_awal,deskripsi_barang,tgl,gambar)
			VALUES('','$nama_barang','$harga_awal','$deskripsi','$tgl','$nama_file')")
		$insert .= mysqli_query($db, "INSERT INTO tb_lelang(id_lelang,id_barang,tgl_lelang,harga_akhir,id_user,id_petugas,id_user_pembeli,tgl_akhir,status,terjual)
			VALUES('','','$tgl',null,null,null,null,null,null,null)")
		or die('Ada kesalahan pada query insert : '.mysqli_error($db)); 
            // cek query
		if ($insert){
                // jika berhasil tampilkan pesan berhasil simpan data
			header("location: ../../inner-page.php?page=tambah&alert=1");  
		}
	}
}
// tutup koneksi
mysqli_close($db);   
?>
