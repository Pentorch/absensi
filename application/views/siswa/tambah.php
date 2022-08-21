<?php
echo validation_errors('<div class="alert alert-warning">','</div>');
//error upload file
if (isset($error)) {
    echo '<div class="alert alert-warning">';
    echo $error;
    echo '</div>';
}
echo form_open_multipart(site_url('siswa/tambah_siswa'));
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
            <div class="col-lg-6">
       <form role="form">
            <h3 class="page-header">Data Diri Siswa</h3>
            <div class="form-group">
            <label>NIS</label>
             <input class="form-control" placeholder="NIS" name="nis" value="<?php echo set_value('nis') ?>" required>
            </div>
            <div class="form-group">
            <label>NISN</label>
             <input class="form-control" placeholder="NISN" name="nisn" value="<?php echo set_value('nisn') ?>" >
            </div>
            <div class="form-group">
            <label>Nama Siswa</label>
             <input class="form-control" placeholder="Nama Siswa" name="nama" value="<?php echo set_value('nama') ?>" >
            </div>
            <div class="form-group">
            <label>Foto</label>
             <input type="file" name="foto" class="form_control" value="<?php echo set_value('foto') ?>" required></input>
            </div>
            <div class="form-group">
            <label>Tempat / Tanggal Lahir</label>
             <input class="form-control" placeholder="Tempat / Tanggal Lahir" name="ttl" value="<?php echo set_value('ttl') ?>" >
            </div>
            <div class="form-group">
            <label>Umur</label>
             <input class="form-control" placeholder="Umur" name="umur" value="<?php echo set_value('umur') ?>" >
            </div>
            <div class="form-group">
            <label>Jenis Kelamin</label>
             <select class="form-control" name="jk" >
                  <option value="Laki - Laki">Laki - Laki</option>
                  <option value="Perempuan">Perempuan</option>
             </select>
            </div>
            <div class="form-group">
            <label>Agama</label>
             <select class="form-control" name="agama">
                  <option value="Islam">Islam</option>
                  <option value="Katolik">Katolik</option>
                  <option value="Protestan">Protestan</option>
                  <option value="Budha">Budha</option>
                  <option value="Hindu">Hindu</option>
             </select>
             
            </div>
            <div class="form-group">
            <label>Status Dalam Keluarga</label>
             <input class="form-control" placeholder="Status Dalam Keluarga" name="status" value="<?php echo set_value('status') ?>" >
            </div>
            <div class="form-group">
            <label>Anak ke-</label>
             <input class="form-control" placeholder="Anak keberapa" name="anak_ke" value="<?php echo set_value('anak_ke') ?>" >
            </div>
             <div class="form-group">
            <label>Alamat</label>
             <input class="form-control" placeholder="Alamat" name="alamat" value="<?php echo set_value('alamat')?>" >
             </div>
             <div class="form-group">
            <label>Telephon / HP</label>
             <input class="form-control" placeholder="Nomor Telephon / HP" name="no_hp" value="<?php echo set_value('no_hp') ?>" >
             </div>
             <h3 class="page-header">Data Orang Tua</h3>
            <div class="form-group">
            <label>Nama Ayah</label>
             <input class="form-control" placeholder="Nama Ayah" name="nama_ayah" value="<?php echo set_value('nama_ayah') ?>">
            </div>
            <div class="form-group">
            <label>Nama Ibu</label>
             <input class="form-control" placeholder="Nama Ibu" name="nama_ibu" value="<?php echo set_value('nama_ibu') ?>">
            </div>
            <div class="form-group">
            <label>Pekerjaan Ayah</label>
             <input class="form-control" placeholder="Pekerjaan Ayah" name="pkj_ayah" value="<?php echo set_value('pkj_ayah') ?>">
            </div>
            <div class="form-group">
            <label>Pekerjaan Ibu</label>
             <input class="form-control" placeholder="Pekerjaan Ibu" name="pkj_ibu" value="<?php echo set_value('pkj_ibu') ?>">
            </div>
            <div class="form-group">
            <label>Alamat Orang Tua</label>
             <input class="form-control" placeholder="Alamat Orang Tua" name="alamat_ortu" value="<?php echo set_value('alamat_ortu') ?>" >
             </div>
             <div class="form-group">
            <label>Nomor Telephon / HP</label>
             <input class="form-control" placeholder="Nomor Telephon / HP" name="nohp_ortu" value="<?php echo set_value('nohp_ortu') ?>" >
             </div>
             
       </form>
 </div>

              <div class="col-lg-6">
             <h3 class="page-header">Diterima Di Sekolah</h3>
            <div class="form-group">
             <label>Jurusan</label>
             <select name="id_jur" id="jurusan" class="form-control">
                    <option> Pilih Jurusan</option>
            <?php foreach($jurusan as $jur){
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
            <label>Tanggal Masuk</label>
             <input class="form-control" placeholder="Contoh : 12 juli 2017" name="tgl_masuk" value="<?php echo set_value('tgl_masuk') ?>" >
            </div>
            <h3 class="page-header">Sekolah Asal</h3>
            <div class="form-group">
            <label>Nama Sekolah Asal</label>
             <input class="form-control" placeholder="Nama Sekolah Asal" name="asal_sklh" value="<?php echo set_value('asal_sklh') ?>">
            </div>
            <div class="form-group">
            <label>Alamat</label>
             <input class="form-control" placeholder="Alamat Sekolah Asal" name="alamat_asal_sklh" value="<?php echo set_value('alamat_asal_sklh') ?>" >
             </div>
             <h3 class="page-header">Ijazah SMP/MTs/Paket B</h3>
            <div class="form-group">
            <label>Tahun Ijazah</label>
             <input class="form-control" placeholder="Tahun Ijazah" name="th_ijazah" value="<?php echo set_value('th_ijazah') ?>">
            </div>
            <div class="form-group">
            <label>Nomor Ijazah</label>
             <input class="form-control" placeholder="Nomor Ijazah" name="no_ijazah" value="<?php echo set_value('no_ijazah') ?>">
            </div>
            <h3 class="page-header">SKHU SMP/MTs/Paket B</h3>
            <div class="form-group">
            <label>Tahun SKHU</label>
             <input class="form-control" placeholder="Tahun SKHU" name="th_skhu" value="<?php echo set_value('th_skhu') ?>">
            </div>
            <div class="form-group">
            <label>Nomor SKHU</label>
             <input class="form-control" placeholder="Nomor SKHU" name="no_skhu" value="<?php echo set_value('no_skhu') ?>">
            </div>
            <h3 class="page-header">Data Wali</h3>
            <div class="form-group">
            <label>Nama Wali</label>
             <input class="form-control" placeholder="Nama Wali" name="wali" value="<?php echo set_value('wali') ?>">
            </div>
            <div class="form-group">
            <label>Pekerjaan Wali</label>
             <input class="form-control" placeholder="Pekerjaan Wali" name="pkj_wali" value="<?php echo set_value('pkj_wali') ?>">
            </div>
            <div class="form-group">
            <label>Alamat Wali</label>
             <input class="form-control" placeholder="Alamat Wali" name="alamat_wali" value="<?php echo set_value('alamat_wali') ?>">
            </div>
            <div class="form-group">
            <label>Telephon / HP Wali</label>
             <input class="form-control" placeholder="Nomor Telephon / HP" name="tlp_wali" value="<?php echo set_value('tlp_wali') ?>">
            </div>
             <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
            <input type="reset" name="reset" class="btn btn-default" value="Reset">
            <a href="<?php echo site_url('siswa/lihat_siswa')?>" class="btn btn-warning"><i class="fa fa-reply-all"></i>Kembali</a>
<?php
echo form_close();
?>