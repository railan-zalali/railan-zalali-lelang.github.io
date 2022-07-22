<?php 
session_start();
if (!isset($_SESSION['index'])) {
	header("location: ../pages/examples/404.php");
	die;
}
require '../database/connection.php';
if (isset($_POST['tambahlelang'])) {
	$id_petugas = $_SESSION['id_petugas'];
	$id_barang = $_POST['pilihbarang'];
	$query = mysqli_query($db, "SELECT * FROM tb_lelang WHERE id_barang = '$id_barang'");
	$row = mysqli_fetch_assoc($query);

	if ($row['id_barang'] == $id_barang) {
		echo "<script>
		alert('Anda tidak dapat menambahkan barang yang sama');
		document.location.href = '../index.php?page=lelang&alert=9'
		</script>";
		die;
	}
	$q = mysqli_query($db, "SELECT * FROM tb_barang INNER JOIN tb_masyarakat ON tb_barang.id_user = tb_masyarakat.id_user WHERE id_barang = '$id_barang' ");
	$d = mysqli_fetch_assoc($q);
	
	$id_user = $d['id_user'];
	$id_petugas = $_SESSION['id_petugas'];
	$tgl = $_POST['tgl'];
	$harga_akhir = $_POST['harga_akhir'];

	$insert = mysqli_query($db, "INSERT INTO tb_lelang(id_lelang,id_barang,tgl_lelang,harga_akhir,id_user,id_petugas,id_user_pembeli,tgl_akhir,status,terjual) 
		VALUES('','$id_barang',NULL,NULL,'$id_user','$id_petugas',NULL,NULL,'ditutup','tidak')")
	or die('ada kesalahan pada query insert : '.mysqli_error($db));
	if ($insert) {
		echo "<script>document.location.href = '../index.php?page=lelang&alert=3'</script>";
	}
} else{
	header("location: ../pages/examples/404.php");
}
?>