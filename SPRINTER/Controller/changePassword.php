<?php
include '../koneksi.php';
$oldPass = $_POST['oldPassword'];
$newPass = $_POST['newPassword'];
$reNewPass = $_POST['renewPassword'];
$level = $_POST['level'];
$msg = "";
// var_dump($_POST);
// die;

if ($level == "Admin") {
    $user = $_POST['user'];
    $passDb = "";
    $sql = "SELECT password FROM admin";
    $sql .= " WHERE username='" . $user . "'";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $passDb .= $row['password'];
        }
    }
    if ($passDb !== $oldPass) {
        echo "<script language='javascript'> alert('password lama anda tidak cocok!');
                    window.location = 'javascript:history.go(-1)'</script>";
    } elseif ($newPass !== $reNewPass) {
        echo "<script language='javascript'> alert('Password baru dan Confirmasi password tidak sama!');
                    window.location = 'javascript:history.go(-1)'</script>";
    } else {
        $updateSql = "UPDATE admin SET password ='$newPass' where username ='$user'";
        try {
            $simpanUpdate = mysqli_query($connect, $updateSql) or die("Gagal Tambah : " . mysqli_error($connect));
            if ($simpanUpdate) {
                $msg .= "
                    Password anda telah berhasil di ganti menjadi: $newPass CATAT BAIK-BAIK
                    SILAHKAN LOGIN kembali menggunakan password baru
                    jika lupa silahkan hubungi KOORDINATOR LAB
                    ";
                sucessOutput($msg);
            }
        } catch (Exception $e) {
            $msg .= "error: " . $e->getMessage();
            erorOutput($msg);
        }
    }
} else {
    $oldPassProdi = $_POST['password'];
    $newPassProdi = $_POST['newpassword'];
    $reNewPassProdi = $_POST['renewpassword'];
    $user = $_POST['user'];
    $passDb = "";
    $sql = "SELECT password FROM prodi";
    $sql .= " WHERE kode_prodi='" . $user . "'";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $passDb .= $row['password'];
        }
    }
    if ($passDb !== $oldPassProdi) {
        echo "<script language='javascript'> alert('password lama anda tidak cocok!');
                    window.location = 'javascript:history.go(-1)'</script>";
    } elseif ($newPassProdi !== $reNewPassProdi) {
        echo "<script language='javascript'> alert('Password baru dan Confirmasi password tidak sama!');
                    window.location = 'javascript:history.go(-1)'</script>";
    } else {
        $updateSql = "UPDATE prodi SET password ='$newPassProdi' where kode_prodi ='$user'";
        try {
            $simpanUpdate = mysqli_query($connect, $updateSql) or die("Gagal Tambah : " . mysqli_error($connect));
            if ($simpanUpdate) {
                $msg .= "
                    Password anda telah berhasil di ganti menjadi: $newPassProdi CATAT BAIK-BAIK
                    SILAHKAN LOGIN kembali menggunakan password baru
                    jika lupa silahkan hubungi KOORDINATOR LAB
                    ";
                sucessOutput($msg);
            }
        } catch (Exception $e) {
            $msg .= "error: " . $e->getMessage();
            erorOutput($msg);
        }
    }
}

$stmt->close();
$connect->close();

function sucessOutput($msg)
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Berhasil Ganti PASSWORD</title>
    </head>

    <body back>
        <input type="hidden" id="msg" value="<?php echo $msg; ?>">
        <script>
            const msgOut = document.getElementById("msg").value;
            alert('SUKSES ,' + msgOut);
            window.location = '../logout.php';
        </script>
    </body>

    </html>
<?php
}

function erorOutput($msg)
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EROR</title>
    </head>

    <body back>
        <input type="hidden" id="msg" value="<?php echo $msg; ?>">
        <script>
            const msgOut = document.getElementById("msg").value;
            alert('EROR ,' + msgOut);
            window.location = 'javascript:history.go(-1)';
        </script>
    </body>

    </html>
<?php
}
?>