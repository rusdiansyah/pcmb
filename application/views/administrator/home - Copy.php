<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Halaman Administrator</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="index, follow">
<meta name="description" content="<?php echo $meta_deskripsi;?>">
<meta name="keywords" content="<?php echo $meta_keyword;?>">
<meta http-equiv="Copyright" content="Deddy Rusdiansyah">
<meta name="author" content="Deddy Rusdiansyah">
<meta http-equiv="imagetoolbar" content="no">
<meta name="language" content="Indonesia">
<meta name="revisit-after" content="7">
<meta name="webcrawlers" content="all">
<meta name="rating" content="general">
<meta name="spiders" content="all">

<link rel="icon" href="<?php echo base_url();?>asset/<?php echo $favicon; ?>"/>

<link href="<?php echo base_url();?>asset/css/style_admin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>asset/css/style_menu.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.nivo.slider.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/clock.js"></script>



<script type="text/javascript">

</script>
<style type="text/css">
.thumb p {
	font-size:12px;
	line-height:1.5em;
}
.cap-title{
	font-size:10px;
	color:#1FB3DD;
}
</style>
</head>
<body onLoad="goforit()">
<div class="main">
  <div class="blok_header">
    <div class="header">
      <div class="logo">
      <a href="<?php echo $alamat_website;?>">
      <img src="<?php echo base_url();?>asset/images/<?php echo $logo;?>" width="85" height="60" border="0" alt="logo" /></a>
      </div>
      <div class="judul">
      <h1><?php echo $nama_website;?></h1>
      <p>Alamat : <?php echo $alamat;?></p>
      <p>Email : <?php echo $email;?></p>
      </div>
      <div class="jam">
        <span id="clock"></span> | <a href="<?php echo base_url();?>index.php/administrator/login/logout" target="_blank">LOGOUT</a>
        </div>
      <div class="clr"></div>
      <div class="menu_resize">
          <ul id="menu">
            <li><a href="<?php echo base_url();?>index.php/administrator/home">Home</a></li>
            <li><a href="#">Data Statis</a>
            	<ul>
                	<li><a href="<?php echo base_url();?>index.php/administrator/identitas">Identitas Web</a></li>
                    <li><a href="#">Kepala Kantor</a></li>
                    <li><a href="#">Manajemen Users</a></li>
                	<li><a href="#">Profil</a></li>
                    <li><a href="#">Pelayanan</a></li>
                </ul>
            </li>
            <li><a href="#">Data Dinamis</a>
            	<ul>
                	<li><a href="#">Berita</a></li>
                    <li><a href="#">Info Lelang</a></li>
                    <li><a href="#">Sekilas Info</a></li>
                    <li><a href="#">Agenda</a></li>
                    <li><a href="#">Download</a></li>
                </ul>
            </li>
			<li><a href="#">Manajemen Link</a>
            	<ul>
                	<li><a href="#">Informasi Keimigrasian</a></li>
                    <li><a href="#">Link Terkait</a></li>
                </ul>
            </li>
            <li><a href="#">Hubungi Kami</a></li>
            <li><a href="<?php echo base_url();?>index.php/administrator/login/logout">Logout</a></li>
          </ul>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
    <div class="clr"></div>
  </div>
  <div class="body_resize">
    <div class="body">
      <div class="body_big">
        <?php echo $content; ?>
      </div>
      <div class="clr"></div>
    </div>
    <div class="clr"></div>
  </div>
</div>
<div class="footer">
  <div class="footer_resize">
    <p class="leftt">© Copyright <?php echo $nama_website;?> 2013. All Rights Reserved<br />
      <a href="http://<?php echo $web_prg;?>"><?php echo $prg;?> Templates</a></p>
    <div class="clr"></div>
  </div>
  <div class="clr"></div>
</div>
</body>
</html>
