<div class="row">
                <div class="col-xs-12 ">
                    <h1 class="page-header">Absen Siswa</h1>
                </div>
                <!-- /.col-lg-12 -->
            
<div class="form-group">
<div class="col-xs-3">
	<?php echo form_open("absen/tampil");?>
	<select class="form-control" name="id_jur">
		<option value="">Jurusan</option>
		<?php if (count($getjrs)):?>
			<?php foreach ($getjrs as $jrs):?>
				<option value=<?php echo $jrs->id_jur;?>><?php echo $jrs->jurusan;?></option>
			<?php endforeach; ?>
			<?php else:?>
			<?php endif;?>
	</select>
</div>
</div>
	<div class="form-group">
<div class="col-xs-3">
<select class="form-control" name="id_kelas">
		<option value="">Kelas</option>
		<?php if (count($getkls)):?>
			<?php foreach ($getkls as $getkls):?>
				<option value=<?php echo $getkls->id_kelas;?>><?php echo $getkls->kelas;?>
				</option>
			<?php endforeach; ?>
			<?php else:?>
			<?php endif;?>
	</select>
</div>
<div class="col-xs-3">
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
<th>Nama Siswa</th>
<th>Kelas</th>
<th>Jurusan</th>
<th>---Absen---</th>
<th>Keterangan</th>
</tr>
</thead>
<tbody>
<?php
echo validation_errors('<div class="alert alert-warning">','</div>');
//error upload file
if (isset($error)) {
    echo '<div class="alert alert-warning">';
    echo $error;
    echo '</div>';
}
echo form_open_multipart(site_url('absen/save'));
?>
	<?php if(count($records)):?>
		<?php $i=1; foreach ($records as $key ) :?>
<tr>
<td><?php echo $i++ ?></td>
<td><?php echo $key->nama;?></td>
<td><?php echo $key->kelas;?></td>
<td><?php echo $key->jurusan;?></td>
<td><select class="form-control" name="absen[]">
				<option value="Alfa">Alfa</option>
                  <option value="Hadir">Hadir</option>
                  <option value="Sakit">Sakit</option>
                  <option value="Izin">Izin</option>
                  <option value="Terlambat">Terlambat</option>
             </select></td>
<td><input class="form-control" placeholder="Keterangan" name="ket[]" value="<?php echo set_value('ket') ?>"></td>
<input name="id_siswa[]" value="<?php echo $key->id_siswa ?>" hidden>
<input name="id_kelas[]" value="<?php echo $key->id_kelas ?>" hidden>
<input name="id_jur[]" value="<?php echo $key->id_jur ?>" hidden>
<input name="sem[]" value="<?php echo set_value(1) ?>" hidden>
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
<div class="form-group">
<div class="col-lg-2">
	<label>Mata Pelajaran</label>
            <?php
            	$con = mysqli_connect("localhost","root","") or die("Koneksi gagal");
            	mysqli_select_db($con,"absensmk") or die("Database tidak bisa dibuka");
				$result = mysqli_query($con,"select * from mapel");  
				$jsArray = "var prdName = new Array();\n";
				echo '
					<select class="form-control" name="id_mapel" onchange="document.getElementById(\'prd_name\').value = prdName[this.value]">  
					<option name="id_mapel">Mata Pelajaran</option>';
					while ($row = mysqli_fetch_array($result)) {  
					echo '
						<option value="' . $row['id_mapel'] . '">' . $row['mapel'] . '</option>';  
						$jsArray .= "prdName['" . $row['id_mapel'] . "'] = '" . addslashes($row['id_guru']) . "';\n";
					}  
					echo '
					</select>'; 
				?> 
			</div>
			<div class="col-lg-2">
            <div class="form-group">
            <label>NIP / ID Guru</label>
             <input class="form-control" id="prd_name" placeholder="NIP / ID Guru" name="id_guru" value="<?php echo set_value('id_guru')?>" required>
             <script type="text/javascript">  
				<?php echo $jsArray; ?>  
				</script>

</div>
</div>
</div>
</div>
<div class="col-lg-2">
<div class="form-group">
<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
</div>
</div>
<?php echo form_close();?>