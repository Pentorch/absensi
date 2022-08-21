<?php
echo validation_errors('<div class="alert alert-warning">','</div>');
//error upload file
if (isset($error)) {
    echo '<div class="alert alert-warning">';
    echo $error;
    echo '</div>';
}
echo form_open_multipart(site_url('guru/tambah'));
?>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Guru</h1>
                </div>
                <!-- /.col-lg-12 -->
            
            <div class="col-lg-8">
       <form role="form">
            <div class="form-group">
            <label>ID Guru (NIP)</label>
             <input class="form-control" placeholder="ID Guru / NIP" name="nip" value="<?php echo set_value('nip')?>" required>
            </div>
            <div class="form-group">
            <label>Nama Guru </label>
             <input class="form-control" placeholder="Nama Guru" name="nama_guru" value="<?php echo set_value('nama_guru')?>" >
            </div>
            <div class="form-group">
            <label>Tempat</label>
             <input class="form-control" placeholder="Tempat Lahir" name="tempat" value="<?php echo set_value('tempat')?>" >
            </div>
            <div class="form-group">
            <label>Tanggal Lahir </label>
            <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
                    <input class="form-control" type="text" name="tanggal" placeholder="Tanggal ex: 1990-10-10" value="<?php echo set_value('tanggal')?>">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
            </div>
            <div class="form-group">
            <label>Jenis Kelamin</label>
             <select class="form-control" name="jk" >
                  <option value="Laki - Laki">Laki - Laki</option>
                  <option value="Perempuan">Perempuan</option>
             </select>
            </div>
            <div class="form-group">
            <label>Jabatan </label>
             <select class="form-control" placeholder="Jabatan Guru" name="jabatan" value="<?php echo set_value('jabatan')?>" >
                  <option value="Kepala Sekolah">Kepala Sekolah</option>
                  <option value="Wakil Kurikulum">Wakil Kurikulum</option>
                  <option value="Wakil Kesiswaan">Wakil Kesiswaan</option>
                  <option value="Wakil Humas">Wakil Humas</option>
                  <option value="Wakil Sarana">Wakil Sarana</option>
                  <option value="Kepala Tata Usaha">Kepala Tata Usaha</option>
                  <option value="Kepala Perpustakaan">Kepala Perpustakaan</option>
                  <option value="Ketua Jurusan TI">Ketua Jurusan TI</option>
                  <option value="Ketua Jurusan Boga">Ketua Jurusan Boga</option>
                  <option value="Ketua Jurusan APH">Ketua Jurusan APH</option>
                  <option value="Ketua Jurusan TBSM">Ketua Jurusan TBSM</option>
                  <option value="Guru">Guru</option>
                  <option value="Operator">Operator</option>
                  <option value="Pegawai Tata Usaha">Pegawai Tata Usaha</option>
                  <option value="Pegawai Perpustakaan">Pegawai Perpustakaan</option>
             </select>
            </div>
            <div class="form-group">
            <label>Bidang Studi </label>
             <select class="form-control" placeholder="Bidang Studi" name="bid_studi" value="<?php echo set_value('bid_studi')?>" >
                  <option value="Produktif TI">Produktif TI</option>
                  <option value="Produktif Boga">Produktif Boga</option>
                  <option value="Produktif APH">Produktif APH</option>
                  <option value="Produktif TBSM">Produktif TBSM</option>
                  <option value="Matematika">Matematika</option>
                  <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                  <option value="Bahasa Inggris">Bahasa Inggris</option>
                  <option value="Bahasa Jepang">Bahasa Jepang</option>
                  <option value="Bimbingan Konseling">Bimbingan Konseling</option>
                  <option value="Pendidikan Kewarganegaraan">Pendidikan Kewarganegaraan</option>
                  <option value="Penjkes/Olahraga">Penjkes/Olahraga</option>
                  <option value="Fisika">Fisika</option>
                  <option value="Kimia">Kimia</option>
                  <option value="IPA">IPA</option>
                  <option value="IPS">IPS</option>
                  <option value="Agama">Agama</option>
                  <option value="Sejarah">Sejarah</option>
                  <option value="Seni Budaya">Seni Budaya</option>
                  <option value="Kewirausahaan">Kewirausahaan</option>
                  <option value="KKPI/Siskomdig">KKPI/Siskomdig</option>
                  <option value="Perpustakaan">Perpustakaan</option>
                  <option value="Tata Usaha">Tata Usaha</option>
             </select>
            </div>
            <div class="form-group">
            <label>Nomor HP </label>
             <input class="form-control" placeholder="Nomor HP" name="no_hp" value="<?php echo set_value('no_hp')?>" >
            </div>
            <div class="form-group">
            <label>Foto</label>
             <input type="file" name="foto" class="form_control" value="<?php echo set_value('foto')?>" required></input>
            </div>
            <div class="form-group">
            <label>Alamat</label>
             <textarea id="article" name="alamat" class="form-control" placeholder="Alamat"></textarea>
             </div>
             <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
            <input type="reset" name="reset" class="btn btn-default" value="Reset">
            <a href="<?php echo site_url('guru')?>" class="btn btn-warning"><i class="fa fa-reply-all"></i>Kembali</a>
<?php
echo form_close();
?>