<body align="center">
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                    	Welcome,  <?php $i=1; foreach($nama as $siswa)
{
	 echo $siswa->nama;
	}
?>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<div class="col-xs-6">
<a style="color:#fa8564;" href="<?php echo site_url('homepage/profil_m/'.$this->session->userdata('username'))?>" class="btn btn-default btn-lg btn-block"><i class="fa fa-user fa-3x"></i><br>Profil</a>
</div>
<div class="col-xs-6">
<a style="color:#45cf95;" href="<?php echo site_url('homepage/dapel/'.$this->session->userdata('username'))?>" class="btn btn-default btn-lg btn-block"><i class="fa fa-list-alt fa-3x"></i><br>Daftar Pelajaran</a>
</div>
<div class="col-xs-6">
<a style="color:#AC75F0" href="<?php echo site_url('homepage/absen_saya/'.$this->session->userdata('username'))?>" class="btn btn-default btn-lg btn-block"><i class="fa fa-book fa-3x"></i><br>Absen Saya</a>
</div>
<div class="col-xs-6">
<a style="color:#fa8564" href="<?php echo site_url('homepage/help/'.$this->session->userdata('username'))?>" class="btn btn-default btn-lg btn-block"><i class="fa fa-h-square fa-3x"></i><br>HELP</a>
</div>
<div class="col-xs-12">
<a href="<?php echo site_url('login/keluar')?>" class="btn btn-default btn-lg btn-block"><i class="fa fa-arrow-left fa-3x"></i><br>Logout</a>
</div>

