<?php
echo validation_errors('<div class="alert alert-warning">','</div>');
echo form_open(site_url('jurusan/edit/'.$jur->id_jur));
?>
<div class="row">
<div class="col-lg-12">
                    <h1 class="page-header">Edit Jurusan</h1>
                </div>
                <!-- /.col-lg-12 -->

            <div class="col-lg-8">
       <form role="form">
            <div class="form-group">
            <label>Jurusan</label>
             <input class="form-control" placeholder="Jurusan" name="jurusan" value="<?php echo $jur->jurusan ?>">
            </div>
            
            <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
            <a href="<?php echo site_url('kelas')?>" class="btn btn-warning"><i class="fa fa-reply-all"></i>Kembali</a>
<?php
echo form_close();
?>