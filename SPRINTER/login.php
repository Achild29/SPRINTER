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

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>SPRINTER UNPAM</title>
  <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins&amp;display=swap'>
<link rel="stylesheet" href="assets/css/loginstyle.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="wrapper">
  <div class="login_box">
    <div class="login-header">
      <span>SPRINTER</span>
    </div>

	<form action="cek_login.php" method="post">
	<div class="input_box">
      <input type="text" id="user" name="nama" class="input-field" required>
      <label for="user" class="label">Username</label>
      <i class="bx bx-user icon"></i>
    </div>

    <div class="input_box">
      <input type="password" id="pass" name="password" class="input-field" required>
      <label for="pass" class="label">Password</label>
      <i class="bx bx-lock-alt icon"></i>
    </div>

    

    <div class="input_box">
      <input type="submit" class="input-submit" value="Login">
    </div>
	</form>
   

    
  </div>
</div>
<!-- partial -->
  
</body>
</html>