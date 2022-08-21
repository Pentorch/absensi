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
$pdf->Image('sintoga.png',173,9,35);
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->line(2,50,207,50);
$pdf->Cell(10,10,'',0,1);
 
$pdf->SetFont('Arial','B',12);
$pdf->Cell(10,6,'No',1,0);
$pdf->Cell(100,6,'Nama',1,0);
$pdf->Cell(30,6,'Username',1,0);
$pdf->Cell(30,6,'Password',1,0);
$pdf->Cell(20,6,'Status',1,1);
 
$pdf->SetFont('Arial','',10);
 
include 'koneksi.php';
$petugas = mysqli_query($connect, "SELECT * from user ORDER BY nama");
$i=1;
while ($row = mysqli_fetch_array($petugas)){
	
    $pdf->Cell(10,10,$i++,1,0);
    $pdf->Cell(100,10,$row['nama'],1,0);
    $pdf->Cell(30,10,$row['username'],1,0);
    $pdf->Cell(30,10,$row['password'],1,0);
    $pdf->Cell(20,10,$row['level'],1,1);
}
 
$pdf->Output();
?>
