<?php
session_start();
require "../../database/connection.php";
// panggil file database.php untuk db ke database
// jika tombol simpan diklik
if (isset($_POST['simpan'])) {
        // ambil data hasil submit dari form
  $nama_barang          = mysqli_real_escape_string($db, trim($_POST['nama_barang']));
  $harga_awal           = mysqli_real_escape_string($db, trim($_POST['harga_awal']));
  $deskripsi_barang     = mysqli_real_escape_string($db, trim($_POST['deskripsi_barang']));
  $tgl                  = mysqli_real_escape_string($db, trim(date('Y-m-d', strtotime($_POST['tgl']))));
  $nama_file            = $_FILES['foto']['name'];
  $tmp_file             = $_FILES['foto']['tmp_name'];
  $path                 = "../../assets/img/".$nama_file;
  $query = mysqli_query($db, "SELECT * FROM tb_barang WHERE nama_barang = '$nama_barang'");
  $data = mysqli_fetch_assoc($query);
  $id_barang = $data['id_barang'];
        // jika foto tidak diubah
  if (empty($nama_file)) {
            // perintah query untuk mengubah data pada tabel siswa
    $update = mysqli_query($db, "UPDATE tb_barang SET nama_barang = '$nama_barang',
      harga_awal                = '$harga_awal',
      tgl                       = '$tgl',
      deskripsi_barang          = '$deskripsi_barang'
      WHERE id_barang           = '$id_barang'")
    or die('Ada kesalahan pada query update : '.mysqli_error($db));
            // cek query
    if ($update) {
                // jika berhasil tampilkan pesan berhasil ubah data
      header("location: ../../inner-page.php?page=tambah&alert=2");
    }
  }
            // upload file
  if(move_uploaded_file($tmp_file, $path)) {
                // Jika file berhasil diupload, Lakukan : 
                // perintah query untuk mengubah data pada tabel barang
    $update = mysqli_query($db, "UPDATE tb_barang SET nama_barang = '$nama_barang',
      harga_awal          = '$harga_awal',
      tgl                 = '$tgl',
      deskripsi_barang    = '$deskripsi_barang',
      gambar                = '$nama_file'
      WHERE id_barang   = '$id_barang'")
    or die('Ada kesalahan pada query update : '.mysqli_error($db));
                // cek query
    if ($update) {
                    // jika berhasil tampilkan pesan berhasil ubah data
      header("location: ../../inner-page.php?page=tambah&alert=2");
    }   
  }
}
// tutup db
mysqli_close($db);   
?>