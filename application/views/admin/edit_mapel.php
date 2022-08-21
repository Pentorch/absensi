<?php
echo validation_errors('<div class="alert alert-warning">','</div>');
echo form_open_multipart(site_url('jadwal/edit_mapel/'.$mapel->id_mapel));
?>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Mata Pelajaran</h1>
                </div>
                <!-- /.col-lg-12 -->
            
            <div class="col-lg-8">
       <form role="form">
            <div class="form-group">
            <label>Mata Pelajaran</label>
             <input class="form-control" placeholder="Nama Mata Pelajaran" name="mapel" value="<?php echo $mapel->mapel ?>" required>
            </div>
            <div class="form-group">
            <label>Jam</label>
            <select class="form-control" name="id_jam">
             <?php foreach ($jam as $jam) { ?>
                 <option value="<?php echo $jam->id_jam ?>"
                 <?php if($mapel->id_jam == $jam->id_jam){ echo "selected";}?> >
                 <?php echo $jam->jam ?>
                 </option>
             <?php } ?>
             </select>
            </div>
            <div class="form-group">
            <label>Nama Guru</label>
            <select class="form-control" name="id_guru">
             <?php foreach ($guru as $guru) { ?>
                 <option value="<?php echo $guru->id_guru ?>"
                 <?php if($mapel->id_guru == $guru->id_guru){ echo "selected";}?> >
                 <?php echo $guru->nama_guru ?>
                 </option>
             <?php } ?>
             </select>
             
            </div>
             <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
            <input type="reset" name="reset" class="btn btn-default" value="Reset">
            <a href="<?php echo site_url('jadwal/jadwal')?>" class="btn btn-warning"><i class="fa fa-reply-all"></i>Kembali</a>
<?php
echo form_close();
?>