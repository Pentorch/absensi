<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
  <i class="fa fa-plus"></i> Tambah User
</button>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">Tambah User</h4>
</div>
<div class="modal-body">
<?php
echo validation_errors('<div class="alert alert-warning">','</div>');
//error upload file
if (isset($error)) {
    echo '<div class="alert alert-warning">';
    echo $error;
    echo '</div>';
}
echo form_open_multipart(site_url('user/tambah'));
?>
<div class="row">
            <div class="col-lg-12">
       <form role="form">
            <div class="form-group">
            <label>Nama Guru</label>
             <select class="form-control" name="id_guru">
             <?php foreach ($guru as $guru) { ?>
                 <option value="<?php echo $guru->id_guru ?>">
                 <?php echo $guru->nama_guru?>
                 </option>
             <?php } ?>
             </select>
            </div>
            <div class="form-group">
            <label>Kelas</label>
            <select class="form-control" name="id_kelas">
             <?php foreach ($kelas as $kelas) { ?>
                 <option value="<?php echo $kelas->id_kelas ?>">
                 <?php echo $kelas->kelas ?>
                 </option>
             <?php } ?>
             </select>
            </div>
            <div class="form-group">
            <label>Password</label>
             <input class="form-control" placeholder="Password" name="password" value="<?php echo set_value('password')?>" required>
            </div>
            <div class="form-group">
            <label>Level</label>
             <select class="form-control" name="level">
                  <option value="admin">Admin</option>
                  <option value="wakil">Kepsek / Wakil</option>
                  <option value="piket">Guru Piket</option>
                  <option value="guru">Guru</option>
                  <option value="walas">Walas</option>
             </select>
            </div>
            <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
            <input type="reset" name="reset" class="btn btn-default" value="Reset">
<?php
echo form_close();
?>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
 </div>
<!-- /.modal-content -->
</form>
</div>
</div>
</div>
</div>