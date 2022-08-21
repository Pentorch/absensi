<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">My Profil</h1>
                
                <!-- /.col-lg-12 -->
<!-- /.row -->
<div class="col-lg-8">
       <form role="form">
           <div class="form-group">
            <?php $i=1; foreach($siswa as $siswa)
{
?>
             <img src="<?php echo base_url('asset/upload/img/'.$siswa->foto)?>" width="100px" >
            <br>
            <label>Nama : </label>
             <label><?php echo $siswa->nama ?></label>
            <br>
            <label>NIS : </label>
             <label><?php echo $siswa->nis ?></label>
            <br>
            <label>Tempat : </label>
            <label><?php echo $siswa->tempat ?></label>
            <br>
            <label>Tanggal Lahir : </label>
            <label><?php echo $siswa->tanggal ?></label>
            <br>
            <label>Alamat : </label>
             <label><?php echo $siswa->alamat ?></label>
            <br>
            <label>Nomor HP : </label>
             <label><?php echo $siswa->no_hp ?></label>
            <br>
            <label>Jurusan : </label>
             <label><?php echo $siswa->jurusan ?></label>
            <br>
            <label>Kelas : </label>
             <label><?php echo $siswa->kelas ?></label>
            <br>
        </div>
<?php } ?>