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
                    <h1 class="page-header">Data Siswa</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<p> <a href="<?php echo site_url('siswa/tambah_siswa')?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-plus"></i> Tambah</a> </p>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
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
include('detail.php');
?>
<a href="<?php echo site_url('siswa/edit_siswa/'.$siswa->nis)?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></a>

<?php
include('delete.php');
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