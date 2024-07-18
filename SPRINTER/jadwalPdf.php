<?php
    require('assets/library/fpdf.php');
    include 'koneksi.php';

    $pdf=new FPDF('L','mm','legal');
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
    $pdf->Cell(0,10,$title,0,0,'C');
    
    $pdf->Cell(10,25,'',0,1);
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(30,10,'Hari',1,0,'C');
    $pdf->Cell(30,10,'Mulai',1,0,'C');
    $pdf->Cell(30,10,'Selesai',1,0,'C');
    $pdf->Cell(45,10,'Prodi',1,0,'C');
    $pdf->Cell(65,10,'Mata Kuliah Praktikum',1,0,'C');
    $pdf->Cell(30,10,'Kelas',1,0,'C');
    $pdf->Cell(50,10,'Dosen',1,0,'C');
    $pdf->Cell(30,10,'Lab',1,0,'C');
    $pdf->Cell(25,10,'pekan',1,0,'C');
    
    $pdf->Cell(10,9.5,'',0,1);
    $pdf->SetFont('Times');

    // Ambil nilai pekan dan kode_lab dari query string
    $lab = isset($_GET['l']) ? $_GET['l'] : '';
    $pekan = isset($_GET['p']) ? $_GET['p'] : '';

    // Buat query SQL dengan filter pekan
        $query = "
        SELECT w.hari, w.jam_mulai, w.jam_selesai, p.nama_prodi, m.nama_mkp, a.kode_kelas, a.dosen, l.nama_lab, j.pekan
        FROM jadwal j
        JOIN waktu w ON j.kode_waktu = w.kode_waktu
        JOIN ajuan a ON j.kode_ajuan = a.kode_ajuan
        JOIN prodi p ON a.kode_prodi = p.kode_prodi
        JOIN mkp m ON a.kode_mkp = m.kode_mkp
        JOIN laboratorium l ON a.kode_lab = l.kode_lab
        ";

        $where = [];
        $params = [];
        $types = '';

        if ($lab !== '') {
        $where[] = 'a.kode_lab = ?';
        $params[] = $lab;
        $types .= 's';
        }

        if ($pekan !== '') {
        $where[] = 'j.pekan = ?';
        $params[] = $pekan;
        $types .= 'i';
        }

        if (count($where) > 0) {
        $query .= ' WHERE ' . implode(' AND ', $where);
        }

        $query .= " ORDER BY j.pekan, w.hari, w.jam_mulai";
        // Prepare dan execute query
        $stmt = $connect->prepare($query);

        if (count($params) > 0) {
        $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        // Tampilkan hasil query
        if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $pdf->Cell(30,10,$row['hari'],1,0);
            $pdf->Cell(30,10,$row['jam_mulai'],1,0);
            $pdf->Cell(30,10,$row['jam_selesai'],1,0);
            $pdf->Cell(45,10,$row['nama_prodi'],1,0);
            $pdf->Cell(65,10,$row['nama_mkp'],1,0);
            $pdf->Cell(30,10,$row['kode_kelas'],1,0);
            $pdf->Cell(50,10,$row['dosen'],1,0);
            $pdf->Cell(30,10,$row['nama_lab'],1,0);
            $pdf->Cell(25,10,"pekan ke-".$row['pekan'],1,1);
        }
    } else {
        echo "<tr><td colspan='5'>Tidak ada jadwal tersedia</td></tr>";
    }
    $pdf->Output();

    $stmt->close();
    $connect->close();

?>