<body align="center">

<div class="row">
<section class="content">
                    <div class="row">
<section class="content">
                    <div class="row">
                    	<p>Welcome,  <?php $i=1; foreach($nama as $siswa)
{
	 echo $siswa->nama;
	}
?></p>
<section class="content">
                    <div class="row">


                            <div class="col-xs-6">
                            <div class="stat">
                                <div class="stat-icon" >
                                    <a style="color:#fa8564;" href="<?php echo site_url('homepage/profil_m/'.$this->session->userdata('username'))?>"><i class="fa fa-user fa-3x stat-elem"></i>
                                </div>
                                <h5 class="stat-info">Profil</h5>
                            </div>
</div>
                        <div class="col-xs-6">
                            <div class="stat">
                                <div class="stat-icon" >
                                   <a style="color:#45cf95;" href="<?php echo site_url('homepage/dapel/'.$this->session->userdata('username'))?>"> <i class="fa fa-list-alt fa-3x stat-elem"></i>
                                </div>
                                <h5 class="stat-info">Daftar Pelajaran</h5>
                            </div>
</div>
                        <div class="col-xs-6">
                            <div class="stat">
                                <div class="stat-icon" >
                                   <a style="color:#AC75F0" href="<?php echo site_url('homepage/absen_saya/'.$this->session->userdata('username'))?>"> <i class="fa fa-book fa-3x stat-elem"></i>
                                </div>
                                <h5 class="stat-info">Absen Saya</h5>
                            </div>
                        </div>
<div class="col-xs-6">
                            <div class="stat">
                                <div class="stat-icon" >
                                   <a style="color:#fa8564" href="<?php echo site_url('homepage/help/'.$this->session->userdata('username'))?>"> <i class="fa fa-h-square fa-3x stat-elem"></i>
                                </div>
                                <h5 class="stat-info">HELP</h5>
                            </div>
                        </div>
<div class="col-xs-12">
                            <div class="stat">
                                <div class="stat-icon" >
                                    <a href="<?php echo site_url('login/keluar')?>"><i class="fa fa-arrow-left fa-3x stat-elem"></i>
                                </div>
                                <h5 class="stat-info">Logout</h5>
                            </div>
                        </div>
