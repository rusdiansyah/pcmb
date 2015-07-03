<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Halaman Administrator</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="index, follow">
<meta http-equiv="Copyright" content="Deddy Rusdiansyah">
<meta name="author" content="Deddy Rusdiansyah">
<meta http-equiv="imagetoolbar" content="no">
<meta name="language" content="Indonesia">
<meta name="revisit-after" content="7">
<meta name="webcrawlers" content="all">
<meta name="rating" content="general">
<meta name="spiders" content="all">
<link href="<?php echo base_url();?>admin/css/fonts/stylesheet.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/css/themes/cupertino/easyui.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/css/themes/icon.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/smoothness/jquery-ui-1.7.2.custom.css">

<script type="text/javascript" src="<?php echo base_url();?>admin/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>admin/js/clock.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>admin/js/jquery.easyui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>admin/js/app.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>admin/js/jquery.price_format.1.7.js"></script>
<!--datepicker-->
<script type="text/javascript" src="<?php echo base_url(); ?>admin/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>admin/js/ui.datepicker-id.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>admin/js/ui.datepicker.js"></script>
<!--Polling-->
<script type="text/javascript" src="<?php echo base_url();?>admin/js/highcharts.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>admin/js/exporting.js"></script>

<!-- notifikasi -->
<script type="text/javascript" src="<?php echo base_url();?>admin/js/notifikasi.js"></script>

<script type="text/javascript">
$(function() {
	$("#dataTable tr:even").addClass("stripe1");
	$("#dataTable tr:odd").addClass("stripe2");
	$("#dataTable tr").hover(
		function() {
			$(this).toggleClass("highlight");
		},
		function() {
			$(this).toggleClass("highlight");
		}
	);
});
</script>
<style type="text/css">
body {
	background: #fff;
	color: #000;
	font-size: 11px;
	padding: 0 0 0px;
	font: 13px/20px "TitilliumText14L250wt","Helvetica Neue", Helvetica, Arial, sans-serif; 
	background-image:url(<?php echo base_url();?>admin/img/bg_dotted.png);
}
a {
	text-decoration:none;
	color:#000;
}
</style>
</head>
<body onLoad="goforit()" class="easyui-layout">
<div class="atas" data-options="region:'north',border:false" style="height:105px;padding:0">
<div class="header" style="height:70px;background:white;padding:2px;margin:0;">	
  <div style="float:left; padding:5px; margin:0px;">
  <img src='<?php echo base_url();?>asset/images/logo_iain.png' style="padding:0; margin:0;" width="70" height="55">
  </div>
  <div class="judul" style="float:left; line-height:3px; margin-top:10px; margin-left:5px;">
  <h1><?php echo $this->config->item('nama_instansi');?></h1>
  <p><?php echo $this->config->item('alamat_instansi');?></p>
  </div>
  <div style="float:right; line-height:5px; text-align:center;margin-top:10px;">
  <h1><?php echo $this->config->item('nama_aplikasi_pendek');?></h1>
  </div>
</div>	
  <div class="panel-header" fit="true" style="height:21px;padding-top:1px;padding-right:20px">
    <div style="float:left;">
    <a href="<?php echo base_url();?>index.php/home" class="easyui-linkbutton" data-options="plain:true" iconCls="icon-home">Home</a>
    <a href="<?php echo base_url();?>index.php/administrator/login/logout" class="easyui-linkbutton" data-options="plain:true" iconCls="icon-logout">Logout</a>
    </div>
    <div style="float:right; padding-top:5px;">
    <?php echo $this->session->userdata('username');?> &rarr;
    <span id="clock"></span>		
    </div>
  </div>    
</div>  
  <div data-options="region:'west',split:true,title:'Menu Utama',iconCls:'icon-menu'" style="width:250px;padding:10px;">
  	<?php echo $this->load->view('administrator/menu');?>
  </div>       
  <div id="content" data-options="region:'center',iconCls:'icon-content'">     
      <div id="tt" class="easyui-tabs" style="height:auto;">
          <div title="<?php echo $judul;?>" style="padding:10px">
          <?php echo $content;?>	
          </div>
      </div>
  </div>    
<div class="bawah" data-options="region:'south',border:false" style="height:45px;padding:2px;color:#000;">  
    <div style="padding:5px;background:#fafafa;border:1px solid #ccc; text-align:center;">
    <?php echo $this->config->item('credit_aplikasi');?>
    </div> 
</div>
</body>
</html>
