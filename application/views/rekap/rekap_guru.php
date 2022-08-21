<body> 
<center><H1>Rekap Absen Guru</H1></center>

<form action="<?php echo base_url('rekap/tampil');?>" action="GET">
<div class="row">
    <div class="col-xs-6">
    <div class="form-group" >
        <div class="col-xs-6">
	            <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
	                <input class="form-control" type="text" name="cari" id="tanggal">
	                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
        </div>
    <div class="form-group" >
    <input type="submit" name="submit" class="btn btn-primary" value="TAMPIL">
    </div>
</div>
    <!-- /.col-lg-6 -->
</div>
<!-- /.row -->
 </form>
 
 
 
   
