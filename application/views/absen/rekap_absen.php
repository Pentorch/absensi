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
                <div class="col-lg-12">
                    <h1 class="page-header">Rekap Absen Siswa</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<div class="form-group">
<div class="col-lg-2">
	<?php echo form_open("absen/rekap");?>
	<select class="form-control" name="id_jam">
		<option value="">Pilih Jam Ke-</option>
		<?php if (count($getjam)):?>
			<?php foreach ($getjam as $getjam):?>
				<option value=<?php echo $getjam->id_jam;?>><?php echo $getjam->jam;?>
				</option>
			<?php endforeach; ?>
			<?php else:?>
			<?php endif;?>
	</select>
</div>
<div class="form-group">
<div class="col-lg-3">
	<select class="form-control" name="id_kelas">
		<option value="">Pilih Kelas</option>
		<?php if (count($getkls)):?>
			<?php foreach ($getkls as $getkls):?>
				<option value=<?php echo $getkls->id_kelas;?>><?php echo $getkls->kelas;?>
				</option>
			<?php endforeach; ?>
			<?php else:?>
			<?php endif;?>
	</select>
</div>

<div class="form-group">
<div class="col-lg-4">
	<select class="form-control" name="id_jur">
		<option value="">Pilih Jurusan</option>
		<?php if (count($getjrs)):?>
			<?php foreach ($getjrs as $jrs):?>
				<option value=<?php echo $jrs->id_jur;?>><?php echo $jrs->jurusan;?></option>
			<?php endforeach; ?>
			<?php else:?>
			<?php endif;?>
	</select>
</div>
</div>
<input type="submit" name="submit" class="btn btn-primary" value="TAMPIL">
<?php echo form_close();?>
</div>
<div class="row">
<div class="col-lg-12">

<!-- /.panel-heading -->
<div class="panel-body">
<div class="dataTable_wrapper">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
<th>No</th>
<th>Nama Siswa</th>
<th>Kelas</th>
<th>Jurusan</th>
<th>Hadir</th>
<th>Sakit</th>
<th>Izin</th>
<th>Alfa</th>
<th>Tanggal</th>
<th>Guru</th>
<th>Jam Ke-</th>
<th>Keterangan</th>
</tr>
</thead>
<tbody>
	<?php if(count($records)):?>
		<?php $i=1; foreach ($records as $absen ) :?>
<tr>
<td><?php echo $i++ ?></td>
<td><?php echo $absen->nama ?></td>
<td><?php echo $absen->kelas ?></td>
<td><?php echo $absen->jurusan ?></td>
<td><?php echo $absen->hadir ?></td>
<td><?php echo $absen->sakit ?></td>
<td><?php echo $absen->izin ?></td>
<td><?php echo $absen->alfa ?></td>
<td><?php echo $absen->tanggal ?></td>
<td><?php echo $absen->nama_guru ?></td>
<td><?php echo $absen->jam ?></td>
<td><?php echo $absen->ket ?></td>
</tr>

<?php endforeach;?>
<?php else:?>
	<td>Tidak Ada Data</td>
<?php endif;?>
</tbody>
</table>
</div>
</div>
</div>
</div>