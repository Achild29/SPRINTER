<?php

include '../koneksi.php';

// var_dump($_POST);
// die;

$kd = $_POST['kode-ajuan'];
$msg = $_POST['msg'];



$sql = "UPDATE ajuan set status_ajuan ='MAAF ajuan anda DITOLAK karena $msg' where kode_ajuan ='$kd'";
$simpan = mysqli_query($connect,$sql) or die ("Gagal Tambah : ".mysqli_error($connect));
header("location: ../admin-Ajuan.php")
?>