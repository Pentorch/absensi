<?php
echo validation_errors('<div class="alert alert-warning">','</div>');
echo form_open_multipart(site_url('user/print/'));
?>
<!DOCTYPE html>
<html lang="en-us">
<body>
<img src="<?php echo base_url('asset/img/sintoga.png')?>" width="100" align="right"><img src="<?php echo base_url('asset/img/provinsi.png')?>" width="80" align="left"><h4 style="text-align: center;">PEMERINTAH PROVINSI SUMATERA BARAT <br>
DINAS PENDIDIKAN<br>
SEKOLAH MENEGAH KEJURUAN (SMK) NEGERI 1 SINTOGA<br>
www.smkn1sintoga.com</h4><img src="<?php echo base_url('asset/img/row.png')?>" width="760">
<h3 style="text-align: center;">Daftar Username dan Password Guru</h3>
<?php
$kolom = '3';
$chunk = array_chunk($user, $kolom); 
?>
<table border="2">
<?php
foreach ($chunk as $chunk) {
?>
  <tr> </tr>
  <?php
  foreach ($chunk as $user) { 
   ?>
   <th >Silahkan Login di<br>www.smkn1sintoga.com
   <br>--------------------------------------------
   <br>Nama : <?php echo $user->nama ?><br>
       Username : <?php echo $user->username ?><br>
       Password : <?php echo $user->password ?><br>
   
   </th>
   <?php
  } 
} 
 ?> </table> 
</body>
</html>