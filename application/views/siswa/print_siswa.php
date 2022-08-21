<?php
echo validation_errors('<div class="alert alert-warning">','</div>');
echo form_open_multipart(site_url('siswa/print/'.$siswa->nis));
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
</head>
<body>
<h3 style="text-align: center;">KETERANGAN TENTANG DATA DIRI PESERTA DIDIK</h3>
<table>
	<tr>
    <td></td>
    <td><b>1.</b></td>
    <td><b>Nama Peserta Didik (Lengkap) </b></td> 
    <td><b>:</b></td> 
    <td><?php echo $siswa->nama ?></td>
    <td></td>
	</tr>
    <tr>
    <td></td>
	<td><b>2.</b></td> 
    <td><b>Nomor Induk Siswa Nasional </b></td> 
    <td><b>	:</b></td> 
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