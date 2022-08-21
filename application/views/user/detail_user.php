<?php
echo validation_errors('<div class="alert alert-warning">','</div>');
echo form_open(site_url('user/detail/'.$user->username));

?>
<div class="row">
<div class="col-lg-12">
                    <h1 class="page-header">Profil User</h1>
                </div>
                <!-- /.col-lg-12 -->

            <div class="col-lg-8">
       <form role="form">
            <div class="form-group">
            <label>Username</label>
             <input class="form-control" placeholder="Username" name="username" value="<?php echo $user->username ?>">
            </div>
            <div class="form-group">
            <label>Password</label>
             <input class="form-control" placeholder="Password" name="password" value="<?php echo $user->password ?>">
            </div>
            <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
            <input type="reset" name="reset" class="btn btn-default" value="Reset">
<?php
echo form_close();
?>