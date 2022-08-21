<body> 
<center><H1>Rekap Absen Guru</H1></center>
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
<th>NIP / ID Guru</th>
<th>Nama Guru</th>
<th>Hadir </th>
<th>Sakit</th>
<th>Ijin</th>
<th>Alfa</th>
<th>Terlambat</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php $i=1;
foreach($absen as $absen)
{
?>
<tr>
<td><?php echo $i++ ?></td>
<td><?php echo $absen->nip;?></td>
<td><?php echo $absen->nama_guru;?></td>
<td><?php echo $absen->Hadir ?></td>
<td><?php echo $absen->Sakit ?></td>
<td><?php echo $absen->Izin ?></td>
<td><?php echo $absen->Alfa ?></td>
<td><?php echo $absen->Terlambat ?></td>
<td>
<a href="<?php echo site_url('rekap/detail2/'.$absen->id_guru)?>" class="btn btn-info">DETAIL</a>
</td>
<?php } ?>
</tr>
</tbody>