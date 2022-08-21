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
                    <h1 class="page-header">Mata Pelajaran</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<p> <a href="<?php echo site_url('jadwal/tambah_mapel')?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-plus"></i> Tambah</a> </p>
<!-- /.row -->

<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
Data Mata Pelajaran
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="dataTable_wrapper">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
<th>No</th>
<th>Mata Pelajaran</th>
<th>Kelas</th>
<th>Jurusan</th>
<th>Jam Pelajaran</th>
<th>Guru</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach($mapel as $mapel)
{
?>
<tr>
<td><?php echo $i++ ?></td>
<td><?php echo $mapel->mapel ?></td>
<td><?php echo $mapel->kelas ?></td>
<td><?php echo $mapel->jurusan ?></td>
<td><?php echo $mapel->jam ?></td>
<td><?php echo $mapel->nama_guru ?></td>
<td>
<a href="<?php echo site_url('jadwal/edit_mapel/'.$mapel->id_mapel)?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></a>

<?php
include('delete_mapel.php');
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