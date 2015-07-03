<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $judul_lengkap.' - '.$instansi; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/docs.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>asset/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/application.js"></script>
  </head>
  <body>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo base_url(); ?>"><?php echo $judul_pendek; ?></a>
          <div class="nav-collapse collapse">
            
			<?php echo form_open('login/index','class="navbar-form pull-right"'); ?>
				<select class="span" name="perusahaan" id="perusahaan">
              <option value="">-PILIH PERUSAHAAN-</option>
              <?php 
			  foreach($data->result() as $t){
				?>
                <option value="<?php echo $t->id;?>"><?php echo $t->nama_perusahaan;?></option>
                <?php } ?>
                </select>
              <button type="submit" class="btn btn-info "><i class="icon-share icon-white"></i> Log in</button>
           <?php echo form_close(); ?>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container">
	
	<?php if(validation_errors()) { ?>
	<div class="alert alert-block">
	  <button type="button" class="close" data-dismiss="alert">×</button>
	  	<h4>Terjadi Kesalahan!</h4>
		<?php echo validation_errors(); ?>
	</div>
	<?php } ?>
	
	<?php if($this->session->flashdata('result_login')) { ?>
	<div class="alert alert-block">
	  <button type="button" class="close" data-dismiss="alert">×</button>
	  	<h4>Terjadi Kesalahan!</h4>
		<?php echo $this->session->flashdata('result_login'); ?>
	</div>
	<?php } ?>
      <div class="hero-unit">
        <h2>Selamat Datang di <?php echo $judul_lengkap.' '.$instansi; ?></h2>
        <p align="justify">Sistem Informasi <?php echo $judul_lengkap;?> merupakan sebuah aplikasi untuk melakukan manajemen data faktur dalam hal mengisi data faktur hingga pencetakan faktur. Silahkan pilih nama perusahaan untuk mulai untuk melakukan manajemen atau pengolahan data sesuai dengan hak akses yang dimiliki.</p>
      </div>
      <footer class="well">
        <p><?php echo $credit; ?></p>
      </footer>
    </div> <!-- /container -->
  </body>
</html>
