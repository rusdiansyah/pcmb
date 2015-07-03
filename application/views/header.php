<div class="row">
<div class="span3 kotak">
    <?php echo $this->load->view('bp');?>
</div>
<div class="span9">
<div id="myCarousel" class="carousel slide">
  <!-- Carousel items -->
  <div class="carousel-inner">
    <div class="active item"><img src="<?php echo base_url();?>asset/slider/h_1.jpg" width="100%" height="500">
    	<div class="carousel-caption">
        <h4><?php echo $this->config->item('nama_instansi');?></h4>
      </div>
    </div>
	<div class="item"><img src="<?php echo base_url();?>asset/slider/h_2.jpg" width="100%">
    	<div class="carousel-caption">
        <h4><?php echo $this->config->item('nama_instansi');?></h4>
      </div>
    </div>
    <div class="item"><img src="<?php echo base_url();?>asset/slider/h_3.jpg" width="100%">
    	<div class="carousel-caption">
        <h4><?php echo $this->config->item('nama_instansi');?></h4>
      </div>
    </div>
    <div class="item"><img src="<?php echo base_url();?>asset/slider/h_4.jpg" width="100%">
    	<div class="carousel-caption">
        <h4><?php echo $this->config->item('nama_instansi');?></h4>
      </div>
    </div>
  </div>
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>
</div>
</div>