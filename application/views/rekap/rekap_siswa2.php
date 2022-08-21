<body> 
<center><H1>Rekap Absen Siswa</H1></center>

<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">

</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="table-responsive">
<div class="dataTable_wrapper">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach($data as $absen)
{
?>
<tr>
<td><?php echo $i++ ?></td>
<td><?php echo $absen->nis;?></td>
<td><?php echo $absen->nama;?></td>
<td><?php echo $absen->kelas;?></td>
<td><?php echo $absen->jurusan;?></td>
<td><?php echo $absen->Hadir ?></td>
<td><?php echo $absen->Sakit ?></td>
<td><?php echo $absen->Izin ?></td>
<td><?php echo $absen->Alfa ?></td>
<td><?php echo $absen->Terlambat ?></td>
<td><?php echo $absen->ket;?></td>
<td>
<a href="<?php echo site_url('absen/detail2/'.$absen->nis.'/'.$absen->id_mapel)?>" class="btn btn-info">DETAIL</a>
</td>
</tr>
</tbody>
<?php } ?>