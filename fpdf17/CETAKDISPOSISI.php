
<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->Image('logosmk.jpg',10,9,35);
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,20,'SMKN 1 SINTUK TOBOH GADANG',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,5,'DAFTAR PETUGAS KELAS IX RPL',0,1,'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->line(2,50,207,50);
$pdf->Cell(10,20,'',0,1);
 
$pdf->SetFont('Arial','B',8);
$pdf->Cell(25,6,'No Disposisi',1,0);
$pdf->Cell(25,6,'No Agenda',1,0);
$pdf->Cell(27,6,'No Surat',1,0);
$pdf->Cell(25,6,'Kepada',1,0);
$pdf->Cell(28,6,'Keterangan',1,0);
$pdf->Cell(30,6,'Status Surat',1,0);
$pdf->Cell(28,6,'Tanggapan',1,1);
 
$pdf->SetFont('Arial','',10);
 
include 'koneksi.php';
$petugas = mysqli_query($connect, "select * from disposisi");
while ($row = mysqli_fetch_array($petugas)){
    $pdf->Cell(25,6,$row['no_disposisi'],1,0);
    $pdf->Cell(25,6,$row['no_agenda'],1,0);
    $pdf->Cell(27,6,$row['no_surat'],1,0);
    $pdf->Cell(25,6,$row['kepada'],1,0);
    $pdf->Cell(28,6,$row['keterangan'],1,0);
    $pdf->Cell(30,6,$row['status_surat'],1,0);
    $pdf->Cell(28,6,$row['tanggapan'],1,1); 
}
 
$pdf->Output();
?>
