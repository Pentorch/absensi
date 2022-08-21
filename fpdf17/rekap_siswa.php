<?php
ob_start();
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->Image('provinsii.png',7,9,30);
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',12);
// mencetak string 
$pdf->Cell(190,6,'PEMERINTAH PROVINSI SUMATERA BARAT',0,1,'C');
$pdf->Cell(190,8,'DINAS PENDIDIKAN',0,1,'C');
$pdf->Cell(190,9,'SEKOLAH MENENGAH KEJURUAN (SMK) NEGERI 1 SINTOGA',0,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,10,'email : smkn1sintuktobohgadang@yahoo.com',0,1,'C');
$pdf->Image('sintoga.png',170,9,35);
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->line(2,50,207,50);
$pdf->Cell(10,20,'',0,1);
 
$pdf->SetFont('Arial','B',8);
$pdf->Cell(25,6,'No',1,0);
$pdf->Cell(25,6,'NIS',1,0);
$pdf->Cell(35,6,'Tanggal',1,0);
$pdf->Cell(25,6,'Kehadiran',1,0);
$pdf->Cell(20,6,'Kode Kelas',1,0);
$pdf->Cell(20,6,'Kode Jurusan',1,0);
$pdf->Cell(30,6,'Keterangan',1,1);
//$pdf->Cell(28,6,'Perihal',1,1);
 
$pdf->SetFont('Arial','',10);
 
include 'koneksi.php';
$petugas = mysqli_query($connect, "SELECT * from absen");
$i=1;
while ($row = mysqli_fetch_array($petugas)){
	
    $pdf->Cell(25,6,$i++,1,0);
    $pdf->Cell(25,6,$row['nis'],1,0);
    $pdf->Cell(35,6,$row['tanggal'],1,0);
    $pdf->Cell(25,6,$row['absen'],1,0);
    $pdf->Cell(20,6,$row['id_kelas'],1,0);
    $pdf->Cell(20,6,$row['id_jur'],1,0);
    $pdf->Cell(30,6,$row['ket'],1,1); 
}
 
$pdf->Output();
?>
