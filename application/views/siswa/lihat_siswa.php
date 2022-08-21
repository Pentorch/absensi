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
                <div class="col-xs-12">
                    <h1 class="page-header">Data Siswa</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<p> <a href="<?php echo site_url('siswa/tambah')?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-plus"></i> Tambah</a> </p>
<!-- /.row -->
<div class="row">
<div class="col-xs-12">
<div class="panel panel-default">
<div class="panel-heading">
Data Siswa
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="dataTable_wrapper">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
<th>No</th>
<th>Foto</th>
<th>Nama Siswa</th>
<th>Kelas</th>
<th>Jurusan</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach($siswa as $siswa)
{
?>
<tr>
<td><?php echo $i++ ?></td>
<td><img src="<?php echo base_url('asset/upload/img/'.$siswa->foto) ?> " width="60"></td>
<td><?php echo $siswa->nama ?></td>
<td><?php echo $siswa->kelas ?></td>
<td><?php echo $siswa->jurusan ?></td>
<td>
<?php
include('detail_siswa.php');
?>
<a href="<?php echo site_url('siswa/edit/'.$siswa->nis)?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
<?php
include('delete_siswa.php');
?>
<a href="<?php echo site_url('siswa/preview/'.$siswa->nis)?>" class="btn btn-info btn-sm" title="Print"><i class="fa fa-print"></i> PRINT</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>