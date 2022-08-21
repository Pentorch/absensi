<?php
echo validation_errors('<div class="alert alert-warning">','</div>');
echo form_open_multipart(site_url('guru/edit_wk/'.$guru->nip));
?>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Data Guru</h1>
                </div>
                <!-- /.col-lg-12 -->
            
            <div class="col-lg-8">
       <form role="form">
            <div class="form-group">
            <label>ID Guru (NIP)</label>
             <input class="form-control" placeholder="ID Guru / NIP" name="nip" value="<?php echo $guru->nip ?>" >
            </div>
            <div class="form-group">
            <label>Nama Guru </label>
             <input class="form-control" placeholder="Nama Guru" name="nama_guru" value="<?php echo $guru->nama_guru ?>" >
            </div>
            <div class="form-group">
            <label>Tempat</label>
             <input class="form-control" placeholder="Tempat Lahir" name="tempat" value="<?php echo $guru->tempat ?>" >
            </div>
            <div class="form-group">
            <label>Tanggal Lahir </label>
            <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
            <input class="form-control" type="text" name="tanggal" placeholder="Tanggal ex: 1990-10-10" value="<?php echo $guru->tanggal ?>">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
            </div>
            <div class="form-group">
            <label>Jenis Kelamin</label>
             <select class="form-control" name="jk" >
                  <option value="Laki - Laki" <?php if ($guru->jk=="Laki - Laki") { echo "selected=\"selected\""; } ?>>Laki - Laki</option>
                  <option value="Perempuan" <?php if ($guru->jk=="Perempuan") { echo "selected=\"selected\""; } ?> >Perempuan</option>
             </select>
            </div>
            <div class="form-group">
            <label>Jabatan </label>
             <select class="form-control" placeholder="Jabatan Guru" name="jabatan" >
                  <option value="Kepala Sekolah" <?php if ($guru->jabatan=="Kepala Sekolah") { echo "selected=\"selected\""; } ?>>Kepala Sekolah</option>
                  <option value="Wakil Kurikulum" <?php if ($guru->jabatan=="Wakil Kurikulum") { echo "selected=\"selected\""; } ?>>Wakil Kurikulum</option>
                  <option value="Wakil Kesiswaan" <?php if ($guru->jabatan=="Wakil Kesiswaan") { echo "selected=\"selected\""; } ?>>Wakil Kesiswaan</option>
                  <option value="Wakil Humas" <?php if ($guru->jabatan=="Wakil Humas") { echo "selected=\"selected\""; } ?>>Wakil Humas</option>
                  <option value="Wakil Sarana" <?php if ($guru->jabatan=="Wakil Sarana") { echo "selected=\"selected\""; } ?>>Wakil Sarana</option>
                  <option value="Kepala Tata Usaha" <?php if ($guru->jabatan=="Kepala Tata Usaha") { echo "selected=\"selected\""; } ?>>Kepala Tata Usaha</option>
                  <option value="Kepala Perpustakaan" <?php if ($guru->jabatan=="Kepala Perpustakaan") { echo "selected=\"selected\""; } ?>>Kepala Perpustakaan</option>
                  <option value="Ketua Jurusan TI" <?php if ($guru->jabatan=="Ketua Jurusan TI") { echo "selected=\"selected\""; } ?>>Ketua Jurusan TI</option>
                  <option value="Ketua Jurusan Boga" <?php if ($guru->jabatan=="Ketua Jurusan Boga") { echo "selected=\"selected\""; } ?>>Ketua Jurusan Boga</option>
                  <option value="Ketua Jurusan APH" <?php if ($guru->jabatan=="Ketua Jurusan APH") { echo "selected=\"selected\""; } ?>>Ketua Jurusan APH</option>
                  <option value="Ketua Jurusan TBSM" <?php if ($guru->jabatan=="Ketua Jurusan TBSM") { echo "selected=\"selected\""; } ?>>Ketua Jurusan TBSM</option>
                  <option value="Guru" <?php if ($guru->jabatan=="Guru") { echo "selected=\"selected\""; } ?>>Guru</option>
                  <option value="Operator" <?php if ($guru->jabatan=="Operator") { echo "selected=\"selected\""; } ?>>Operator</option>
                  <option value="Pegawai Tata Usaha" <?php if ($guru->jabatan=="Pegawai Tata Usaha") { echo "selected=\"selected\""; } ?>>Pegawai Tata Usaha</option>
                  <option value="Pegawai Perpustakaan" <?php if ($guru->jabatan=="Pegawai Perpustakaan") { echo "selected=\"selected\""; } ?>>Pegawai Perpustakaan</option>
             </select>
            </div>
            <div class="form-group">
            <label>Bidang Studi </label>
             <select class="form-control" placeholder="Bidang Studi" name="bid_studi" value="<?php $guru->bid_studi ?>" >
                  <option value="Produktif TI" <?php if ($guru->bid_studi=="Produktif TI") { echo "selected=\"selected\""; } ?>>Produktif TI</option>
                  <option value="Produktif Boga" <?php if ($guru->bid_studi=="Produktif Boga") { echo "selected=\"selected\""; } ?>>Produktif Boga</option>
                  <option value="Produktif APH" <?php if ($guru->bid_studi=="Produktif APH") { echo "selected=\"selected\""; } ?>>Produktif APH</option>
                  <option value="Produktif TBSM" <?php if ($guru->bid_studi=="Produktif TBSM") { echo "selected=\"selected\""; } ?>>Produktif TBSM</option>
                  <option value="Matematika" <?php if ($guru->bid_studi=="Matematika") { echo "selected=\"selected\""; } ?>>Matematika</option>
                  <option value="Bahasa Indonesia" <?php if ($guru->bid_studi=="Bahasa Indonesia") { echo "selected=\"selected\""; } ?>>Bahasa Indonesia</option>
                  <option value="Bahasa Inggris" <?php if ($guru->bid_studi=="Bahasa Inggris") { echo "selected=\"selected\""; } ?>>Bahasa Inggris</option>
                  <option value="Bahasa Jepang" <?php if ($guru->bid_studi=="Bahasa Jepang") { echo "selected=\"selected\""; } ?>>Bahasa Jepang</option>
                  <option value="Bimbingan Konseling" <?php if ($guru->bid_studi=="Bimbingan Konseling") { echo "selected=\"selected\""; } ?>>Bimbingan Konseling</option>
                  <option value="Pendidikan Kewarganegaraan" <?php if ($guru->bid_studi=="Pendidikan Kewarganegaraan") { echo "selected=\"selected\""; } ?>>Pendidikan Kewarganegaraan</option>
                  <option value="Penjkes/Olahraga" <?php if ($guru->bid_studi=="Penjkes/Olahraga") { echo "selected=\"selected\""; } ?>>Penjkes/Olahraga</option>
                  <option value="Fisika" <?php if ($guru->bid_studi=="Fisika") { echo "selected=\"selected\""; } ?>>Fisika</option>
                  <option value="Kimia" <?php if ($guru->bid_studi=="Kimia") { echo "selected=\"selected\""; } ?>>Kimia</option>
                  <option value="IPA" <?php if ($guru->bid_studi=="IPA") { echo "selected=\"selected\""; } ?>>IPA</option>
                  <option value="IPS" <?php if ($guru->bid_studi=="IPS") { echo "selected=\"selected\""; } ?>>IPS</option>
                  <option value="Agama" <?php if ($guru->bid_studi=="Agama") { echo "selected=\"selected\""; } ?>>Agama</option>
                  <option value="Sejarah" <?php if ($guru->bid_studi=="Sejarah") { echo "selected=\"selected\""; } ?>>Sejarah</option>
                  <option value="Seni Budaya" <?php if ($guru->bid_studi=="Seni Budaya") { echo "selected=\"selected\""; } ?>>Seni Budaya</option>
                  <option value="Kewirausahaan" <?php if ($guru->bid_studi=="Kewirausahaan") { echo "selected=\"selected\""; } ?>>Kewirausahaan</option>
                  <option value="KKPI/Siskomdig" <?php if ($guru->bid_studi=="KKPI/Siskomdig") { echo "selected=\"selected\""; } ?>>KKPI/Siskomdig</option>
                  <option value="Perpustakaan" <?php if ($guru->bid_studi=="Perpustakaan") { echo "selected=\"selected\""; } ?>>Perpustakaan</option>
                  <option value="Tata Usaha" <?php if ($guru->bid_studi=="Tata Usaha") { echo "selected=\"selected\""; } ?>>Tata Usaha</option>
             </select>
            </div>
            <div class="form-group">
            <label>Nomor HP </label>
             <input class="form-control" placeholder="Nomor HP" name="no_hp" value="<?php echo $guru->no_hp ?>" >
            </div>
            <div class="form-group">
            <label>Foto</label>
             <input type="file" name="foto" class="form_control" value="<?php echo $guru->foto ?>"></input>
            </div>
            <div class="form-group">
            <label>Alamat</label>
             <textarea id="article" name="alamat" class="form-control" placeholder="Alamat" ><?php echo $guru->alamat ?></textarea>
             </div>
             <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
            <input type="reset" name="reset" class="btn btn-default" value="Reset">
<?php
echo form_close();
?>
