<?php
//cetak notifikasi

if($this->session->flashdata('sukses')) {
   echo '<div class="alert alert-success">';
   echo $this->session->flashdata('sukses');
   echo '</div>';
}
?>

<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <p> <a href="<?php echo site_url('user/tambah')?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-plus"></i> Tambah </a>
            <a href="<?php echo base_url('user/preview')?>" class="btn btn-success btn-sm" title="Edit"> Print </a> </p>
             </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            User
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NAMA</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Level</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1; foreach($user as $user)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $user->nama ?></td>
                                            <td><?php echo $user->username ?></td>
                                            <td><?php echo $user->password ?></td>
                                            <td><?php echo $user->level ?></td>
                                            <td>
                                            <a href="<?php echo site_url('user/edit/'.$user->id_user)?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></a>

                                            <?php
                                            include('delete_user.php');
                                            ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    
