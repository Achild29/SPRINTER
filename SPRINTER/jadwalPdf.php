<?php
    require('assets/library/fpdf.php');
    include 'koneksi.php';

    $pdf=new FPDF('L','mm','A4');
    $pdf->AddPage();
    if ($_GET['p']!="") {
        $title = "Jadwal Praktikum pekan ".$_GET['p'];
    } else {
        $title = "Jadwal Praktikum keseluruhan";
    }
    // $pdf->Image('images/logo.jpg', 20, 8, -1200); 
    $pdf->SetFont('Times', 'B', 25);
    $pdf->SetTitle($title);
    $pdf->SetSubject($title);
    $pdf->SetKeywords($title);
    $pdf->Cell(280,10,$title,0,0,'C');
    
    $pdf->Cell(10,25,'',0,1);
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(30,10,'Hari',1,0,'C');
    $pdf->Cell(40,10,'Jam Mulai',1,0,'C');
    $pdf->Cell(40,10,'Jam Selesai',1,0,'C');
    $pdf->Cell(50,10,'Prodi',1,0,'C');
    $pdf->Cell(70,10,'Mata Kuliah Praktikum',1,0,'C');
    $pdf->Cell(50,10,'Kelas',1,0,'C');
    
    $pdf->Cell(10,9.5,'',0,1);
    $pdf->SetFont('Times');

    // Ambil nilai pekan dari query string
    $pekan = $_GET['p'];

    // Buat query SQL dengan filter pekan
    $query = "
        SELECT w.hari, w.jam_mulai, w.jam_selesai, p.nama_prodi, m.nama_mkp, kelas
        FROM jadwal j
        JOIN waktu w ON j.kode_waktu = w.kode_waktu
        JOIN mkp m ON j.kode_mkp = m.kode_mkp
        JOIN prodi p ON m.kode_prodi = p.kode_prodi
    ";

    // Tambahkan kondisi WHERE jika pekan dipilih
    if ($pekan !== '') {
        $query .= " WHERE j.pekan = ?";
    }

    $query .= " ORDER BY w.hari, w.jam_mulai";

    // Prepare dan execute query
    $stmt = $connect->prepare($query);

    // Bind parameter jika pekan dipilih
    if ($pekan !== '') {
        $stmt->bind_param("i", $pekan);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    // Tampilkan hasil query
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $pdf->Cell(30,10,$row['hari'],1,0);
            $pdf->Cell(40,10,$row['jam_mulai'],1,0);
            $pdf->Cell(40,10,$row['jam_selesai'],1,0);
            $pdf->Cell(50,10,$row['nama_prodi'],1,0);
            $pdf->Cell(70,10,$row['nama_mkp'],1,0);
            $pdf->Cell(50,10,$row['kelas'],1,1);
        }
    } else {
        echo "<tr><td colspan='5'>Tidak ada jadwal tersedia</td></tr>";
    }
    $pdf->Output('D',$title.".pdf");

    $stmt->close();
    $connect->close();

?>