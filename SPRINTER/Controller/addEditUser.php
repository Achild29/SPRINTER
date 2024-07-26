<?php
    include '../koneksi.php';
    // var_dump($_POST);
    // die;
    $cekNmLab = isset($_POST['cekNmLab']);
    $cekPass = isset($_POST['cekPassword']);
    $namaLab = $_POST['nama_lab'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $kode_lab = $_POST['kode_lab'];
    $msg = "";

    if ($cekNmLab) {
        $sqlUpdateLab="UPDATE laboratorium SET nama_lab='$namaLab' WHERE kode_lab='$kode_lab'";
        try {
            $rs = mysqli_query($connect, $sqlUpdateLab);
            header("location: ../administrator-setting.php");
        } catch (Exception $e) {
            $msg .= "error: " . $e->getMessage();
            erroOutput($msg);
        }
    }

    if ($cekPass) {
        $sqlUpdateAdmin= "UPDATE admin SET password='$password' WHERE username='$username'";
        try {
            $rs=mysqli_query($connect, $sqlUpdateAdmin);
            header("location: ../administrator-setting.php");
        } catch (Exception $e) {
            $msg .= "error: " . $e->getMessage();
            erroOutput($msg);
        }
    }

    $connect->close();

    function erroOutput($msg) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>erroOutput</title>
        </head>
        <body back>
            <input type="hidden" id="msg" value="<?php echo $msg; ?>">
            <script>
                const msgOut = document.getElementById("msg").value;
                alert('Gagal Edit ,' + msgOut);
                window.location = 'javascript:history.go(-1)';
            </script>
        </body>
        </html>
        <?php
    }