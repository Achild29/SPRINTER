<?php

include '../koneksi.php';


$kd = $_POST['kd'];
$msg = $_POST['msg'];



$sql = "UPDATE ajuan set status_ajuan ='Reject : $msg' where kode_ajuan ='$kd'";
// var_dump($_POST);
// var_dump($sql);
// die;
$simpan = mysqli_query($connect,$sql) or die ("Gagal Tambah : ".mysqli_error($connect));
header("location: ../admin-lihat-ajuan.php")
?>