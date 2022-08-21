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
                    <h1 class="page-header">Data Guru</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<p> <a href="<?php echo site_url('guru/tambah')?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-plus"></i> Tambah</a> </p>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
Data Guru
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="dataTable_wrapper">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
<th>No</th>
<th>Foto</th>
<th>Nama Guru</th>
<th>NIP / ID Guru</th>
<th>Jabatan</th>
<th>Bidang Studi</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach($guru as $guru)
{
?>
<tr>
<td><?php echo $i++ ?></td>
<td><img src="<?php echo base_url('asset/upload/img/'.$guru->foto) ?> " width="60"></td>
<td><?php echo $guru->nama_guru ?></td>
<td><?php echo $guru->nip ?></td>
<td><?php echo $guru->jabatan ?></td>
<td><?php echo $guru->bid_studi ?></td>
<td>
<?php
include('detail_guru.php');
?>
<a href="<?php echo site_url('guru/edit/'.$guru->id_guru)?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></a>

<?php
include('delete_guru.php');
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