<body>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Absen Siswa</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<div class="panel panel-default">
<div class="panel-heading">
	
</div>
<div class="table-responsive table-bordered">
<table class="table">
<thead>
<tr>
<th>No</th>
<th>Nama Siswa</th>
<th>Kelas</th>
<th>jurusan</th>
<th>Absen</th>
<th>Keterangan</th>
</tr>
</thead>
<tbody>
<?php
echo validation_errors('<div class="alert alert-warning">','</div>');
echo form_open_multipart(site_url('absen/edit2/'.$absen->id_absen));
?>
	
		<?php $i=1; ?>
<tr>
<td><?php echo $i++ ?></td>
<td><?php echo $absen->id_siswa ?></td>
<td><?php echo $absen->id_kelas ?></td>
<td><?php echo $absen->id_jur ?></td>
<td><select class="form-control" name="absen" value="<?php echo $absen->absen ?>">
                  <option value="Hadir">Hadir</option>
                  <option value="Sakit">Sakit</option>
                  <option value="Izin">Izin</option>
                  <option value="Alfa">Alfa</option>
                  <option value="Terlambat">Terlambat</option>
             </select></td>
<td><input class="form-control" placeholder="Keterangan" name="ket" value="<?php echo $absen->ket ?>"></td>
<input name="id_siswa" value="<?php echo $absen->id_siswa ?>" hidden>
<input name="id_kelas" value="<?php echo $absen->id_kelas ?>" hidden>
<input name="id_jur" value="<?php echo $absen->id_jur ?>" hidden>
<input name="id_sem" value="<?php echo $absen->id_sem ?>" hidden>
</tr>

</tbody>
</table>
</div>
</div>
<div class="form-group">
<div class="col-lg-3">
<input class="form-control" placeholder="NIP / ID Guru" name="id_guru" value="<?php echo $absen->id_guru ?>" required>
</div>
</div>
<div class="form-group">
<div class="col-lg-3">
<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
</div>
</div>
<?php echo form_close();?>