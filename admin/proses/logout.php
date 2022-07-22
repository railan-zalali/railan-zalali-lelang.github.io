<?php 
// mengaktifkan session php
session_start();
// menghapus semua session
unset($_SESSION['index']);
// mengalihkan halaman ke halaman login
header("location: ../pages/examples/login.php");
?>