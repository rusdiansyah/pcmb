<div class="navbar navbar-static-top">
  <div class="navbar-inner">
    <div class="container" style="width: auto;">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="nav-collapse">
        <ul class="nav">
          <li class="active"><a href="<?php echo base_url();?>"><i class="icon-home icon-white"></i> </a></li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-th-large icon-white"></i> PROFIL <b class="caret"></b></a>
              <ul class="dropdown-menu">
              <?php
				$dt = $this->psb_model->menu_profil();
				foreach($dt->result() as $t){
				?>
            	<li><a href="<?php echo base_url();?>index.php/home/profil/<?php echo $t->id_halaman;?>"><?php echo $t->judul;?></a></li>
                <?php } ?>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-comment icon-white"></i> INFORMASI <b class="caret"></b></a>
              <ul class="dropdown-menu">
              <li><a href="<?php echo base_url();?>index.php/home/berita/"> Berita</a></li>
                <li><a href="<?php echo base_url();?>index.php/home/agenda/"> Agenda</a></li>
                <li><a href="<?php echo base_url();?>index.php/home/foto/"> Foto</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-list-alt icon-white"></i> SIKKOPMAS<b class="caret"></b></a>
              <ul class="dropdown-menu">
              <li><a href="#">Profil Pasar</a></li>
              <li><a href="<?php echo base_url();?>index.php/home/table_bahan_pokok/">Table</a></li>
              <li><a href="<?php echo base_url();?>index.php/home/grafik_bahan_pokok/">Grafik</a></li>
            </ul>
          </li>
          <li><a href="<?php echo base_url();?>index.php/home/hubungi_kami/"><i class="icon-question-sign icon-white"></i> HUBUNGI KAMI</a></li>
         
        </ul><!--ul akhir-->
        <form class="navbar-search pull-right" action="">
          <input type="text" class="search-query span2" placeholder="Pencarian">
        </form>
      </div><!-- /.nav-collapse -->
    </div>
  </div><!-- /navbar-inner -->
</div><!-- /navbar -->