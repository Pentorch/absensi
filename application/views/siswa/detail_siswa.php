<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#Modal<?php echo $siswa->nis ?>">
  DETAIL
</button>
<div class="modal fade" id="Modal<?php echo $siswa->nis ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="ModalLabel">Detail Data Siswa</h4>
</div>
<div class="modal-body">
            <div class="form-group">
            <label>NIS : </label>
             <label><?php echo $siswa->nis ?></label>
            <br>
            <label>NISN : </label>
             <label><?php echo $siswa->nisn ?></label>
            <br>
            <label>Nama Siswa : </label>
             <label><?php echo $siswa->nama ?></label>
            <br>
            <label>Tempat / Tanggal Lahir : </label>
            <label><?php echo $siswa->ttl ?></label>
            <br>
            <label>Umur : </label>
             <label><?php echo $siswa->umur ?></label>
            <br>
            <label>Jenis Kelamin : </label>
             <label><?php echo $siswa->jk ?></label>
            <br>
            <label>Agama : </label>
             <label><?php echo $siswa->agama ?></label>
            <br>
            <label>Status Dalam Keluarga : </label>
             <label><?php echo $siswa->status ?></label>
            <br>
            <label>Anak ke : </label>
             <label><?php echo $siswa->anak_ke ?></label>
            <br>
            <label>Alamat : </label>
             <label><?php echo $siswa->alamat ?></label>
            <br>
            <label>Nomor HP : </label>
             <label><?php echo $siswa->no_hp ?></label>
            <br>
            <label>Nomor Ijazah : </label>
             <label><?php echo $siswa->no_ijazah ?></label>
            <br>
            <label>Nomor SKHU : </label>
             <label><?php echo $siswa->no_skhu ?></label>
            </div><br>
<h4 class="modal-header" id="ModalLabel">Data Orang Tua</h4>
            <div class="form-group">
            <label>Nama Ayah : </label>
             <label><?php echo $siswa->nama_ayah ?></label>
            <br>
            <label>Nama Ibu : </label>
             <label><?php echo $siswa->nama_ibu ?></label>
            <br>
            <label>Pekerjaan Ayah : </label>
             <label><?php echo $siswa->pkj_ayah ?></label>
            <br>
            <label>Pekerjaan Ibu : </label>
             <label><?php echo $siswa->pkj_ibu ?></label>
            <br>
            <label>Alamat Orang Tua : </label>
             <label><?php echo $siswa->alamat_ortu ?></label>
            <br>
            <label>Nomor HP Orang Tua : </label>
             <label><?php echo $siswa->nohp_ortu ?></label>
            </div><br>

 </div>
<div class="modal-footer">
 <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
 <a href="<?php echo site_url('siswa/edit/'.$siswa->nis)?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
</div>
 </div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>