<?php
echo validation_errors('<div class="alert alert-warning">','</div>');
                                  if($this->session->flashdata('Sukses')){
                                      echo '<div class="alert alert-danger">';
                                      echo $this->session->flashdata('Sukses');
                                      echo '</div>';
                                  } 
echo form_open(site_url('homepage/edit_guru/'.$this->session->id_user));
?>
<div class="row">
<div class="col-lg-12">
                    <h1 class="page-header">Edit User</h1>
                </div>
                <!-- /.col-lg-12 -->

            <div class="col-lg-8">
       <form role="form">
            <div class="form-group">
             <input name="username" value="<?php echo $this->session->userdata('username')?>" hidden>
            </div>
            <div class="form-group">
            <label>Password</label>
             <input class="form-control" placeholder="Password" name="password" value="<?php echo $this->session->userdata('password')?>">
            </div>
            <div class="form-group">
                 <input hidden name="level" value="<?php echo $this->session->userdata('level')?>">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
            <input type="reset" name="reset" class="btn btn-default" value="Reset">
<?php
echo form_close();
?>