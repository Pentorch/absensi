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
                    <h1 class="page-header">Jadwal Pelajaran<br>
<?php echo $jurusan->jurusan?> &nbsp
<?php echo $kelas->kelas; ?>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<!-- /.panel-heading -->
<div class="panel-body">
<div class="table-responsive">
<div class="dataTable_wrapper">
<table class="table table-striped table-bordered table-hover" >
<thead>
<tr>
<th>No</th>
<th>Hari</th>
<th>Mata Pelajaran</th>
<th>Jam Ke-</th>
<th>Guru</th>
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
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>