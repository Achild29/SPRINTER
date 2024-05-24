<?php
include "koneksi.php";
$pass=$_POST['password'];
$user=$_POST['nama'];

$sqlUser=mysqli_query($connect,"select * from admin where username='$user' and password='$pass'");
$countUser=mysqli_num_rows($sqlUser);
$rsUser=mysqli_fetch_array($sqlUser);
/*
$sqlWarga=mysqli_query($connect,"select * from warga_pabuaran where NIK='$user' and Password='$pass'");
$countWarga=mysqli_num_rows($sqlWarga);
$rsWarga=mysqli_fetch_array($sqlWarga);
*/
if (empty($user) || empty($pass)){
	echo "<script language='javascript'> alert('Username dan Password tidak boleh kosong!');
	window.location = 'javascript:history.go(-1)'</script>";
}else if ($countUser == 0 && $countWarga == 0){
	echo "<script language='javascript'> alert('Username dan password salah!');
	window.location = 'javascript:history.go(-1)'</script>";
}else{
	if ($countUser > 0){
		if(!isset($_SESSION)){
			session_start();
		}
			$_SESSION['id']=$rsUser['id'];
			$_SESSION['nama']=$rsUser['username'];
			$_SESSION['level']='Admin';
	
			header('location: index.php');
	} /*else if ($countWarga > 0){
		if(!isset($_SESSION)){
			session_start();
		}
			$_SESSION['id']=$rsWarga['NIK'];
			$_SESSION['nama']=$rsWarga['Nama'];
			$_SESSION['level']='Warga';
	
			header('location: updateMaster.php');
	}*/
}
?>
