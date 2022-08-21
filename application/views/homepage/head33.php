<?php 

//jika session username belum dibuat, atau session username kosong
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    //redirect ke halaman login
    redirect('login');
}
?>
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


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                <a class="navbar-brand" href="<?php echo site_url('homepage/guru')?>">SMKN 1 Sintoga</a>
            </div>      
            </div>
            <!-- /.navbar-top-links -->
<ul class="nav navbar-right">
<li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?php echo $this->session->userdata('username')?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo site_url('homepage/edit_guru/'.$this->session->userdata('id_user'))?>"><i class="fa fa-user fa-fw"></i>Ganti Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('login/keluar')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
                    <!-- /.dropdown-user -->
                </li>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="<?php echo site_url('guru/lihat_gr/'.$this->session->userdata('id_guru'))?>"><i class="fa fa-user fa-fw"></i> Profil</a>
                        </li>
                            <li>
                                <a href="<?php echo site_url('absen/tampil_guru') ?>"><i class="fa  fa-group fa-fw"></i> Absen Siswa</a>
                            </li>
                        <li>
                                <a href="<?php echo site_url('jadwal/tampil') ?>"><i class="fa fa-calendar fa-fw"></i> Daftar Jadwal</a>
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
