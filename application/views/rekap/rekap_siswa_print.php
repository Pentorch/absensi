<body> 
	<p>
<H1>	
<center>Rekap Absen Siswa</center></H1></p>

<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">

</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" border="1" align="center">
<thead>
<tr>
<th>No</th>
<th>NIS</th>
<th>Nama Siswa</th>
<th>Kelas</th>
<th>Jurusan</th>
<th>Hadir </th>
<th>Sakit</th>
<th>Ijin</th>
<th>Alfa</th>
<th>Terlambat</th>
<th>Keterangan</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach($data as $absen)
{
?>
<tr>
<td align="center"><?php echo $i++ ?></td>
<td><?php echo $absen->nis;?></td>
<td><?php echo $absen->nama;?></td>
<td><?php echo $absen->kelas;?></td>
<td><?php echo $absen->jurusan;?></td>
<td align="center"><?php echo $absen->Hadir ?></td>
<td align="center"><?php echo $absen->Sakit ?></td>
<td align="center"><?php echo $absen->Izin ?></td>
<td align="center"><?php echo $absen->Alfa ?></td>
<td align="center"><?php echo $absen->Terlambat ?></td>
<td><?php echo $absen->ket;?></td>

</tr>
</tbody>
<?php } ?>