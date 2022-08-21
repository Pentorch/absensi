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
                    <h1 class="page-header">Daftar Jadwal</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<p> <a href="<?php echo site_url('jadwal/tambah_jadwal')?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-plus"></i> Tambah</a> </p>
<!-- /.row -->

<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
Daftar Jadwal
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="table-responsive">
<div class="dataTable_wrapper">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
<th>No</th>
<th>Hari</th>
<th>Mata Pelajaran</th>
<th>Jam Pelajaran</th>
<th>Guru</th>
<th>Kelas</th>
<th>Jurusan</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach($jadwal as $jadwal)
{
?>
<tr>
<td><?php echo $i++ ?></td>
<td><?php echo $jadwal->hari ?></td>
<td><?php echo $jadwal->mapel ?></td>
<td><?php echo $jadwal->jam ?></td>
<td><?php echo $jadwal->nama_guru ?></td>
<td><?php echo $jadwal->kelas ?></td>
<td><?php echo $jadwal->jurusan?></td>
<td>
<a href="<?php echo site_url('jadwal/edit_jadwal/'.$jadwal->id_jadwal)?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></a>

<?php
include('delete_jadwal.php');
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