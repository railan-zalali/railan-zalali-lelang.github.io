<?php 
session_start();
if (!isset($_SESSION['index'])) {
    header("location: ../pages/examples/404.php");
    die;
}
require '../database/connection.php';
if (isset($_POST['tambahpetugas'])) {
  $nama_petugas = mysqli_real_escape_string($db, trim($_POST['nama_petugas']));
  $username     = mysqli_real_escape_string($db, trim($_POST['username']));
  $password     = mysqli_real_escape_string($db, trim(password_hash($_POST['password'], PASSWORD_DEFAULT)));
  $id_level     = mysqli_real_escape_string($db, trim($_POST['id_level']));

  $query = mysqli_query($db, "SELECT username FROM tb_petugas WHERE username='$username' AND id_level='$id_level'")
  or die('Ada kesalahan pada query tampil data : '.mysqli_error($db));

  $rows = mysqli_num_rows($query);
    // jika username dan id_level sudah ada
  if ($rows > 0) {
        // tampilkan pesan gagal simpan data
   echo "<script>
   alert('Maaf username & level sudah ada');
   document.location.href = '../index.php?page=petugas&alert=8'
   </script>";
   die;
 }

 $insert = mysqli_query($db, "INSERT INTO tb_petugas(nama_petugas,username,password,id_level)
  VALUES('$nama_petugas','$username','$password','$id_level')")
 or die('ada kesalahan query insert : ' .mysqli_error($db));
 if ($insert) {
  echo "<script>document.location.href = '../index.php?page=petugas&alert=7'</script>";
}
}
mysqli_close($db);
?>