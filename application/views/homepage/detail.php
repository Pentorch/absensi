<body>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Detail Absen Siswa</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<?php
foreach($sd as $dt){
  ?>
<table>
  <tr>
  <th><img src="<?php echo base_url('asset/upload/img/'.$dt->foto)?>" width="100px" ></th>
  <th>&nbsp &nbsp &nbsp &nbsp</th>
  <th>
    <label>NIS : </label>
<label><?php echo $dt->nis;?></label>
<br>
<label>NISN : </label>
<label><?php echo $dt->nisn;?></label>
<br>
<label>Nama : </label>
<label><?php echo $dt->nama;?></label>
<br>
<label>Jurusan : </label>
<label><?php echo $dt->jurusan;?></label>
<br>
<label>Kelas : </label>
<label><?php echo $dt->kelas;?></label>
<br>
  </th>
</tr>
</table>


<?php } ?>
<div class="form-group">
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="dataTable_wrapper">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
<th>No</th>
<th>Absen</th>
<th>Tanggal</th>
<th>Jam Ke-</th>
<th>Mata Pelajaran</th>
<th>Keterangan</th>
</tr>
</thead>
<tbody>
  <?php $i=1; foreach($data as $absen)
{
?>
<tr>
<td><?php echo $i++ ?></td>
<td><?php if($absen->absen=='Alfa'){
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
<td><?php echo $absen->jam ?></td>
<td><?php echo $absen->mapel ?></td>
<td><?php echo $absen->ket ?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>

