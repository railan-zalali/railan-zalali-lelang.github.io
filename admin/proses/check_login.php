<?php 
// mengaktifkan session pada php
session_start();
// menghubungkan php dengan db database
include '../database/connection.php';
// menangkap data yang dikirim dari form login
$username = mysqli_escape_string($db, trim($_POST['username']));
$password = mysqli_escape_string($db, trim($_POST['password']));
// menyeleksi data user dengan username dan password yng sesuai
$login = mysqli_query($db, "SELECT * FROM tb_petugas WHERE username='$username'");
// menghitung jumlah data yang ditemukan
// cek apakah username dan password di temukan pada database
if (mysqli_num_rows($login) > 0) {
	$data = mysqli_fetch_assoc($login);
	// cek jika user login sebagai admin
	if (password_verify($password, $data['password'])&&$data['id_level']=="1") {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['id_level'] = $data['id_level'];
		$_SESSION['index'] = true;
		header("location: ../index.php");
	} 	elseif ($data['id_level']=="2" && password_verify($password, $data['password'])) {
		$_SESSION['username'] = $username;
		$_SESSION['id_level'] = $data['id_level'];
		$_SESSION['id_petugas'] = $data['id_petugas'];
		// digunakan apabila file login bisa dilewati
		$_SESSION['index'] = true;
		header("location: ../index.php");
	} 
	else {
		// alihkan ke halaman login kembali
		header("location: ../pages/examples/login.php?pesan=gagal");
	}
} else {
	header("location: ../pages/examples/login.php?pesan=gagal");
}

?>
