<?php
echo validation_errors('<div class="alert alert-warning">','</div>');
echo form_open_multipart(site_url('user/print/'));
?>
<!DOCTYPE html>
<html lang="en-us">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SMKN 1 SINTOGA</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('asset/img/sintoga.png')?>">
    <link href="<?php echo base_url('asset/bower_components/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('asset/bower_components/metisMenu/dist/metisMenu.min.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('asset/dist/css/timeline.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('asset/dist/css/sb-admin-2.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('asset/bower_components/morrisjs/morris.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('asset/bower_components/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">
    <!-- DataTables CSS -->
    <link href="<?php echo base_url('asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')?>" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url('asset/bower_components/datatables-responsive/css/dataTables.responsive.css')?>" rel="stylesheet">

    <!-- Datepicker CSS -->
    <link href="<?php echo base_url('asset/datepicker/css/datepicker.css')?>" rel="stylesheet" type="text/css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>asset/admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>asset/admin/dist/css/skins/_all-skins.min.css">


<style type="text/css">
    .navbar-inverse{
        background-color: #7de2fb;
    }
    .navbar-brand{
        color: #fff;
        
    }
</style>
<script type="text/javascript" src="<?php echo base_url('asset/tinymce/tinymce.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('asset/tinymce/plugin/eqneditor/plugin.min.js')?>"></script>
<!-- Konfigurasi Standar -->
<body>
  <div class="col-lg-7">
<img src="<?php echo base_url('asset/img/sintoga.png')?>" width="100" align="right"><img src="<?php echo base_url('asset/img/provinsi.png')?>" width="80" align="left"><h4 style="text-align: center;">PEMERINTAH PROVINSI SUMATERA BARAT <br>
DINAS PENDIDIKAN<br>
SEKOLAH MENEGAH KEJURUAN (SMK) NEGERI 1 SINTOGA<br>
www.smkn1sintoga.com</h4><img src="<?php echo base_url('asset/img/row.png')?>" width="760">
<h3 style="text-align: center;">Daftar Username dan Password Guru</h3>


<?php
$kolom = '3';
$chunk = array_chunk($user, $kolom); 
?>
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" border="2" >
<?php 
foreach ($chunk as $chunk) {
?>
  <tr> </tr>
  <?php
  foreach ($chunk as $user) { 
   ?>
   <th >Silahkan Login di<br>www.smkn1sintoga.com
   <br>--------------------------------------------
   <br>Nama : <?php echo $user->nama ?><br>
       Username : <?php echo $user->username ?><br>
       Password : <?php echo $user->password ?><br>
   
   </th>
   <?php
  }
} 
 ?>
</table> 
</div>
</div>              
</body>
</html>