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
    <link href="<?php echo base_url('asset/css/ionicons.min.css" rel="stylesheet" type="text/css')?>" />
    <link href="<?php echo base_url('asset/css/font-awesome.min.css" rel="stylesheet" type="text/css')?>" />
    <link href="<?php echo base_url('asset/css/style.css" rel="stylesheet" type="text/css')?>" />
    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url('asset/bower_components/datatables-responsive/css/dataTables.responsive.css')?>" rel="stylesheet">

    <!-- Datepicker CSS -->
    <link href="<?php echo base_url('asset/datepicker/css/datepicker.css')?>" rel="stylesheet" type="text/css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>asset/admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>asset/admin/dist/css/skins/_all-skins.min.css">



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