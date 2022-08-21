<?php
echo validation_errors('<div class="alert alert-warning">','</div>');
echo form_open(site_url('user/edit/'.$user->id_user));
?>
<div class="row">
<div class="col-lg-12">
                    <h1 class="page-header">Edit User</h1>
                </div>
                <!-- /.col-lg-12 -->

            <div class="col-lg-8">
       <form role="form">
            <div class="form-group">
            <label for="disabledSelect">Username</label>
             <input class="form-control" id="disabledInput" placeholder="Username" name="username" value="<?php echo $user->username?>">
            </div>
            <div class="form-group">
            <label>Password</label>
             <input class="form-control" id="disabledInput" placeholder="Password" name="password" value="<?php echo $user->password?>">
            </div>
            <div class="form-group">
            <label>Level</label>
             <select class="form-control" name="level" id="disabledSelect" value="<?php echo $user->level ?>"">
                  <option value="admin">Admin</option>
                  <option value="wakil">Kepsek / Wakil</option>
                  <option value="piket">Guru Piket</option>
                  <option value="guru">Guru</option>
                  <option value="walas">Wali kelas</option>
             </select>
            </div>
            <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
            <input type="reset" name="reset" class="btn btn-default" value="Reset">
<?php
echo form_close();
?>