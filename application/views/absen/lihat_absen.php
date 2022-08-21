<?php
//cetak notifikasi

if($this->session->flashdata('sukses')) {
   echo '<div class="alert alert-success">';
   echo $this->session->flashdata('sukses');
   echo '</div>';
}
?>
<body>
<div class="row">
                <div class="col-xs-12">
                    <h1 class="page-header">Data Absen Siswa</h1>
                </div>
                <div class="form-group">
<div class="col-xs-3">
	<?php echo form_open("absen/coba");?>
	<select class="form-control" name="id_mapel">
		<option value="">Mata Pelajaran</option>
		<?php if (count($getmapel)):?>
			<?php foreach ($getmapel as $mapel):?>
				<option value=<?php echo $mapel->id_mapel;?>><?php echo $mapel->mapel;?></option>
			<?php endforeach; ?>
			<?php else:?>
			<?php endif;?>
	</select>
</div>
</div>
<div class="col-xs-3">
<input type="submit" name="submit" class="btn btn-primary" value="TAMPIL">
</div>
<?php echo form_close();?>
            </div>
<div class="row">
<div class="col-xs-12">
<div class="panel panel-default">
<div class="panel-heading">
</div>
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
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach($absen as $absen)
{
?>
<tr>
<td><?php echo $i++ ?></td>
<td><?php echo $absen->nis ?></td>
<td><?php echo $absen->nama ?></td>
<td><?php echo $absen->kelas ?></td>
<td><?php echo $absen->jurusan ?></td>
<td><?php echo $absen->Hadir ?></td>
<td><?php echo $absen->Sakit ?></td>
<td><?php echo $absen->Izin ?></td>
<td><?php echo $absen->Alfa ?></td>
<td><?php echo $absen->Terlambat ?></td>
<td>
<!--<a href="<?php //echo site_url('absen/edit/'.$absen->id_absen)?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
<?php
//include('delete_absen.php');
?> -->
<?php echo form_open("absen/coba_detail");?>
<input name="nis" value="<?php echo $absen->nis ?>" >
<input name="id_mapel" value="<?php echo $absen->id_mapel ?>" >
<input type="submit" name="submit" class="btn btn-info" value="DETAIL">
<?php echo form_close();?>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>