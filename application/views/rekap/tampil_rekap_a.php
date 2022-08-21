<body> 
<center><H1>Rekap Absen Siswa</H1></center>
<div class="col-md-6">
<form action="<?php echo base_url('absen/cobalagi_a');?>" action="GET">
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

             <div class="form-group">
             <label>Mata Pelajaran</label>
             <select name="mapel" id="mapel" class="form-control">
                    <option>Pilih Mata Pelajaran</option>
                    
                </select>
             </div>
    <div class="form-group" >
    <input type="submit" name="submit" class="btn btn-primary" value="TAMPIL">
            </button>
        </div>
</div>
