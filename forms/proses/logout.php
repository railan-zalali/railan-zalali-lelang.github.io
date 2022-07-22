<?php 
// mengaktifkan session php
session_start();
// menghapus semua session
unset($_SESSION['login']);
// mengalihkan halaman ke halaman login
header("location: ../login.php");
?>