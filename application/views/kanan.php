<!--datepicker-->
<center><div id="datepicker"></div></center>
<div style="padding:5px;"></div>
<ul class="nav nav-tabs" id="myTab">
  <li class="active"><a href="#A" data-toggle="tab">Berita Terkini</a></li>
  <li><a href="#B" data-toggle="tab">Agenda</a></li>
</ul>
<div class="tabbable">
  <div class="tab-content">
    <div class="tab-pane active" id="A">
      <div class="row-fluid">
      <div>
		<?php 
		foreach($berita->result_array() as $t){
			$isi_berita = htmlentities(strip_tags($t['isi_berita'])); 
			$isi = substr($isi_berita,0,80); // ambil sebanyak 180 karakter
			$isi = substr($isi_berita,0,strrpos($isi," "));	
			$tgl = $this->app_model->tgl_indo($t['tanggal']);
		?>
            <div class="media" style="line-height:15px;" align="justify">
            <a href="<?php echo base_url();?>index.php/home/detail_berita/<?php echo $t['id_berita'];?>" class="pull-right">
            <img class="img-polaroid" data-src="holder.js/64x64" src="<?php echo base_url();?>asset/foto_berita/<?php echo $t['gambar'];?>" width="64" height="64">
            </a>
            <a href="<?php echo base_url();?>index.php/home/detail_berita/<?php echo $t['id_berita'];?>">
            <h6 style="line-height:15px; padding:0px; margin:0px;"><?php echo $t['judul'];?></h6>
            </a>
            <!-- Nested media object -->
              <p style="font-size:12px"><?php echo $isi;?></p>
            </div>
        <?php } ?>
        </div>
      </div>
     </div>
      <div class="tab-pane" id="B">
      <div class="row-fluid">
      <div>
        <?php 
		foreach($agenda->result_array() as $t){
		?>
        <table>
        <tr>
        	<td valign="top">Tanggal</td>
        	<td valign="top">:</td>
			<td><?php echo $this->app_model->tgl_indo($t['tgl_mulai']);?> s.d<br />
            <?php echo $this->app_model->tgl_indo($t['tgl_selesai']);?>
            </td>
        </tr>
        <tr>
        	<td valign="top">Agenda</td>
            <td valign="top">:</td>
			<td><?php echo $t['tema'];?></td>
		</tr>
        </table>  
        <hr />          
        <?php }?>
        </div>
      </div>
  </div>
</div>
<div style="padding:5px;"></div>
<!--Foto-->
<div id="judul">
<h5 style="line-height:10px; color:#fff;"><i class="icon-picture  icon-white"></i> Foto Galeri</h5>
</div>
<div class="gallery">
     <ul class="thumbnails">
    <?php
    foreach($foto->result_array() as $t){
    ?>
     <li class="span1">
            <div class="thumbnail">
            	<a href="<?php echo base_url(); ?>asset/img_galeri/<?php echo $t['gbr_gallery'];?>" rel="prettyPhoto[gallery]" title="<?php echo $t['jdl_gallery'];?>">
              <img data-src="holder.js/300x200" alt="" src="<?php echo base_url();?>asset/img_galeri/<?php echo $t['gbr_gallery'];?>">
              </a>
            </div>   
      </li>
    <?php } ?>
    </ul>
</div>    
<div style="padding:5px;"></div>
<!--link Terkait-->
<div id="judul" style="margin-bottom:5px;">
<h5 style="line-height:10px; color:#fff;"><i class="icon-globe  icon-white"></i> Link Terkait</h5>
</div>
<div class="media">
    <?php
    foreach($link->result_array() as $t){
    ?>
      <div class="span1">
            <a href="<?php echo $t['url'];?>">
          <img class="img-polaroid" data-src="holder.js/300x200" alt="" src="<?php echo base_url();?>asset/foto_banner/<?php echo $t['gambar'];?>" width="260" height="120">
          </a>    
      </div>
    <?php } ?>
</div>