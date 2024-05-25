<?php

include 'koneksi.php';

$kode_mkp = $_POST['kode_mkp'];
$kode_prodi = $_POST['kode_prodi'];
$nama_mkp = $_POST['nama_mkp'];
$jumlah_rps = $_POST['jumlah_rps'];



$sql = "INSERT INTO mkp (kode_mkp, kode_prodi, nama_mkp, jumlah_rps) VALUES ('$kode_mkp','$kode_prodi','$nama_mkp','$jumlah_rps')";
$simpan = mysqli_query($connect,$sql) or die ("Gagal Tambah : ".mysqli_error($connect));
header("location: index.php")
?>