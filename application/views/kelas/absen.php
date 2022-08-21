<div class="row">
                <div class="col-xs-12 ">
                    <h1 class="page-header">Absen Siswa</h1>
                </div>
                <!-- /.col-lg-12 -->
            
<div class="form-group">
<form action="<?php echo base_url('jadwal/cobalagi');?>" action="GET">
<head>
<script src="<?php echo $path; ?>/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
                        
            $("#jurusan").change(function (){
                var url = "<?php echo site_url('jadwal/add_ajax_kelas');?>/"+$(this).val();
                $('#kelas').load(url);
                return false;
            })

            $("#kelas").change(function (){
                var url = "<?php echo site_url('jadwal/add_ajax_mapel');?>/"+$(this).val();
                $('#mapel').load(url);
                return false;
            })
        });
    </script>
    </head>
<div class="col-md-4">
    <div class="form-group">
             <label>Jurusan</label>
             <select name="jrs" id="jurusan" class="form-control">
                    <option> Pilih Jurusan</option>
            <?php foreach($jurusan as $jur){
                echo '<option value="'.$jur->id_jur.'">'.$jur->jurusan.'</option>';
            } ?>
                </select>
             </div>
             <div class="form-group">
             <label>Kelas</label>
             <select name="kelas" id="kelas" class="form-control">
                    <option value=''>Pilih Kelas</option>
                    
                </select>
             </div>
             <div class="form-group">
             <label>Mata Pelajaran</label>
             <select name="mapel" id="mapel" class="form-control">
                    <option>Pilih Mata Pelajaran</option>
                    
                </select>
             </div>
	<div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Tampil">
        </div>
</div> 
</form>
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
<input name="nis[]" value="<?php echo $key->nis ?>" hidden>
<input name="id_siswa[]" value="<?php echo $key->id_siswa ?>" hidden>
<input name="id_kelas[]" value="<?php echo $key->id_kelas ?>" hidden>
<input name="id_jur[]" value="<?php echo $key->id_jur ?>" hidden>
<input name="id_guru[]" value="<?php echo $key->id_guru ?>" hidden>
<input name="id_mapel[]" value="<?php echo $key->id_mapel ?>" hidden>
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
<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
</div>
</div>
