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
                    <h1 class="page-header">Data Jam Pelajaran</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <p>
            <?php
             include('tambah_jam.php') ;
             ?>
             </p>
             </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Jam Pelajaran
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jam Ke-</th>
                                            <th>Durasi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1; foreach($jam as $jam)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $jam->jam?></td>
                                            <td><?php echo $jam->durasi?></td>
                                            <td>
                                            <a href="<?php echo site_url('jadwal/edit/'.$jam->id_jam)?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></a>

                                            <?php
                                            include('delete_jam.php');
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
    
