<?php
echo validation_errors('<div class="alert alert-warning">','</div>');
//error upload file
if (isset($error)) {
    echo '<div class="alert alert-warning">';
    echo $error;
    echo '</div>';
}
echo form_open_multipart(site_url('kelas/tambah'));
?>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Kelas</h1>
                </div>
                <!-- /.col-lg-12 -->
            
            <div class="col-lg-8">
       <form role="form">
            <div class="form-group">
            <label>Nama Kelas</label>
             <input class="form-control" placeholder="Nama Kelas" name="kelas" value="<?php echo set_value('kelas')?>" required>
            </div>
            <div class="form-group">
            <label>Jurusan</label>
             <select class="form-control" name="id_jur">
             <?php foreach ($jur as $jur) { ?>
                 <option value="<?php echo $jur->id_jur ?>">
                 <?php echo $jur->jurusan?>
                 </option>
             <?php } ?>
             </select>
            </div>
            <div class="form-group">
            <label>Wali Kelas </label>
             <select class="form-control" name="id_guru">
             <?php foreach ($guru as $guru) { ?>
                 <option value="<?php echo $guru->id_guru ?>">
                 <?php echo $guru->nama_guru?>
                 </option>
             <?php } ?>
             </select>
            </div>
             <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
            <input type="reset" name="reset" class="btn btn-default" value="Reset">
            <a href="<?php echo site_url('kelas')?>" class="btn btn-warning"><i class="fa fa-reply-all"></i>Kembali</a>
<?php
echo form_close();
?>