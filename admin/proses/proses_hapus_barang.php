<?php
session_start();
if (!isset($_SESSION['index'])) {
    header("location: ../pages/examples/404.php");
    die;
}
// panggil file database.php untuk db ke database
require "../../database/connection.php";
// jika tombol hapus diklik
if (isset($_GET['id_barang'])) {
    // ambil data get dari form 
    $id_barang = $_GET['id_barang'];    
    $query1 = mysqli_query($db, "SELECT * FROM tb_lelang WHERE id_barang = '$id_barang'")
    or die('ada kesalahan pada query tampil lelang '.mysqli_error($db));
    $data1 = mysqli_fetch_assoc($query1);

    $status = $data1['status'];
    if ($status=='dibuka') {
        echo "<script>
        alert('Anda tidak dapat menghapus barang karena sedang dalam proses lelang');
        document.location.href = '../index.php?page=barang&alert=6'
        </script>";
        die;
    }
    // perintah query untuk menampilkan data berdasarkan id_barang
    $query = mysqli_query($db, "SELECT * FROM tb_barang WHERE id_barang='$id_barang'") 
    or die('Ada kesalahan pada query tampil data barang : '.mysqli_error($db));
    $data = mysqli_fetch_array($query);
    $foto = $data['gambar'];
    // // hapus file foto dari folder foto
    unlink("../../../assets/img/".$foto);
    // jika file berhasil dihapus jalankan perintah query untuk menghapus data pada tabel barang
    $delete = mysqli_query($db, "DELETE FROM tb_barang WHERE id_barang='$id_barang'"); 
    if ($delete) {
            // jika berhasil tampilkan pesan berhasil delete data
        header("location: ../index.php?page=barang&alert=10");
    }
} else {
    header("location: ../pages/examples/404.php");
} 
// tutup db
mysqli_close($db);  
?>