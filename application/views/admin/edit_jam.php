<?php
echo validation_errors('<div class="alert alert-warning">','</div>');
echo form_open(site_url('jadwal/edit/'.$jam->id_jam));
?>
<div class="row">
<div class="col-lg-12">
                    <h1 class="page-header">Edit Jam Pelajaran</h1>
                </div>
                <!-- /.col-lg-12 -->

            <div class="col-lg-8">
       <form role="form">
            <div class="form-group">
            <label>Jam</label>
             <input class="form-control" placeholder="Jam Ke-" name="jam" value="<?php echo $jam->jam ?>">
            </div>
            <div class="form-group">
            <label>Durasi</label>
             <input class="form-control" placeholder="ex: 07.30 - 08.15" name="durasi" value="<?php echo $jam->durasi ?>">
            </div>
            <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
            <a href="<?php echo site_url('jadwal')?>" class="btn btn-warning"><i class="fa fa-reply-all"></i>Kembali</a>
<?php
echo form_close();
?>