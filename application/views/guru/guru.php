<?php
echo validation_errors('<div class="alert alert-warning">','</div>');
echo form_open_multipart(site_url('guru/lihat_gr/'.$guru->nip));
?>

<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Profil User</h1>
                
                <!-- /.col-lg-12 -->
<!-- <p> <a href="<?php echo site_url('guru/edit_gr/'.$guru->nip)?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-plus"></i> Edit</a> </p> -->
<!-- /.row -->
<div class="col-lg-8">
       <form role="form">
           <div class="form-group">
             <img src="<?php echo base_url('asset/upload/img/'.$guru->foto)?>" width="100px" >
            <br>
            <label>Nama : </label>
             <label><?php echo $guru->nama_guru ?></label>
            <br>
            <label>NIP : </label>
             <label><?php echo $guru->nip ?></label>
            <br>
            <label>Tempat : </label>
            <label><?php echo $guru->tempat ?></label>
            <br>
            <label>Tanggal Lahir : </label>
            <label><?php echo $guru->tanggal ?></label>
            <br>
            <label>Alamat : </label>
             <label><?php echo $guru->alamat ?></label>
            <br>
            <label>Nomor HP : </label>
             <label><?php echo $guru->no_hp ?></label>
            <br>
            <label>Jabatan : </label>
             <label><?php echo $guru->jabatan ?></label>
            <br>
            <label>Bidang Studi : </label>
             <label><?php echo $guru->bid_studi ?></label>
            <br>
        </div>
