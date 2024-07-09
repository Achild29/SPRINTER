<?php

include '../koneksi.php';

$kode_prodi = $_POST['kode_prodi'];
$nama_prodi = $_POST['nama_prodi'];
$pass = $_POST['pass'];



$sql = "INSERT INTO prodi VALUES ('$kode_prodi','$nama_prodi','$pass')";
$simpan = mysqli_query($connect,$sql) or die ("Gagal Tambah : ".mysqli_error($connect));
header("location: ../admin-master-prodi.php")
?>