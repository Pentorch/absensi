
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
$pdf->Cell(190,5,'DAFTAR SURAT KELUAR KELAS IX RPL',0,1,'C');
$pdf->Image('logosmk.jpg',165,9,35);
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->line(2,50,207,50);
$pdf->Cell(10,20,'',0,1);
 
$pdf->SetFont('Arial','B',8);
$pdf->Cell(25,6,'No Agenda',1,0);
$pdf->Cell(25,6,'ID',1,0);
$pdf->Cell(27,6,'Jenis Surat',1,0);
$pdf->Cell(25,6,'Tanggal kirim',1,0);
$pdf->Cell(28,6,'No Surat',1,0);
$pdf->Cell(30,6,'Pengirim',1,0);
$pdf->Cell(28,6,'Perihal',1,1);
 
$pdf->SetFont('Arial','',10);
 
include 'koneksi.php';
$petugas = mysqli_query($connect, "select * from surat_keluar");
while ($row = mysqli_fetch_array($petugas)){
    $pdf->Cell(25,6,$row['no_agenda'],1,0);
    $pdf->Cell(25,6,$row['id'],1,0);
    $pdf->Cell(27,6,$row['jenis_surat'],1,0);
    $pdf->Cell(25,6,$row['tanggal_kirim'],1,0);
    $pdf->Cell(28,6,$row['no_surat'],1,0);
    $pdf->Cell(30,6,$row['pengirim'],1,0);
    $pdf->Cell(28,6,$row['perihal'],1,1); 
}
 
$pdf->Output();
?>
