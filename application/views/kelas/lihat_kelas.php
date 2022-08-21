<?php
//cetak notifikasi

if($this->session->flashdata('sukses')) {
   echo '<div class="alert alert-success">';
   echo $this->session->flashdata('sukses');
   echo '</div>';
}
?>

<body>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Kelas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<p> <a href="<?php echo site_url('kelas/tambah')?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-plus"></i> Tambah</a> </p>
<!-- /.row -->

<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
Data Kelas
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="dataTable_wrapper">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
<th>No</th>
<th>Nama Kelas</th>
<th>Jurusan</th>
<th>Wali Kelas</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach($kelas as $kelas)
{
?>
<tr>
<td><?php echo $i++ ?></td>
<td><?php echo $kelas->kelas ?></td>
<td><?php echo $kelas->jurusan ?></td>
<td><?php echo $kelas->nama_guru ?></td>
<td>
<a href="<?php echo site_url('kelas/edit/'.$kelas->id_kelas)?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></a>

<?php
include('delete_kelas.php');
?>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>