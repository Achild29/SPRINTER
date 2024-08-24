<?php
include '../koneksi.php';
// var_dump($_POST);
// die;
$msg = "";
$kode_jadwal = $_POST['id'];
// echo $kode_jadwal;
$sql = "DELETE FROM jadwal WHERE kode_jadwal ='$kode_jadwal'";
// echo $sql;
// die;
try {
    $delete = mysqli_query($connect, $sql) or die("Gagal Hapus : " . mysqli_error($connect));
    if ($delete) {
        $msg .= "Data Berhasil dihapus";
        deleted($msg);
    }
} catch (Exception $e) {
    $msg .= "error: " . $e->getMessage();
    erorOutput($msg);
}

function deleted($msg)
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BERHASIL</title>
    </head>

    <body back>
        <input type="hidden" id="msg" value="<?php echo $msg; ?>">
        <script>
            const msgOut = document.getElementById("msg").value;
            alert('SUKSES ,' + msgOut);
            window.location = 'javascript:history.go(-1)';
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
            const msgOuteror = document.getElementById("msg").value;
            alert('EROR ,' + msgOuteror);
            window.location = 'javascript:history.go(-1)';
        </script>
    </body>

    </html>
<?php
}
