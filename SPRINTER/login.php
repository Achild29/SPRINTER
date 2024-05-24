<!DOCTYPE HTML>
<!--
	Intensify by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->

<?php
session_start();
session_destroy();
?>

<script type="text/javascript">
function validasi_input(FormLogin){
	if (FormLogin.nama.value == ""){
    	alert("Nama pengguna belum diisi!");
    	FormLogin.nama.focus();
		return (false);
  		}	
	if (FormLogin.password.value == ""){
    	alert("Password belum diisi!");
    	FormLogin.password.focus();
		return (false);
  		}
return (true);
}
</script>

<html>
	<head>
		<title>SPRINTER</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<nav class="left">
					<a href="#menu"><span>Menu</span></a>
				</nav>
				<a href="index.php" class="logo"><font color= "white">Sistem Penjadwalan Praktikum Lab Komputer</font></a>
				
			</header>

		


		<!-- One -->
			<section id="one" class="wrapper">
			<div class="inner">
			<h1>HALAMAN LOGIN</h1>
			<!--form-->
			<form method="post" action="cek_login.php" name="FormLogin" onSubmit="return validasi_input(this)">
										<div class="row uniform">
											
											<!-- Break -->
											<div class="12u$">
												
											</div>
											<div class="6u 12u$(xsmall)">
												<input type="text" name="nama" placeholder="Nama Pengguna" autofocus id="nama"/>
											</div>
											<div class="6u$ 12u$(xsmall)">
												<input type="password" name="password" placeholder="password" id="password"/>
											</div>
											
											<!-- Break -->
											
											
											<!-- Break -->
											<div class="12u$">
												<ul class="actions">
													<li><input type="submit" value="Masuk" name="proses" /></li>
													<li><input type="reset" value="Reset" class="alt" /></li>
												</ul>
											</div>
										</div>
									</form>
									
									<?php
									//if(isset($_POST['nama'])&&isset($_POST['password'])){
										//if($_POST['nama']=="admin"&&$_POST['password']=="pbr001"){
											//session_start();
											//$_SESSION['admin']="valid";
											//header("location: index.php");
										//}
										//else echo "password salah";
									//}
									?> 

			<!--eof-->
			</div>	
			</section>

		
		<!-- Footer -->
			<footer id="footer">
				
				<div class="copyright">
					&copy; 2024. Designed by Anak SI</a>.
				</div>
			</footer>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>