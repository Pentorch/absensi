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
                    <h1 class="page-header">Data Absen Guru</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<div class="row">
<div class="col-lg-12">

<!-- /.panel-heading -->
<div class="panel-body">
  <div class="table-responsive">
<div class="dataTable_wrapper">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
<th>No</th>
<th>Nama Guru</th>
<th>Jam</th>
<th>Kelas</th>
<th>Jurusan</th>
<th>Mapel</th>
<th>Absen</th>
<th>Tanggal</th>
<th>Keterangan</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach($absen as $absen)
{
?>
<tr>
<td><?php echo $i++ ?></td>
<td><?php echo $absen->nama_guru ?></td>
<td><?php echo $absen->jam ?></td>
<td><?php echo $absen->kelas ?></td>
<td><?php echo $absen->jurusan ?></td>
<td><?php echo $absen->mapel ?></td>
<td>
<?php if($absen->absen=='Alfa'){
                        echo '<span class="badge bg-red">';
                        echo 'Alfa</span>';
                      }elseif ($absen->absen=='Hadir') {
                        echo '<span class="badge bg-light-blue">';
                        echo 'Hadir</span>';
                      }elseif($absen->absen=='Izin'){
                        echo '<span class="badge bg-green">';
                        echo 'Izin</span>';
                      }elseif($absen->absen=='Terlambat'){
                        echo '<span class="badge bg-red">';
                        echo 'Terlambat</span>';
                      }else{
                        echo '<span class="badge bg-yellow">';
                        echo 'Sakit</span>';
                      }
                    ?></td>
<td><?php echo $absen->tanggal ?></td>
<td><?php echo $absen->ket ?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>