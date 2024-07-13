<?php
    include '../koneksi.php';
    $oldPass = $_POST['oldPassword'];
    $newPass = $_POST['newPassword'];
    $reNewPass = $_POST['renewPassword'];
    $level = $_POST['level'];

    if ($level == "Admin") {
        $user = $_POST['user'];
        $passDb = "";
        $sql = "SELECT password FROM admin";
        $sql .= " WHERE username='".$user."'";
        // var_dump($sql);
        // die;
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $passDb .= $row['password'];
            }
        }
        // var_dump($_POST);
        // die;
        if ($passDb !== $oldPass) {
            echo "<script language='javascript'> alert('password lama anda tidak cocok!');
                    window.location = 'javascript:history.go(-1)'</script>";
        } elseif ($newPass !== $reNewPass) {
            echo "<script language='javascript'> alert('Password baru dan Confirmasi password tidak sama!');
                    window.location = 'javascript:history.go(-1)'</script>";
        } else {
            $updateSql = "UPDATE admin SET password ='$newPass' where username ='$user'";
            $msg = "
            Password anda telah berhasil di ganti menjadi: $newPass CATAT BAIK-BAIK
            SILAHKAN LOGIN kembali menggunakan password baru
            jika lupa silahkan hubungi KOORDINATOR LAB
            ";
            $simpanUpdate = mysqli_query($connect,$updateSql) or die ("Gagal Tambah : ".mysqli_error($connect));
            echo "<script language='javascript'> alert('".$msg."'); </script>";
            header("location: ../logout.php");
        }
        // var_dump($passDb);
    } else {
        // untuk Prodi di sini yah
    }
?>