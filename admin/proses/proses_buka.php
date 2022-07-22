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
	$query = mysqli_query($db, "UPDATE tb_lelang SET status = 'dibuka', tgl_lelang = '$tgl' WHERE id_lelang='$id_lelang'");
	if ($query) {
		echo "<script>document.location.href = '../index.php?page=lelang&alert=1'</script>";
	}
} else {
	header("location: ../pages/examples/404.php");
}
?>