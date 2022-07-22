<?php
// panggil file database.php untuk db ke database
require_once "../../database/connection.php";
// jika tombol simpan diklik
if (isset($_POST['simpan'])) {
    // ambil data hasil submit dari form
    $nama_lengkap   = mysqli_real_escape_string($db, trim($_POST['nama_lengkap']));
    $username       = mysqli_real_escape_string($db, trim($_POST['username']));
    $password       = mysqli_real_escape_string($db, trim(password_hash($_POST['password'], PASSWORD_DEFAULT)));
    $telp           = mysqli_real_escape_string($db, trim($_POST['telp']));
    // perintah query untuk menampilkan nama barang dari tabel master berdasarkan nis dari hasil submit form
    $query = mysqli_query($db, "SELECT username FROM tb_masyarakat WHERE username='$username'")
    or die('Ada kesalahan pada query tampil data : '.mysqli_error($db));
    $rows = mysqli_num_rows($query);
    // jika nis sudah ada
    if ($rows > 0) {
        // tampilkan pesan gagal simpan data
       echo "<script>
       alert('Maaf username sudah ada');
       document.location.href = '../register.php?pesan=gagal'
       </script>";
   }
    // jika nis belum ada
   else {  
        // upload file
    $insert = mysqli_query($db, "INSERT INTO tb_masyarakat (id_user,nama_lengkap,username,password,telp)
        VALUES ('','$nama_lengkap','$username','$password','$telp')")
    or die('Ada kesalahan pada query insert : '.mysqli_error($db)); 
            // Jika file berhasil diupload, Lakukan : 
            // perintah query untuk menyimpan data ke tabel masyarakat
            // cek query
    if ($insert) {
                // jika berhasil tampilkan pesan berhasil simpan data
        header("location: ../login.php?alert=1");
    }   
}
} else{
    header("location: ../../pages/404.php");
}
// tutup db
mysqli_close($db);   
?>
