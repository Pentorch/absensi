<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SMKN 1 SINTOGA</title>
    <link rel="icon" type="image/png" href="<?php echo site_url('asset/img/sintoga.png')?>">
    <link href="<?php echo site_url('asset/bower_components/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo site_url('asset/bower_components/metisMenu/dist/metisMenu.min.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo site_url('asset/dist/css/timeline.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo site_url('asset/dist/css/sb-admin-2.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo site_url('asset/bower_components/morrisjs/morris.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo site_url('asset/bower_components/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">
    <!-- DataTables CSS -->
    <link href="<?php echo site_url('asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')?>" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo site_url('asset/bower_components/datatables-responsive/css/dataTables.responsive.css')?>" rel="stylesheet">


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
<script type="text/javascript" src="<?php echo site_url('asset/tinymce/tinymce.min.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('asset/tinymce/plugin/eqneditor/plugin.min.js')?>"></script>
<!-- Konfigurasi Standar -->

</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" align="center"><img src="<?php echo site_url('asset/img/sintoga.png') ?> "></h3>
                        <h3 class="panel-title" align="center" >Sistem Informasi Absensi SMKN 1 SINTOGA</h3>
                        
                        <?php
                                  if($this->session->flashdata('msg')){
                                      echo '<div class="alert alert-danger">';
                                      echo $this->session->flashdata('msg');
                                      echo '</div>';
                                  }
                            ?>
                        
<?php echo form_open('login/ceklogin')?>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="username" name="username" type="username" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="login" class="btn btn-success btn-block btn-flat">Login</button>
                            </fieldset>
                            <?php echo form_close()?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="<?php echo site_url('asset/bower_components/jquery/dist/jquery.min.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo site_url('asset/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo site_url('asset/bower_components/metisMenu/dist/metisMenu.min.js')?>"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo site_url('asset/bower_components/datatables/media/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo site_url('asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo site_url('asset/dist/js/sb-admin-2.js')?>"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

</body>

</html>
