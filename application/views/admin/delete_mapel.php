<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal<?php echo $mapel->id_mapel ?>">
  <i class="fa fa-trash-o"></i>
</button>
<div class="modal fade" id="myModal<?php echo $mapel->id_mapel ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">Hapus Mata Pelajaran</h4>
</div>
<div class="modal-body">
Yakin ingin menghapus Mapel ini?
 </div>
<div class="modal-footer">
 <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
 <a href="<?php echo site_url('jadwal/delete_mapel/'.$mapel->id_mapel)?>" class="btn btn-primary"><i class="fa fa-trash-o"></i> Ya, Hapus Mapel ini</a>
</div>
 </div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>