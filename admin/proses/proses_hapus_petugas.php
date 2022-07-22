<?php
session_start();
if (!isset($_SESSION['index'])) {
    header("location: ../pages/examples/404.php");
    die;
}
if (isset($_SESSION['index'])&&$_SESSION['id_level']==1) {
// panggil file database.php untuk db ke database
    require "../database/connection.php";
// jika tombol hapus diklik
    if (isset($_GET['id_petugas'])) {
    // ambil data get dari form 
        $id_petugas = $_GET['id_petugas'];    
    // perintah query untuk menampilkan data berdasarkan id_petugas
        $query = mysqli_query($db, "SELECT * FROM tb_petugas WHERE id_petugas='$id_petugas'") 
        or die('Ada kesalahan pada query tampil data barang : '.mysqli_error($db));
    // jika file berhasil dihapus jalankan perintah query untuk menghapus data pada tabel barang
        $delete = mysqli_query($db, "DELETE FROM tb_petugas WHERE id_petugas='$id_petugas'"); 
        if ($delete) {
            // jika berhasil tampilkan pesan berhasil delete data
            header("location: ../index.php?page=petugas&alert=5");
        } else{
            echo mysqli_error($db);
        }
    } else{
        header("location: ../pages/examples/404.php");
    }
} else {
    header("location: ../pages/examples/404.php");
}
// tutup db
mysqli_close($db);  
?>