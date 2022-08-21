<?php
echo validation_errors('<div class="alert alert-warning">','</div>');
//error upload file
if (isset($error)) {
    echo '<div class="alert alert-warning">';
    echo $error;
    echo '</div>';
}
echo form_open_multipart(site_url('jadwal/tambah_jadwal'));
?>
<div class="row">
    <head>
<script src="<?php echo $path; ?>/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
                        
            $("#jurusan").change(function (){
                var url = "<?php echo site_url('jadwal/add_ajax_kelas');?>/"+$(this).val();
                $('#kelas').load(url);
                return false;
            })

            $("#kelas").change(function (){
                var url = "<?php echo site_url('jadwal/add_ajax_mapel');?>/"+$(this).val();
                $('#mapel').load(url);
                return false;
            })
        });
    </script>
    </head>
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Jadwal</h1>
                </div>
                <!-- /.col-lg-12 -->
            
            <div class="col-lg-8">
       <form role="form">
            <div class="form-group">
            <label>Hari</label>
            <select class="form-control" name="id_hari">
             <?php foreach ($hari as $hari) { ?>
                 <option value="<?php echo $hari->id_hari ?>">
                 <?php echo $hari->hari?>
                 </option>
             <?php } ?>
             </select>
            </div>
            <div class="form-group">
             <label>Jurusan</label>
             <select name="id_jur" id="jurusan" class="form-control">
                    <option> Pilih Jurusan</option>
            <?php foreach($jur as $jur){
                echo '<option value="'.$jur->id_jur.'">'.$jur->jurusan.'</option>';
            } ?>
                </select>
             </div>
             <div class="form-group">
             <label>Kelas</label>
             <select name="id_kelas" id="kelas" class="form-control">
                    <option value=''>Pilih Kelas</option>
                    
                </select>
             </div>
             <div class="form-group">
             <label>Mata Pelajaran</label>
             <select name="id_mapel" id="mapel" class="form-control">
                    <option>Pilih Mata Pelajaran</option>
                    
                </select>
             </div>
            <div class="form-group">
                                            <label>Semester</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="sem" id="optionsRadiosInline1" value="1" checked>1
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="sem" id="optionsRadiosInline2" value="2">2
                                            </label>
                                        </div>
             <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
            <input type="reset" name="reset" class="btn btn-default" value="Reset">
            <a href="<?php echo site_url('jadwal/jadwal')?>" class="btn btn-warning"><i class="fa fa-reply-all"></i>Kembali</a>
<?php
echo form_close();
?>