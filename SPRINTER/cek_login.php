<?php
include "koneksi.php";
$pass=$_POST['password'];
$user=$_POST['nama'];

$sqlUser=mysqli_query($connect,"select * from admin where username='$user' and password='$pass'");
$countUser=mysqli_num_rows($sqlUser);
$rsUser=mysqli_fetch_array($sqlUser);

$sqlProdi=mysqli_query($connect,"select * from prodi where kode_prodi='$user' and password='$pass'");
$countProdi=mysqli_num_rows($sqlProdi);
$rsProdi=mysqli_fetch_array($sqlProdi);

if (empty($user) || empty($pass)){
	echo "<script language='javascript'> alert('Username dan Password tidak boleh kosong!');
	window.location = 'javascript:history.go(-1)'</script>";
}else if ($countUser == 0 && $countProdi == 0){
	// echo "$countProdi";
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
	} else if ($countProdi > 0){
		if(!isset($_SESSION)){
			session_start();
		}
			$_SESSION['id']=$rsProdi['id'];
			$_SESSION['nama']=$rsProdi['username'];
			$_SESSION['level']='Prodi';
	
			header('location: lihatJadwal.php#lihatJadwal');
	}
}
?>
