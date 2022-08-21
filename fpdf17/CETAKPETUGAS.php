
<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
//gambar
$pdf->Image('logosmk.jpg',10,9,35);
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,20,'SMKN 1 SINTUK TOBOH GADANG',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,5,'DAFTAR PETUGAS KELAS IX RPL',0,1,'C');

$pdf->line(2,50,207,50);
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,25,'',0,1);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,6,'ID',1,0);
$pdf->Cell(45,6,'NAMA PETUGAS',1,0);
$pdf->Cell(35,6,'USERNAME',1,0);
$pdf->Cell(35,6,'HAK AKSES',1,1);

 
$pdf->SetFont('Arial','',10);
 
include 'koneksi.php';
$petugas = mysqli_query($connect, "select * from petugas");
while ($row = mysqli_fetch_array($petugas)){
    $pdf->Cell(30,6,$row['id'],1,0);
    $pdf->Cell(45,6,$row['nama_depan'],1,0);
    $pdf->Cell(35,6,$row['password'],1,0);
    $pdf->Cell(35,6,$row['hak'],1,1); 
}
 
$pdf->Output();
?>
