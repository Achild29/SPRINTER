<?php

include '../koneksi.php';

$kode_waktu = $_POST['kode_waktu'];
$kode_prodi = $_GET['k'];
$kode_mkp=$_POST['kode_mkp'];
$pekan = $_POST['pekan'];
$kelas = $_POST['kelas'];
$kode_lab = $_POST['kode_lab'];
$kode_jadwal = substr($kode_waktu,0,6).substr($kode_prodi,3,2).substr($kode_mkp,5).substr($kelas,7,2).$pekan;
$dosen = $_POST['dosen'];


$sql = "INSERT INTO jadwal (kode_jadwal, kode_waktu, kode_mkp, kode_kelas, kode_lab, pekan, dosen) VALUES ('$kode_jadwal','$kode_waktu', '$kode_mkp', '$kelas', '$kode_lab', '$pekan', '$dosen')";
$simpan = mysqli_query($connect,$sql) or die ("Gagal Tambah : ".mysqli_error($connect));
header("location: ../admin-jadwal.php#JADWAL")
?>