<?php

include '../koneksi.php';

$kode_waktu = $_POST['kode_waktu'];
$kode_prodi = $_POST['kode_prodi'];
$kode_mkp=$_POST['kode_mkp'];
$pekan = $_POST['pekan'];
$kelas = $_POST['kelas'];
$kode_jadwal = substr($kode_waktu,0,6).substr($kode_prodi,3,2).substr($kode_mkp,5).substr($kelas,7,2).$pekan;


$sql = "INSERT INTO jadwal (kode_jadwal, kode_waktu, kode_mkp, kelas, pekan) VALUES ('$kode_jadwal','$kode_waktu', '$kode_mkp', '$kelas', '$pekan')";
$simpan = mysqli_query($connect,$sql) or die ("Gagal Tambah : ".mysqli_error($connect));
header("location: ../jadwal.php#JADWAL")
?>