<?php

include '../koneksi.php';

$kode_mkp = $_POST['kode_mkp'];
$kode_prodi = $_POST['kode_prodi'];
$nama_mkp = $_POST['nama_mkp'];
$sks = $_POST['sks'];



$sql = "INSERT INTO mkp (kode_mkp, kode_prodi, nama_mkp, sks) VALUES ('$kode_mkp','$kode_prodi','$nama_mkp','$sks')";
$simpan = mysqli_query($connect,$sql) or die ("Gagal Tambah : ".mysqli_error($connect));
header("location: ../index.php")
?>