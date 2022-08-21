<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
  <i class="fa fa-plus"></i> Tambah Data Jurusan
</button>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">Tambah Data Jurusan</h4>
</div>
<div class="modal-body">
<?php
echo validation_errors('<div class="alert alert-warning">','</div>');
echo form_open(site_url('jurusan/tambah'));
?>
<div class="row">
            <div class="col-lg-12">
       <form role="form">
            <div class="form-group">
            <label>Jurusan</label>
             <input class="form-control" placeholder="Jurusan" name="jurusan" value="<?php echo set_value('jurusan')?>" required>
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