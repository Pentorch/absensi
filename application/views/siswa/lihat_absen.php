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
                    <h1 class="page-header">Data Absen Siswa</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<div class="row">
<div class="col-lg-12">

<!-- /.panel-heading -->
<div class="panel-body">
<div class="dataTable_wrapper">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
<th>No</th>
<th>Nama Siswa</th>
<th>Kelas</th>
<th>Jurusan</th>
<th>Absen</th>
<th>Tanggal</th>
<th>Guru</th>
<th>Keterangan</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach($absen as $absen)
{
?>
<tr>
<td><?php echo $i++ ?></td>
<td><?php echo $absen->nama ?></td>
<td><?php echo $absen->kelas ?></td>
<td><?php echo $absen->jurusan ?></td>
<td><?php echo $absen->absen ?></td>
<td><?php echo $absen->tanggal ?></td>
<td><?php echo $absen->nama_guru ?></td>
<td><?php echo $absen->ket ?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>