<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Halaman Administrator <?php echo $this->config->item('nama_aplikasi_pendek');?></title>
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

<script type="text/javascript">
$(document).ready(function(){
	$('#win').window({  
		collapsible:false,  
		minimizable:false,  
		maximizable:false,
		closable:false
	}); 
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
</style>
</head>
<body onLoad="goforit()">
<div id="win" iconCls="icon-home" class="easyui-window" title=" <?php echo $this->config->item('nama_instansi');?>" style="width:550px;">  
<div id="kiri" style="float:left;">
<div id="Profil" class="easyui-panel" style="float:left;width:200px;height:180px;padding:5px; text-align:center;">
<img src="<?php echo base_url();?>admin/images/logo_iain.png" width="120" height="100" />
<h3><?php echo $this->config->item('nama_aplikasi_full');?></h3>
</ul>
</div>
</div>
<div id="tt" class="easyui-tabs" style="height:180px;">
<div title="Login System" style="padding:10px">
    <form style="padding:20px 20px 10px 40px;" id="fm" method="post" action="<?php echo base_url();?>index.php/administrator/login">  
        <table>
        <tr>
        	<td>Username</td>
            <td>:</td>
            <td><input type="text" name="username" id="username" size="20" required="true" data-options="required:true,validType:'length[3,10]'"></td>
		</tr>
        <tr>              
        	<td>Password</td>
            <td>:</td>
            <td><input type="password" name="password" id="password" size="20" required="true"></td>
		</tr>
        </table>              
        <div style="padding:10px;text-align:center;">          	
            <button type="submit" name="submit" class="easyui-linkbutton" icon="icon-lock_open" >Login</button>
        </div>  
    </form>  
</div>
<?php if(validation_errors()) { ?>
<p><?php echo validation_errors(); ?></p>
<?php } ?>
<?php if($this->session->flashdata('result_login')) { ?>
<p><?php echo $this->session->flashdata('result_login'); ?></p>
<?php } ?>
</div> 
<div style="padding:5px;background:#fafafa;border:1px solid #ccc; text-align:center"><?php echo $this->config->item('credit_aplikasi');?><br />
Programmer : Deddy Rusdiansyah <br>
Halaman ini dimuat selama <strong>{elapsed_time}</strong> detik
</div>   
</div> 
</body>
</html>
