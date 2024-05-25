<?php

include 'koneksi.php';

$kode_waktu = $_POST['kode_waktu'];
$reguler = $_POST['reguler'];
$hari = $_POST['hari'];
$jam_mulai = $_POST['jam_mulai'];
$jam_selesai = $_POST['jam_selesai'];



$sql = "INSERT INTO waktu (kode_waktu, reguler, hari, jam_mulai, jam_selesai) VALUES ('$kode_waktu', '$reguler', '$hari', '$jam_mulai', '$jam_selesai')";
$simpan = mysqli_query($connect,$sql) or die ("Gagal Tambah : ".mysqli_error($connect));
header("location: index.php")
?>