<?php
//session_start();
//if (isset($_SESSION['admin'])) {
//unset ($_SESSION);
//session_destroy();
//header ("Location: login.php");
//}
session_start();
session_destroy();
//echo "<script>alert('Anda telah keluar dari Halaman Admin'); window.location = 'login.php'</script>";
header ("Location: login.php");
?>