<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $this->config->item('nama_aplikasi_full');?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php echo $this->config->item('deskripsi');?>">
<meta name="author" content="deddy rusdiansyah">
<meta name="robots" content="index, follow">
<meta name="keywords" content="<?php echo $this->config->item('keyword');?>">
<meta http-equiv="Copyright" content="<?php echo $this->config->item('nama_instansi');?>">
<meta http-equiv="imagetoolbar" content="no">
<meta name="language" content="Indonesia">
<meta name="revisit-after" content="7">
<meta name="webcrawlers" content="all">
<meta name="rating" content="general">
<meta name="spiders" content="all">

<link rel="shortcut icon" href="<?php echo base_url(); ?>asset/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo base_url(); ?>asset/favicon.ico" type="image/x-icon">
<link href="<?php echo base_url(); ?>asset/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>asset/css/bootstrap-responsive.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>asset/css/docs.css" rel="stylesheet">
<!-- Custom Styles -->
<link href="<?php echo base_url(); ?>asset/css/bootstrap-notify.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>asset/css/styles/alert-notification-animations.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/colorbox/colorbox.css" />
<link type="text/css" href="<?php echo base_url(); ?>asset/css/custom-theme/jquery-ui-1.10.0.custom.css" rel="stylesheet" />
<link type="text/css" href="<?php echo base_url(); ?>asset/css/font-awesome-ie7.min.css" rel="stylesheet" />
<link type="text/css" href="<?php echo base_url(); ?>asset/css/font-awesome.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>asset/js/google-code-prettify/prettify.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />

<script src="<?php echo base_url(); ?>asset/js/jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-ui-1.10.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/bootstrap-tab.js"></script>
<script src="<?php echo base_url(); ?>asset/js/bootstrap-tooltip.js"></script>
<script src="<?php echo base_url(); ?>asset/js/application.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/clock.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/bootstrap-tooltip.js"></script>
<script src="<?php echo base_url(); ?>asset/colorbox/jquery.colorbox.js"></script>
<script src="<?php echo base_url(); ?>asset/js/app.js"></script>
<script src="<?php echo base_url(); ?>asset/js/ui.datepicker-id.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.newsTicker-2.2.js"></script>
<script src="<?php echo base_url();?>asset/js/docs.js" type="text/javascript"></script>
<!--Polling-->
<script type="text/javascript" src="<?php echo base_url();?>asset/js/highcharts.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/exporting.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.totemticker.js"></script>
<!--notif-->
<script src="<?php echo base_url(); ?>asset/js/bootstrap-notify.js"></script>
<!--bread-->
<link href="<?php echo base_url();?>asset/css/breadcrumb.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
$(document).ready(function(){  
  $('.carousel').carousel({
  	interval: 3000
  }); 
  $().newsTicker({
  		newsList: ".ticker",
 		startDelay: 10,
 		tickerRate: 80,
		loopDelay: 5000,
 		controls: false,
 		ownControls: false,
 		stopOnHover: false,
 		resumeOffHover: true
	});
});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$("area[rel^='prettyPhoto']").prettyPhoto();
		
		$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'pp_default',slideshow:10000, autoplay_slideshow: true});
		$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});

		$("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
			custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
			changepicturecallback: function(){ initialize(); }
		});

		$("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
			custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
			changepicturecallback: function(){ _bsap.exec(); }
		});
	});
</script>
<style type="text/css">
.table tr th {
	text-align:center;
}
.error {
  color: red;
  line-height: 10px;
  font-size: 11px;
}
</style>
  </head>
  <body onLoad="goforit()">
  <div class='notifications bottom-left'></div>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <span class="span6" style="padding:15px 2px; color:#fff;">
          <?php echo $this->load->view('alert');?>
          </span>
          <div class="nav-collapse collapse">
            <div class="btn-group pull-right">
			  <button class="btn"><i class="icon-time icon-white"></i> <span id="clock"></span></button>
              <a href="<?php echo base_url();?>index.php/administrator/login">
              <button class="btn"><i class="icon-user icon-white"></i></button>
              </a>
			</div>
          </div><!--/.nav-collapse -->
        </div>
      </div>
   
   <div class="row">
        <div class="alert alert-info" style="width:100%;">
        	<div class="container">
        	<div class="pull-left">
          <img src="<?php echo base_url();?>asset/images/logo_iain.png" width="52" height="42" style="padding:7px;">
          </div>
          <h4 class="alert-heading" style="color:#fff;text-shadow: 0.1em 0.1em 0.05em #333; line-height:15px;margin-top:10px;">
		  <?php echo $this->config->item('nama_aplikasi_full');?></h4>
          <h3 class="alert-heading" style="color:#fff;text-shadow: 0.1em 0.1em 0.05em #333; line-height:15px;">
		  <?php echo $this->config->item('nama_instansi');?></h3>
        </div>
        </div>
  </div>
   </div>
   <div style="padding:40px;"></div>
   <div class="container">
   <div class="span12 bs-docs-sidenav-header">
      <div class="row span4">
          <div class="progress progress-striped active">
          <div class="bar" style="width: 70%;">Pendaftaran</div>
          <div class="bar bar-danger" style="width: 30%;">17 Juni  s.d. 26 Juli</div>
          </div>
      </div>
      <div class="row span4">
        <div class="progress progress-striped active">
        <div class="bar" style="width: 60%;">Ujian dan Wawancara</div>
        <div class="bar bar-danger" style="width: 40%;">30 Juli s.d. 1 Agustus</div>
        </div>
      </div>
      <div class="row span3">
        <div class="progress progress-striped active">
        <div class="bar" style="width: 60%;">Pengumuman </div>
        <div class="bar bar-danger" style="width: 40%;">16 Agustus</div>
        </div>
      </div>
  </div>
  </div>

    <div class="container">
      <div class="row">
      <div class="span3 kotak">
        <div class="bs-docs-sidenav-kotak" >
        <div class="error">
        <?php echo validation_errors(); ?>
        <?php if($this->session->flashdata('result_login')) { ?>
        <?php echo $this->session->flashdata('result_login'); ?>
        <?php } ?>
        </div>
        <form method="POST" action="<?php echo base_url();?>index.php/home/login">
        <fieldset>
        <label>NISN</label>
        <input type="text" name="noform" placeholder="User ID">
        <label>PIN / Kode Akses</label>
        <input type="password" name="kodeakses" placeholder="Kode Akses">
        <button type="submit" class="btn btn-info"><i class="icon-ok-sign"></i> Login</button>
        </fieldset>
        </form>
        </div>
       <ul class="nav nav-list bs-docs-sidenav">
          <li><a href="<?php echo base_url();?>"><i class="icon-home"></i> <i class="icon-chevron-right"></i> Home</a></li>
          <li><a href="<?php echo base_url();?>index.php/home/alur"><i class="icon-road"></i> <i class="icon-chevron-right"></i> Alur Pendaftaran</a></li>
          <li><a href="<?php echo base_url();?>index.php/home/panduan"><i class="icon-book"></i> <i class="icon-chevron-right"></i> Fasilitas</a></li>
          <li><a href="<?php echo base_url();?>index.php/home/prodi"><i class="icon-th-list"></i> <i class="icon-chevron-right"></i> Program Studi</a></li>
          <li><a href="<?php echo base_url();?>index.php/home/grafik_survey"><i class="icon-signal"></i> <i class="icon-chevron-right"></i> Grafik Survey</a></li>
          <li><a href="<?php echo base_url();?>index.php/home/pengumuman"><i class="icon-check"></i> <i class="icon-chevron-right"></i> Pengumuman Kelulusan</a></li>
          <li><a href="<?php echo base_url();?>index.php/home/panitia"><i class="icon-user"></i> <i class="icon-chevron-right"></i> Kontak Panitia</a></li>
        </ul>
        <div class="bs-docs-sidenav-kotak">
        <h5>Pengunjung</h5>
            <ul class="unstyled">
              <?php 
        $total = $this->psb_model->pengunjung();
        $online = $this->psb_model->online();
        $hari_ini = $this->psb_model->pengunjung_hari_ini();
        ?>
              <li><img src="<?php echo base_url();?>asset/images/counter/hariini.png"> Pengunjung Hari ini : <b><?php echo $hari_ini;?> </b></li>
                <li><img src="<?php echo base_url();?>asset/images/counter/total.png"> Total Pengunjung : <b><?php echo $total;?> </b></li>
                <li><img src="<?php echo base_url();?>asset/images/counter/online.png"> Pengunjung Online : <b><?php echo $online;?></b></li>
                <li><i class="icon-globe"></i> Browser : <?php echo $this->agent->browser();?></li>
                <li><i class="icon-qrcode"></i> OS : <?php echo $this->agent->platform();?></li>
                <li><i class="icon-eye-open"></i> IP Address : <?php echo $this->input->ip_address();?></li>
      </ul>                
    </div>
    </div>
		
    <div class="span9 bs-docs-sidenav-content">
			 <?php echo $content;?>
    </div>
		
    </div>
    </div>
    </div> <!-- /container -->
     
<footer class="footer">
	<div class="footer-inner">	
	<div class="container">
          <div class="span12">
            <?php echo $this->config->item('credit_aplikasi');?> | Programmer : Deddy Rusdiansyah<br>
            <?php echo $this->config->item('alamat_instansi');?>            
          </div>      
        </div>
    </div>
</footer>    
  </body>
</html>