<?php 
session_start();
include '../../database/connection.php';

if (isset($_POST['submit'])) {
	$harga_akhir = $_POST['harga_akhir'];
	var_dump($harga_akhir);
}
mysqli_close($db);
?>
