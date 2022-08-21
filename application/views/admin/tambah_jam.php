<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
  <i class="fa fa-plus"></i> Tambah Jam Pelajaran
</button>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">Tambah Data Jam Pelajaran</h4>
</div>
<div class="modal-body">
<?php
echo validation_errors('<div class="alert alert-warning">','</div>');
echo form_open(site_url('jadwal/tambah'));
?>
<div class="row">
            <div class="col-lg-12">
       <form role="form">
            <div class="form-group">
            <label>Jam Ke-</label>
             <input class="form-control" placeholder="Jam Ke-" name="jam" value="<?php echo set_value('jam')?>" required>
            </div>
            <div class="form-group">
            <label>Durasi</label>
             <input class="form-control" placeholder="ex: 07.30 - 08.15" name="durasi" value="<?php echo set_value('durasi')?>" required>
            </div>
            <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
            <input type="reset" name="reset" class="btn btn-default" value="Reset">
<?php
echo form_close();
?>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
 </div>
<!-- /.modal-content -->
</form>
</div>
</div>
</div>
</div>