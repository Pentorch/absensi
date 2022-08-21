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
                    <h1 class="page-header">Data Absen Siswa</h1>
                </div>

<div class="row">
<div class="col-xs-12">
<div class="panel panel-default">
<div class="panel-heading">
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="table-responsive">
<div class="dataTable_wrapper">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
<th>No</th>
<th>NIS</th>
<th>Nama Siswa</th>
<th>Kelas</th>
<th>Jurusan</th>
<th>Absen </th>
<th>Tanggal</th>
<th>Mata Pelajaran</th>
<th>Keterangan</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach($absen as $absen)
{
?>
<tr>
<td><?php echo $i++ ?></td>
<td><?php echo $absen->nis ?></td>
<td><?php echo $absen->nama ?></td>
<td><?php echo $absen->kelas ?></td>
<td><?php echo $absen->jurusan ?></td>
<td><?php echo $absen->absen ?></td>
<td><?php echo $absen->tanggal ?></td>
<td><?php echo $absen->mapel ?></td>
<td><?php echo $absen->ket ?></td>
<td>
<a href="<?php echo site_url('absen/edit2/'.$absen->id_absen)?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
<?php
include('delete_absen.php');
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