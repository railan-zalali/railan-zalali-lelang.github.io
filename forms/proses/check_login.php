<?php 
// mengaktifkan session pada php
session_start();
// menghubungkan php dengan db database
require '../../database/connection.php';
if (isset($_POST['masuk'])) {
// menangkap data yang dikirim dari form login
	$username = mysqli_real_escape_string($db, trim($_POST['username']));
	$password = mysqli_real_escape_string($db, trim($_POST['password']));
// menyeleksi data user dengan username dan password yng sesuai
	$result = mysqli_query($db, "SELECT * FROM tb_masyarakat WHERE username='$username'");
// menghitung jumlah data yang ditemukan
// cek apakah username dan password di temukan pada database
	if (mysqli_num_rows($result) > 0) {

		$row = mysqli_fetch_assoc($result);

		if (password_verify($password, $row["password"])) {
			// set session
			$_SESSION['username'] = $username;
			$_SESSION['nama_lengkap'] = $row['nama_lengkap'];
			$_SESSION['id_user'] = $row['id_user'];
			// var_dump($row['id_user']);die;
			$_SESSION['login'] = true;
			// jika berhasil eksekusi header
			header("location: ../../index.php");
		} else {
			header("location: ../login.php?pesan=gagal");
		}
	} else {
		header("location: ../login.php?pesan=gagal");
	}
} else {
	header("location: ../../pages/404.php");
}

?>