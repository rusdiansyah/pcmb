<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <title><?php echo $this->config->item('nama_aplikasi_full');?></title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="<?php echo $this->config->item('deskripsi');?>">
            <meta name="author" content="Deddy Rusdiansyah">
            <link href="<?php echo base_url();?>peserta/assets/css/bootstrap.css" rel="stylesheet">
            <link href="<?php echo base_url();?>peserta/assets/css/bootstrap-responsive.css" rel="stylesheet">
            <link type="text/css" href="<?php echo base_url();?>peserta/css/custom-theme/jquery-ui-1.10.0.custom.css" rel="stylesheet" />
            <link type="text/css" href="<?php echo base_url();?>peserta/assets/css/font-awesome.min.css" rel="stylesheet" />
            <link href="<?php echo base_url();?>peserta/assets/css/docs.css" rel="stylesheet">
            <link href="<?php echo base_url();?>peserta/assets/js/google-code-prettify/prettify.css" rel="stylesheet">
            <link rel="shortcut icon" href="assets/ico/favicon.png">
            <!-- Placed at the end of the document so the pages load faster -->
			<script src="<?php echo base_url();?>peserta/assets/js/jquery-1.9.0.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url();?>peserta/assets/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url();?>peserta/assets/js/jquery-ui-1.10.0.custom.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url();?>peserta/assets/js/google-code-prettify/prettify.js" type="text/javascript"></script>
            <script src="<?php echo base_url();?>peserta/assets/js/docs.js" type="text/javascript"></script>
            <script src="assets/js/demo.js" type="text/javascript"></script>
            
             <link href="<?php echo base_url();?>asset/css/bootstrap-notify.css" rel="stylesheet">
             <link href="<?php echo base_url();?>asset/css/styles/alert-notification-animations.css" rel="stylesheet">
            <script src="<?php echo base_url();?>asset/js/bootstrap-notify.js"></script>
            <script src="<?php echo base_url();?>peserta/assets/js/ajaxfileupload.js"></script>
            <script src="<?php echo base_url(); ?>asset/js/ui.datepicker-id.js"></script>

        </head>

        <body data-spy="scroll" data-target=".bs-docs-sidebar" data-twttr-rendered="true">
		<div class='notifications bottom-right'></div>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="#"><?php echo $this->config->item('nama_aplikasi_full');?>
                    </a>
                    <div class="nav-collapse collapse">
                        <!--
                        <div id="twitter-share" class="pull-right">
                            <a href="<?php echo base_url();?>home/peserta/logout" class="btn btn-primary"><i class="icon-off"></i> Logout</a>
                        </div>
                        -->
                    </div>
                </div>
            </div>
        </div>


        <!-- Subhead
        ================================================== -->
        <header class="jumbotron subhead" id="overview">
            <div class="container">
                <p class="lead">
                <img src="<?php echo base_url();?>asset/images/logo_iain.png" width="80" height="80" align="absmiddle" style="float:left; margin-right:5px;">
                <h2>IAIN &quot;Sultan Maulana Hasanuddin&quot; Banten.</h2></p>
            </div>
        </header>


        <div class="container">
        <!-- Docs nav ================================================== -->
        <div class="row">
            <div class="span3 bs-docs-sidebar">
                <ul class="nav nav-list bs-docs-sidenav">
                    <li><a href="#"><i class="icon-qrcode"></i> <?php echo $this->session->userdata('nim');?></a></li>
                    <li><a href="#"><i class="icon-user"></i> <?php echo $this->session->userdata('nama');?></a></li>
                    <li><a href="<?php echo base_url();?>index.php/peserta/home/logout"><i class="icon-off"></i><i class="icon-chevron-right"></i> Logout</a></li>
                </ul>
                <div style="margin-top:5px;"></div>
                <?php 
				$foto = $this->app_model->cek_foto($this->session->userdata('nim'));
				if(empty($foto)){
				?>
                <center><img src="<?php echo base_url();?>peserta/foto/kosong.png" class="img-rounded"></center>
                <?php }else{ ?>
                <center><img src="<?php echo base_url();?>peserta/foto/<?php echo $foto;?>" class="img-rounded"></center>
                <?php } ?>
            </div>
            <div class="span9 pull-left">
            <div style=" margin-top:30px;"></div>        
                    <?php echo $content;?>
            </div>
        </div>
    	</div>

<!-- Footer
================================================== -->
<footer class="footer">
    <div class="container">
        <p>
            <?php echo $this->config->item('credit_aplikasi');?><br>
            <?php echo $this->config->item('alamat_instansi');?>  
        </p>
    </div>
</footer>
</body>
</html>