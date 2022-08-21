<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#Modal<?php echo $guru->id_guru ?>">
  DETAIL
</button>
<div class="modal fade" id="Modal<?php echo $guru->id_guru ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="ModalLabel">Detail Data Guru</h4>
</div>
<div class="modal-body">
            <div class="form-group">
            <label>NIP / ID Guru : </label>
             <label><?php echo $guru->nip?></label>
            <br>
            <label>Nama Guru : </label>
             <label><?php echo $guru->nama_guru ?></label>
            <br>
            <label>Tempat  : </label>
            <label><?php echo $guru->tempat ?></label>
            <br>
            <label>Tanggal Lahir : </label>
            <label><?php echo $guru->tanggal ?></label>
            <br>
            <label>Jenis Kelamin : </label>
             <label><?php echo $guru->jk ?></label>
            <br>
            <label>Bidang Studi : </label>
             <label><?php echo $guru->bid_studi ?></label>
            <br>
            <label>Jabatan : </label>
             <label><?php echo $guru->jabatan ?></label>
            <br>
            <label>Alamat : </label>
             <label><?php echo $guru->alamat ?></label>
            <br>
            <label>Nomor HP : </label>
             <label><?php echo $guru->no_hp ?></label>
            </div><br>
 </div>
<div class="modal-footer">
 <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
 <a href="<?php echo site_url('guru/edit_guru/'.$guru->id_guru)?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
</div>
 </div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>