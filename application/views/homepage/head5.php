<!DOCTYPE html>
<html lang="en">

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
   
</style>
<script type="text/javascript" src="<?php echo base_url('asset/tinymce/tinymce.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('asset/tinymce/plugin/eqneditor/plugin.min.js')?>"></script>
<!-- Konfigurasi Standar -->
<script type="text/javascript">
tinymce.init({         
        
        plugins: [
"eqneditor advlist autolink lists link image charmap print preview anchor",
"searchreplace visualblocks code fullscreen",
"insertdatetime media table contextmenu paste" ],
toolbar: "undo redo | eqneditor link image | styleselect | bold italic | bullist numlist outdent indent ",
selector : "textarea#article"
    });
</script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="<?php echo base_url('asset/img/sintoga.png')?>" width="50" align="left"> <a class="navbar-brand">SMKN 1 Sintoga</a>
            </div>      
            </div>
            <!-- /.navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                    <a class="navbar-brand" href="<?php echo site_url('beranda')?>"><i class="fa fa-home fa-fw"></i>Home</a>
                    <a class="navbar-brand" href="#"><i class="fa fa-university fa-fw"></i> Profil Sekolah</a>
                    <a class="navbar-brand" href="<?php echo site_url('login')?>"><i class="fa fa-user fa-fw"></i>Masuk</a>
                    <!-- /.dropdown-user -->
              </ul>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <form action="<?php echo base_url('beranda/detail');?>" action="GET">
                            <div class="form-group" >
                        <li class="sidebar-search">
                            <p>Untuk melihat absensi kehadiran siswa ketikkan NISN atau NIS di kolom pencarian dibawah ini</p>
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" name="cari" id="key" placeholder="Search...">
                                <span class="input-group-btn">
                                    <div class="form-group" >
                                <input type="submit" class="btn btn-default" value="Cari">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                    </ul>
                    <ul>
                        <li >
                            <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
                    <?php
                        echo $this->calendar->generate();
                    ?>
                </div>
                </li>
                    </ul>
            </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
