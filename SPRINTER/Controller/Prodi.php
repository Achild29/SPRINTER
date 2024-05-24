<?php

include 'koneksi.php';

$kode_prodi = $_POST['kode_prodi'];
$nama_prodi = $_POST['nama_prodi'];
$password = $_POST['password'];



$sql = "INSERT INTO prodi (kode_prodi, nama_prodi, password,) VALUES ('$kode_prodi','$nama_prodi','$passwrod')";
$simpan = mysqli_query($connect,$sql) or die ("Gagal Tambah : ".mysqli_error($connect));
header("location: index.php")
?>