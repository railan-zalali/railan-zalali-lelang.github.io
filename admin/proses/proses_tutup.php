<?php 
session_start();
if (!isset($_SESSION['index'])) {
	header("location: ../pages/examples/404.php");
	die;
}
if (isset($_SESSION['index'])&&$_SESSION['id_level']==2) {
	require '../database/connection.php';
	$tgl = date('y-m-d');
	$id_lelang = $_GET['id_lelang'];

	$harga = mysqli_query($db, "SELECT MAX(penawaran_harga) AS harga_terakhir FROM list_penawaran WHERE id_lelang = '$id_lelang'");
	$penawar = mysqli_query($db, "SELECT id_user_pembeli FROM list_penawaran WHERE id_lelang = '$id_lelang'");
	$pemilik = mysqli_query($db, "SELECT id_user FROM tb_lelang WHERE id_lelang = '$id_lelang'");

	$hasil = mysqli_fetch_assoc($harga);
	$pembeli = mysqli_fetch_assoc($penawar);
	$pemilik1 = mysqli_fetch_assoc($pemilik);

	$id_petugas = $_SESSION['id_petugas'];
	$id_barang = $_SESSION['id_barang'];
	$id_user = $pemilik1['id_user'];
	$harga_akhir = $hasil['harga_terakhir'];
	$pembeli = $pembeli['id_user_pembeli'];

	$query = mysqli_query($db, "UPDATE tb_lelang SET status = 'ditutup', tgl_akhir = '$tgl', harga_akhir = '$harga_akhir', id_user_pembeli = '$pembeli'
		WHERE id_lelang='$id_lelang'");

	if ($query) {
		$insert = mysqli_query($db, "INSERT INTO riwayat_lelang(id_lelang,id_barang,id_user,id_petugas,penawaran_harga) 
			VALUES('$id_lelang','$id_barang','$id_user','$id_petugas','$harga_akhir')");
		if ($insert) {
			echo "<script>document.location.href = '../index.php?page=lelang&alert=2'</script>";
		}else{
			echo mysqli_error($db);
		}
	}
}else {
	header("location: ../pages/examples/404.php");
}
?>