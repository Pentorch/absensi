<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal<?php echo $absen->id_absen ?>">
  <i class="fa fa-trash-o"></i>
</button>
<div class="modal fade" id="myModal<?php echo $absen->id_absen ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">Hapus Data absen</h4>
</div>
<div class="modal-body">
Yakin ingin menghapus Data absen ini?
 </div>
<div class="modal-footer">
 <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
 <a href="<?php echo site_url('absen/delete/'.$absen->id_absen)?>" class="btn btn-primary"><i class="fa fa-trash-o"></i> Ya, Hapus</a>
</div>
 </div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>