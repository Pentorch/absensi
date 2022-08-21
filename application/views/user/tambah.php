<?php
echo validation_errors('<div class="alert alert-warning">','</div>');
//error upload file
if (isset($error)) {
    echo '<div class="alert alert-warning">';
    echo $error;
    echo '</div>';
}
echo form_open_multipart(site_url('user/tambah'));
?>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah User</h1>
                </div>
                <!-- /.col-lg-12 -->
            
            <div class="col-lg-8">
       <form role="form">
            <div class="form-group">
            <label>Nama Guru</label>
            <?php
            	$con = mysqli_connect("localhost","root","") or die("Koneksi gagal");
            	mysqli_select_db($con,"absenreal") or die("Database tidak bisa dibuka");
				$result = mysqli_query($con,"select * from guru");  
				$jsArray = "var prdName = new Array();\n";
				echo '
					<select class="form-control" name="nama" onchange="document.getElementById(\'prd_name\').value = prdName[this.value]">  
					<option name="nama">Pilih Nama Guru</option>';
					while ($row = mysqli_fetch_array($result)) {  
					echo '
						<option value="' . $row['nama_guru'] . '">' . $row['nama_guru'] . '</option>';  
						$jsArray .= "prdName['" . $row['nama_guru'] . "'] = '" . addslashes($row['nip']) . "';\n";
					  }
					echo '
					</select>'; 
				?> 
        
			</div>
            <div class="form-group">
            <label>Username</label>
             <input class="form-control" id="prd_name" placeholder="Username" name="username" value="<?php echo set_value('username')?>" required>
             <script type="text/javascript">  
				<?php echo $jsArray; ?>  
				</script>
            </div>
            <div class="form-group">
              <?php  
 function random($panjang_karakter)  
 {  
  $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';  
  $string = '';  
  for($i = 0; $i < $panjang_karakter; $i++) {  
   $pos = rand(0, strlen($karakter)-1);  
   $string .= $karakter{$pos};  
  }  
  return $string;  
 }  
 
 //tulisan PANJANG_KARAKTER dibawah ini anda bisa ganti dengan angka.
 ?>
            <label>Password</label>
             <input class="form-control" placeholder="Password" name="password" value="<?php echo random(5); ?>">
            </div>
              
            <div class="form-group">
            <label>Level</label>
             <select class="form-control" name="level">
                  <option value="admin">Admin</option>
                  <option value="wakil">Kepsek / Wakil</option>
                  <option value="piket">Guru Piket</option>
                  <option value="guru">Guru</option>
                  <option value="walas">Walas</option>
             </select>
            </div>
            <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
            <input type="reset" name="reset" class="btn btn-default" value="Reset">
<?php
echo form_close();
?>
