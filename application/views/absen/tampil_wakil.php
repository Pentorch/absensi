<div class="row">
                <div class="col-xs-12 ">
                    <h1 class="page-header">Absen Guru</h1>
                </div>
                <!-- /.col-lg-12 -->
            
<div class="form-group">
<div class="col-xs-3">
	<?php echo form_open("guru/guru");?>
	<select class="form-control" name="id_hari">
		<option value="">Hari</option>
		<?php if (count($gethari)):?>
			<?php foreach ($gethari as $gethari):?>
				<option value=<?php echo $gethari->id_hari;?>><?php echo $gethari->hari;?>
				</option>
			<?php endforeach; ?>
			<?php else:?>
			<?php endif;?>
	</select>
</div>
<div class="col-xs-6">
<input type="submit" name="submit" class="btn btn-primary" value="TAMPIL">
</div>
<?php echo form_close();?>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
</div>
<div class="table-responsive">
<div class="table-responsive table-bordered">
<table class="table">
<thead>
<tr>
<th>No</th>
<th>Nama Guru</th>
<th>JamKe-</th>
<th>Kelas</th>
<th>Jurusan</th>
<th>Mata Pelajaran</th>
<th>---Absen---</th>
<th>Keterangan</th>
</tr>
</thead>
<tbody>
<?php
echo validation_errors('<div class="alert alert-warning">','</div>');
//error upload file
if (isset($test)) {
    echo '<div class="alert alert-warning">';
    echo $test;
    echo '</div>';
}
echo form_open_multipart(site_url('guru/simpan_guru'));
?>
	<?php if(count($records)):?>
		<?php $i=1; foreach ($records as $key ) :?>
<tr>
<td><?php echo $i++ ?></td>
<td><?php echo $key->nama_guru;?></td>
<td><?php echo $key->jam;?></td>
<td><?php echo $key->kelas;?></td>
<td><?php echo $key->jurusan;?></td>
<td><?php echo $key->mapel;?></td>
<td><select class="form-control" name="absen[]">
				<option value="Alfa">Alfa</option>
                  <option value="Hadir">Hadir</option>
                  <option value="Sakit">Sakit</option>
                  <option value="Izin">Izin</option>
                  <option value="Terlambat">Terlambat</option>
             </select></td>
<td><input class="form-control" placeholder="Keterangan" name="ket[]" value="<?php echo set_value('ket') ?>"></td>
<input name="id_guru[]" value="<?php echo $key->id_guru ?>" hidden>
<input name="id_jam[]" value="<?php echo $key->id_jam ?>" hidden>
<input name="id_hari[]" value="<?php echo $key->id_hari ?>" hidden>
<input name="id_mapel[]" value="<?php echo $key->id_mapel ?>" hidden>
<input name="id_kelas[]" value="<?php echo $key->id_kelas ?>" hidden>
<input name="id_jur[]" value="<?php echo $key->id_jur ?>" hidden>
<input name="id_sem[]" value="<?php echo set_value(1) ?>" hidden>
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
<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
</div>
</div>
<?php echo form_close();?>