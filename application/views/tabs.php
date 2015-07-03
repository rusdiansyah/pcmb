<script type="text/javascript">
$(document).ready(function(){
	$('#input_data').dialog({
		autoOpen: false,
		width: 800
	});

	$("#btn_sd_file").click(function(){
		var id = "file_sd";
		 $('#input_data').dialog('open');
		return false;
	});
	
});
</script>
<ul id="crumbs">
		<li><a href="<?php echo base_url();?>index.php/home" class="home"><i class="icon-home icon-black"></i>Home</a></li>
	</ul>
<ul class="nav nav-tabs" id="myTab">
  <li class="active"><a href="#A" data-toggle="tab"><i class="icon-book icon-white"></i> PSB SD</a></li>
  <li><a href="#B" data-toggle="tab"><i class="icon-book icon-white"></i> PSB SMP</a></li>
  <li><a href="#C" data-toggle="tab"><i class="icon-book icon-white"></i> PSB SMA</a></li>
  <li><a href="#D" data-toggle="tab"><i class="icon-book icon-white"></i> PSB SMK</a></li>
</ul>
<div class="tabbable">
  <div class="tab-content">
    <div class="tab-pane active" id="A">
      <div class="row-fluid">
      <ul class="thumbnails">
      <li class="span12">
      <div class="thumbnail">
      <img class="img-polaroid" data-src="holder.js/300x200" src="<?php echo base_url();?>asset/img_prosedur/sd.jpg">
      <div class="caption">
      <h3>PSB Sekolah Dasar (SD)</h3>
      <div class="media" style="text-align:justify">
      Pusat Sumber Belajar atau disingkat PSB merupakan media belajar Online. PSB dibuat untuk guru dalam menyampaikan materi secara online dan siswa tinggal mengakses situs yang dituju tanpa harus bertatap muka. Pemanfaatan PSB ini sangat luas selain guru dapat menyampaikan materi ke situs .... <br />
      Fasilitas yang ada dalam PSB SD
      <ol>
      <li>Profil Sekolah
      <ul>
      <li>Sejarah Sekolah</li>
      <li>Visi Misi Sekolah</li>
      <li>Tugas dan Fungsi Sekolah</li>
      <li>Stuktur Organisasi Sekolah</li>
      </ul>    
      </li>
      <li>Bahan Ajar Tiap Kelas</li>
      <li>Media Belajar
      <ul>
      <li>E Book</li>
      <li>Video</li>
      <li>Animasi</li>
      </ul>
      </li>
      <li>Materi RPP Tiap Kelas</li>
      </ol>
      <div class="btn-group pull-right">
      <button type="button" name="btn_sd_file" id="btn_sd_file" class="btn btn-info"><i class="icon-download-alt icon-white"></i> Download Source Code</button>
      <button type="button" name="btn_sd_doc" id="btn_sd_doc" class="btn btn-primary"><i class="icon-download-alt icon-white"></i> Download Manual Book</button>
      </div>
      </div>
      </div>
      </div>
      </li>
      </ul>
      </div>                  
    
    </div><!--akhir tab a -->
    <div class="tab-pane" id="B">
      <div class="row-fluid">
      <ul class="thumbnails">
      <li class="span12">
      <div class="thumbnail">
      <img class="img-polaroid" data-src="holder.js/300x200" src="<?php echo base_url();?>asset/img_prosedur/psb_smp.jpg">
      <div class="caption">
      <h3>PSB Sekolah Menengah Pertama (SMP)</h3>
      <div class="media" style="text-align:justify">
      Pusat Sumber Belajar atau disingkat PSB merupakan media belajar Online. PSB dibuat untuk guru dalam menyampaikan materi secara online dan siswa tinggal mengakses situs yang dituju tanpa harus bertatap muka. Pemanfaatan PSB ini sangat luas selain guru dapat menyampaikan materi ke situs .... <br />
      Fasilitas yang ada dalam PSB SMP
      <ol>
      <li>Profil Sekolah
      <ul>
      <li>Sejarah Sekolah</li>
      <li>Visi Misi Sekolah</li>
      <li>Tugas dan Fungsi Sekolah</li>
      <li>Stuktur Organisasi Sekolah</li>
      </ul>    
      </li>
      <li>Bahan Ajar Tiap Kelas</li>
      <li>Media Belajar
      <ul>
      <li>E Book</li>
      <li>Video</li>
      <li>Animasi</li>
      </ul>
      </li>
      <li>Materi RPP Tiap Kelas</li>
      </ol>
      <div class="btn-group pull-right">
      <a href="#" class="btn btn-info"><i class="icon-download-alt icon-white"></i> Download Source Code</a> 
      <a href="#" class="btn btn-primary"><i class="icon-download-alt icon-white"></i> Download Manual Book</a>
      </div>
      </div>
      </div>
      </div>
      </li>
      </ul>
      </div>  
    </div>
    <div class="tab-pane" id="C"><!--sma-->
      <div class="row-fluid">
      <ul class="thumbnails">
      <li class="span12">
      <div class="thumbnail">
      <img class="img-polaroid" data-src="holder.js/300x200" src="<?php echo base_url();?>asset/img_prosedur/psb_sma.jpg">
      <div class="caption">
      <h3>PSB Sekolah Menengah Atas (SMA)</h3>
      <div class="media" style="text-align:justify">
      Pusat Sumber Belajar atau disingkat PSB merupakan media belajar Online. PSB dibuat untuk guru dalam menyampaikan materi secara online dan siswa tinggal mengakses situs yang dituju tanpa harus bertatap muka. Pemanfaatan PSB ini sangat luas selain guru dapat menyampaikan materi ke situs .... <br />
      Fasilitas yang ada dalam PSB SMA
      <ol>
      <li>Profil Sekolah
      <ul>
      <li>Sejarah Sekolah</li>
      <li>Visi Misi Sekolah</li>
      <li>Tugas dan Fungsi Sekolah</li>
      <li>Stuktur Organisasi Sekolah</li>
      </ul>    
      </li>
      <li>Bahan Ajar Tiap Kelas</li>
      <li>Media Belajar
      <ul>
      <li>E Book</li>
      <li>Video</li>
      <li>Animasi</li>
      </ul>
      </li>
      <li>Materi RPP Tiap Kelas</li>
      </ol>
      <div class="btn-group pull-right">
      <a href="#" class="btn btn-info"><i class="icon-download-alt icon-white"></i> Download Source Code</a> 
      <a href="#" class="btn btn-primary"><i class="icon-download-alt icon-white"></i> Download Manual Book</a>
      </div>
      </div>
      </div>
      </div>
      </li>
      </ul>
      </div>
      
    </div>
    <div class="tab-pane" id="D"><!-- SMK -->
      <div class="row-fluid">
      <ul class="thumbnails">
      <li class="span12">
      <div class="thumbnail">
      <img class="img-polaroid" data-src="holder.js/300x200" src="<?php echo base_url();?>asset/img_prosedur/psb_smk.jpg">
      <div class="caption">
      <h3>PSB Sekolah Menengah Kejuruan (SMK)</h3>
      <div class="media" style="text-align:justify">
      Pusat Sumber Belajar atau disingkat PSB merupakan media belajar Online. PSB dibuat untuk guru dalam menyampaikan materi secara online dan siswa tinggal mengakses situs yang dituju tanpa harus bertatap muka. Pemanfaatan PSB ini sangat luas selain guru dapat menyampaikan materi ke situs .... <br />
      Fasilitas yang ada dalam PSB SMK
      <ol>
      <li>Profil Sekolah
      <ul>
      <li>Sejarah Sekolah</li>
      <li>Visi Misi Sekolah</li>
      <li>Tugas dan Fungsi Sekolah</li>
      <li>Stuktur Organisasi Sekolah</li>
      </ul>    
      </li>
      <li>Bahan Ajar Tiap Kelas</li>
      <li>Media Belajar
      <ul>
      <li>E Book</li>
      <li>Video</li>
      <li>Animasi</li>
      </ul>
      </li>
      <li>Materi RPP Tiap Kelas</li>
      </ol>
      <div class="btn-group pull-right">
      <a href="#" class="btn btn-info"><i class="icon-download-alt icon-white"></i> Download Source Code</a> 
      <a href="#" class="btn btn-primary"><i class="icon-download-alt icon-white"></i> Download Manual Book</a>
      </div>
      </div>
      </div>
      </div>
      </li>
      </ul>
      </div>
    </div>
  </div>
</div> <!-- /tabbable -->

<div id="input_data" title="Input Biodata">
<?php echo $this->load->view('form_download');?>
</div>