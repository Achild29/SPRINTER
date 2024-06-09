<?php

include '../koneksi.php';

$reguler = $_POST['reg'];
$hari = $_POST['hari'];
$jam_mulai = $_POST['jam'];
$jam_selesai_str= strtotime("+100 minutes",strtotime($jam_mulai));
$jam_selesai = date ('H:i:s', $jam_selesai_str);
$kode_waktu = substr($hari,0,3).$reguler.$jam_mulai;



$sql = "INSERT INTO waktu (kode_waktu, reguler, hari, jam_mulai, jam_selesai) VALUES ('$kode_waktu', '$reguler', '$hari', '$jam_mulai', '$jam_selesai')";
$simpan = mysqli_query($connect,$sql) or die ("Gagal Tambah : ".mysqli_error($connect));
header("location: ../waktu.php")
?>