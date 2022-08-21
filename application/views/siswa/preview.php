<?php
echo validation_errors('<div class="alert alert-warning">','</div>');
echo form_open_multipart(site_url('siswa/preview/'.$siswa->nis));
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
	<link href="<?php echo base_url('asset/bower_components/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('asset/bower_components/metisMenu/dist/metisMenu.min.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('asset/dist/css/timeline.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('asset/dist/css/sb-admin-2.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('asset/bower_components/morrisjs/morris.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('asset/bower_components/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">
    <!-- DataTables CSS -->
    <link href="<?php echo base_url('asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')?>" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url('asset/bower_components/datatables-responsive/css/dataTables.responsive.css')?>" rel="stylesheet">

</head>
<body>
<a href="<?php echo site_url('siswa/print/'.$siswa->nis)?>" class="btn btn-info btn-sm" title="Print"><i class="fa fa-print"></i> PRINT</a><br>
<h3 style="text-align: center;">KETERANGAN TENTANG DATA DIRI PESERTA DIDIK</h3>
<table>
	<tr>
    <th>
	<td></td>
    <td></td>
    <td><b>1.</b></td>
    <td></td>
    <td><b>Nama Peserta Didik (Lengkap) </b></td> 
    <td></td>
    <td></td>
    <td><b>:</b></td> 
    <td></td>
    <td></td>
    <td><?php echo $siswa->nama ?></td>
    <td></td>
    </th>
	</tr>

    <tr>
	<td><b>2.	</b></td> 
    <td><b>		Nomor Induk Siswa Nasional </b></td> 
    <td><b>	:	</b></td> 
    <td><?php echo $siswa->nisn ?></td>
	</tr>
  	<tr>
	<td><b>3.	</b></td> 
    <td><b>		Tempat/Tanggal Lahir </b></td> 
    <td><b>	:	</b></td> 
    <td><?php echo $siswa->ttl ?></td>
	</tr>
	<tr>
	<td><b>4.	</b></td> 
    <td><b>		Jenis Kelamin </b></td> 
    <td><b>	:	</b></td> 
    <td><?php echo $siswa->jk ?></td>
	</tr>
	<tr>
	<td><b>5.	</b></td> 
    <td><b>		Agama </b></td> 
    <td><b>	:	</b></td> 
    <td><?php echo $siswa->agama ?></td>
	</tr>
	<tr>
	<td><b>6.	</b></td> 
    <td><b>		Status Dalam Keluarga </b></td> 
    <td><b>	:	</b></td> 
    <td><?php echo $siswa->status ?></td>
	</tr>
	<tr>
	<td><b>7.	</b></td> 
    <td><b>		Anak Ke- </b></td> 
    <td><b>	:	</b></td> 
    <td><?php echo $siswa->anak_ke ?></td>
	</tr>
	<tr>
	<td><b>8.	</b></td> 
    <td><b>		Alamat Peserta Didik</b></td> 
    <td><b>	:	</b></td> 
    <td><?php echo $siswa->alamat ?></td>
	</tr>
	<tr>
	<td><b>9.	</b></td> 
    <td><b>		Nomor Telephon Rumah </b></td> 
    <td><b>	:	</b></td> 
    <td><?php echo $siswa->no_hp ?></td>
	</tr>
	<tr>
	<td><b>10.	</b></td> 
    <td><b>		Sekolah Asal </b></td> 
    <td><b>	:	</b></td> 
    <td><?php echo $siswa->asal_sklh ?></td>
	</tr>

</table>
</body>
</html>