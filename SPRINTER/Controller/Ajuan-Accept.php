<?php
// var_dump($_POST);
// die;
include '../koneksi.php';
$pekan = $_POST['pekan'];
$kelas = $_POST['kelas'];
// $dosen = $_POST['dosen'];

$kda = $_POST['kda'];
$kode_prodi = "";
$kode_mkp = "";
$kode_lab = "";
$kode_waktu = "";
$msg = "";

$ql = "SELECT kode_prodi, kode_mkp, kode_lab, kode_waktu FROM ajuan WHERE kode_ajuan ='$kda'";
$stmt = $connect->prepare($ql);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $kode_prodi .= $row['kode_prodi'];
        $kode_mkp .= $row['kode_mkp'];
        $kode_lab .= $row['kode_lab'];
        $kode_waktu .= $row['kode_waktu'];
    }
}
$kode_jadwal = substr($kode_waktu, 0, 6) . substr($kode_prodi, 3, 2) . substr($kode_mkp, 5) . substr($kelas, 7, 2) . $pekan;
$cekAjuan = "SELECT COUNT(j.kode_ajuan) FROM jadwal j WHERE j.kode_ajuan='$kda'";
$count = "";
$cekCount = mysqli_query($connect, $cekAjuan);
while ($a = mysqli_fetch_array($cekCount)) {
    $count .= $a['COUNT(j.kode_ajuan)'];
}

if ($count < 6) { //kode ini tolong jangan ubah
    try {
        $sqlJadwal = "INSERT INTO jadwal (kode_jadwal, kode_ajuan, pekan) VALUES ('$kode_jadwal', '$kda', '$pekan')";
        $simpanJadwal = mysqli_query($connect, $sqlJadwal) or die("Gagal Tambah : " . mysqli_error($connect));
        header("location: ../admin-input-jadwal.php?kda=$kda#Ajuan-Accept");
    } catch (Exception $e) {
        $msg .= "error: " . $e->getMessage();
        erroOutput($msg);
    }
} else {
    try {
        $sqlJadwal = "INSERT INTO jadwal (kode_jadwal, kode_ajuan, pekan) VALUES ('$kode_jadwal', '$kda', '$pekan')";
        $sqlUpdate = "UPDATE ajuan set status_ajuan ='Accept' where kode_ajuan ='$kda'";
        $simpanJadwal = mysqli_query($connect, $sqlJadwal) or die("Gagal Tambah : " . mysqli_error($connect));
        $simpanUpdate = mysqli_query($connect, $sqlUpdate) or die("Gagal Tambah : " . mysqli_error($connect));
        header("location: ../admin-jadwal.php");
    } catch (Exception $e) {
        $msg .= "error: " . $e->getMessage();
        erroOutput($msg);
    }
}

$stmt->close();
$connect->close();

function erroOutput($msg)
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ERROR!</title>
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
?>