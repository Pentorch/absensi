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
                    <h1 class="page-header">Data Semester</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <p>
            <?php
             include('tambah_sem.php') ;
             ?>
             </p>
             </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Semester
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Semester</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1; foreach($sem as $sem)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $sem->semester?></td>
                                            <td>
                                            <a href="<?php echo site_url('sem/edit/'.$sem->id_sem)?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></a>

                                            <?php
                                            include('delete_sem.php');
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
    
