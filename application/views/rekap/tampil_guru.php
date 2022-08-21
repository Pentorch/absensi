<body> 
<center><H1>Daftar Absen Guru</H1></center>

    <!-- /.col-lg-6 -->
<!-- /.row -->
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">

</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="dataTable_wrapper">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
<th>No</th>
<th>NIP</th>
<th>Nama Guru</th>
<th>JamKe-</th>
<th>Tanggal</th>
<th>Kelas</th>
<th>Jurusan</th>
<th>Mata Pelajaran</th>
<th>Absen</th>
<th>Keterangan</th>
</tr>
</thead>
<tbody>
<?php
if(count($absen)>0)
{
	$i=1;
	foreach ($absen as $data) {
?>
<tr>
<td><?php echo $i++ ?></td>
<td><?php echo $data->nip;?></td>
<td><?php echo $data->nama_guru;?></td>
<td><?php echo $data->jam;?></td>
<td><?php echo $data->tanggal;?></td>
<td><?php echo $data->kelas;?></td>
<td><?php echo $data->jurusan;?></td>
<td><?php echo $data->mapel;?></td>
<td><?php echo $data->absen;?></td>
<td><?php echo $data->ket;?></td>
</tr>
</tbody>
<?php
	}
} else {
	echo "Data tidak ditemukan";
}
?>