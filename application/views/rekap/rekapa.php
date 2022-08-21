<body> 
<center><H1>Rekap Absen Harian Siswa</H1></center>
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
<form action="<?php echo base_url('rekap/tampil_siswa_a');?>" action="GET">
<div class="row">
    <div class="col-lg-12">
    <div class="form-group" >
         <div class="col-md-3">
            <label>Tanggal</label>
	            <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
	                <input class="form-control" type="text" name="cari" id="tanggal">
	                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
        <div class="form-group">
             <label>Jurusan</label>
             <select name="jrs" id="jurusan" class="form-control">
                    <option> Pilih Jurusan</option>
            <?php foreach($jurusan as $jur){
                echo '<option value="'.$jur->id_jur.'">'.$jur->jurusan.'</option>';
            } ?>
                </select>
             </div>
             <div class="form-group">
             <label>Kelas</label>
             <select name="kelas" id="kelas" class="form-control">
                    <option value=''>Pilih Kelas</option>
                    
                </select>
             </div>
    <div class="form-group" >
    <input type="submit" name="submit" class="btn btn-primary" value="TAMPIL">
    </div>
</div>
    <!-- /.col-lg-6 -->
</div>
<!-- /.row -->
 </form>
 
 
 
   
