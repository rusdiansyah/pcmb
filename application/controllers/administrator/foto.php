<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Foto extends CI_Controller {

	/**
	 * @author : Deddy Rusdiansyah,S.Kom
	 * @web : http://deddyrusdiansyah.blogspot.com
	 * @keterangan : Controller untuk halaman profil
	 **/
	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['prg']= $this->config->item('prg');
			$d['web_prg']= $this->config->item('web_prg');
			$text = "SELECT * FROM identitas WHERE id_identitas='1' LIMIT 1";
			$identitas = $this->app_model->manualQuery($text);
			foreach($identitas->result() as $db){
				$d['nama_website'] = $db->nama_website;
				$d['alamat'] = $db->alamat;
				$d['logo'] = $db->logo;
				$d['favicon'] = $db->favicon;
				$d['alamat_website'] = $db->alamat_website;
				$d['meta_deskripsi'] = $db->meta_deskripsi;
				$d['meta_keyword'] = $db->meta_keyword;
				$d['email'] = $db->email;
				
			}
			
			//$filter = $this->input->post('filter');
			
			$d['judul'] = "Foto";
			$d['pesan']='';
			
			$d['scriptmce'] = $this->scripttiny_mce();
			
			//paging
			$page=$this->uri->segment(4);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$text = "SELECT * FROM gallery";		
			
			$tot_hal = $this->app_model->manualQuery($text);		
			
			$config['base_url'] = site_url() . '/administrator/foto/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['next_link'] = 'Lanjut &raquo;';
			$config['prev_link'] = '&laquo; Kembali';
			$config['last_link'] = '<b>Terakhir &raquo; </b>';
			$config['first_link'] = '<b> &laquo; Pertama</b>';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			$d['hal'] = $offset;
			

			$text = "SELECT * FROM gallery,album 
					WHERE gallery.id_album=album.id_album
					ORDER BY id_gallery DESC LIMIT $limit OFFSET $offset";
	
			$d['data'] = $this->app_model->manualQuery($text);
			
			$text = "SELECT * FROM album 
					ORDER BY jdl_album ";
			$d['album'] = $this->app_model->manualQuery($text);
			
			
			$d['content'] = $this->load->view('administrator/v_foto', $d, true);		
			$this->load->view('administrator/home',$d);
		}else{
			header('location:'.base_url());
		}
	}
	
	public function filter()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['prg']= $this->config->item('prg');
			$d['web_prg']= $this->config->item('web_prg');
			$text = "SELECT * FROM identitas WHERE id_identitas='1' LIMIT 1";
			$identitas = $this->app_model->manualQuery($text);
			foreach($identitas->result() as $db){
				$d['nama_website'] = $db->nama_website;
				$d['alamat'] = $db->alamat;
				$d['logo'] = $db->logo;
				$d['favicon'] = $db->favicon;
				$d['alamat_website'] = $db->alamat_website;
				$d['meta_deskripsi'] = $db->meta_deskripsi;
				$d['meta_keyword'] = $db->meta_keyword;
				$d['email'] = $db->email;
				
			}
			
			$filter = $this->uri->segment(4); //$this->input->post('filter');
			
			$d['judul'] = "Foto";
			$d['pesan']='';
			
			$d['scriptmce'] = $this->scripttiny_mce();
			
			//paging
			$page=$this->uri->segment(5);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$text = "SELECT * FROM gallery WHERE id_album='$filter'";		
	
			$tot_hal = $this->app_model->manualQuery($text);		
			
			$config['base_url'] = site_url() .'/administrator/foto/filter/'.$filter;
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 5;
			$config['first_link'] = '<<';
			$config['last_link'] = '>>';
			$config['next_link'] = '>';
			$config['prev_link'] = '<';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			$d['hal'] = $offset;
			
			
			$text = "SELECT * FROM gallery,album 
					WHERE gallery.id_album=album.id_album
					AND gallery.id_album='$filter'
					ORDER BY id_gallery DESC LIMIT $limit OFFSET $offset";
			
			$d['data'] = $this->app_model->manualQuery($text);
			
			$text = "SELECT * FROM album 
					ORDER BY jdl_album ";
			$d['album'] = $this->app_model->manualQuery($text);
			
			
			$d['content'] = $this->load->view('administrator/v_foto', $d, true);		
			$this->load->view('administrator/home',$d);
		}else{
			header('location:'.base_url());
		}
	}
	
	public function tambah()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['prg']= $this->config->item('prg');
			$d['web_prg']= $this->config->item('web_prg');
			$text = "SELECT * FROM identitas WHERE id_identitas='1' LIMIT 1";
			$identitas = $this->app_model->manualQuery($text);
			foreach($identitas->result() as $db){
				$d['nama_website'] = $db->nama_website;
				$d['alamat'] = $db->alamat;
				$d['logo'] = $db->logo;
				$d['favicon'] = $db->favicon;
				$d['alamat_website'] = $db->alamat_website;
				$d['meta_deskripsi'] = $db->meta_deskripsi;
				$d['meta_keyword'] = $db->meta_keyword;
				$d['email'] = $db->email;
				
			}
			
			$d['id_album']='';
			$d['id_foto']='';
			$d['judul_foto']='';
			$d['gambar_foto']='';
			
			$d['judul'] = "Foto";
			$d['pesan']='';
			
			$text = "SELECT * FROM album 
					ORDER BY jdl_album ";
			$d['album'] = $this->app_model->manualQuery($text);
			
			$d['scriptmce'] = $this->scripttiny_mce();
		
			
			$d['content'] = $this->load->view('administrator/tambah_foto', $d, true);		
			$this->load->view('administrator/home',$d);
		}else{
			header('location:'.base_url());
		}
	}
	
	public function edit()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['prg']= $this->config->item('prg');
			$d['web_prg']= $this->config->item('web_prg');
			$text = "SELECT * FROM identitas WHERE id_identitas='1' LIMIT 1";
			$identitas = $this->app_model->manualQuery($text);
			foreach($identitas->result() as $db){
				$d['nama_website'] = $db->nama_website;
				$d['alamat'] = $db->alamat;
				$d['logo'] = $db->logo;
				$d['favicon'] = $db->favicon;
				$d['alamat_website'] = $db->alamat_website;
				$d['meta_deskripsi'] = $db->meta_deskripsi;
				$d['meta_keyword'] = $db->meta_keyword;
				$d['email'] = $db->email;
				
			}
			
			$id = $this->uri->segment(4);
			$text = "SELECT * FROM gallery WHERE id_gallery='$id' LIMIT 1";
			$data = $this->app_model->manualQuery($text);
			foreach($data->result() as $db){
				$d['id_album']=$db->id_album;
				$d['id_foto']=$db->id_gallery;
				$d['judul_foto']=$db->jdl_gallery;
				$d['gambar_foto']=$db->gbr_gallery;
			}
			
			$d['judul'] = "Album";
			$d['pesan']='';
			
			$text = "SELECT * FROM album 
					ORDER BY jdl_album ";
			$d['album'] = $this->app_model->manualQuery($text);
			
			$d['scriptmce'] = $this->scripttiny_mce();
		
			
			$d['content'] = $this->load->view('administrator/tambah_foto', $d, true);		
			$this->load->view('administrator/home',$d);
		}else{
			header('location:'.base_url());
		}
	}
	
	public function hapus()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){			
			$id = $this->uri->segment(4);
			$this->app_model->manualQuery("DELETE FROM gallery WHERE id_gallery='$id'");
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/administrator/foto'>";			
		}else{
			header('location:'.base_url());
		}
	}
	
	public function simpan()
	{
		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$config['upload_path'] = './asset/img_galeri/';   //base_url().'asset/images/'; //
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png|jp2';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['create_thumb'] = TRUE;
		   	$config['maintain_ratio'] = TRUE;					
			$this->load->library('upload', $config);
			/*
			$config['image_library'] = 'gd2';
		   	$config['source_image'] = '/path/to/image/mypic.jpg';
		   	$config['create_thumb'] = TRUE;
		   	$config['maintain_ratio'] = TRUE;
		   	$config['width'] = 75;
		   	$config['height'] = 50;
		  
		   	$this->load->library('image_lib', $config); 
		  
		   	$this->image_lib->resize();
			*/
				$acak = rand(0000,1000);
				
				if($this->upload->do_upload('userfile')){
					
					$tp=$this->upload->data();
			 		$res = $tp['full_path'];
			 		$ori = $tp['file_name'];
			 
					$up['id_album'] = $this->input->post('album');
					$up['jdl_gallery'] = $this->input->post('judul');
					$up['gbr_gallery'] = $ori; //$_FILES['userfile']['name'];
	
					$id= $this->input->post('id');
					if(empty($id)){
						$this->app_model->insertData("gallery",$up);
					}else{
						$key['id_gallery'] =$id;
						$this->app_model->updateData("gallery",$up,$key);
					}
					
					$d['pesan']='Simpan Sukses';		
					header('location:'.base_url().'index.php/administrator/foto/');

				}else{
					$error = $this->upload->display_errors();
					echo  $error;
				}
			
		}else{
				header('location:'.base_url());
		}
	
	}
	
	
	function image_list() 
	{
		$menu_id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$menu_id='';
		}
		else
		{
    			$menu_id = $this->uri->segment(3);
		}
		$imglist=$this->app_model->getDataGambar();	
		$js= 'var tinyMCEImageList = new Array(';
		foreach($imglist -> result_array() as $row) {
			$js.= '["'.$row['title'].'", "'.base_url().$row['image_url'].'"],';		
		}
		$js .= ');';
		echo str_replace(',);',');',$js);
	}
	
	//Function TinyMce------------------------------------------------------------------
		private function scripttiny_mce() {
		return '
		<!-- TinyMCE -->
		<script type="text/javascript" src="'.base_url().'asset/tiny_mce/tiny_mce_src.js"></script>
		<script type="text/javascript">
		tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "'.base_url().'system/application/views/themes/css/BrightSide.css",

		// Drop lists for link/image/media/template dialogs
		//"'.base_url().'media/lists/image_list.js"
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "'.base_url().'index.php/administrator/image_list/",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : \'Bold text\', inline : \'b\'},
			{title : \'Red text\', inline : \'span\', styles : {color : \'#ff0000\'}},
			{title : \'Red header\', block : \'h1\', styles : {color : \'#ff0000\'}},
			{title : \'Example 1\', inline : \'span\', classes : \'example1\'},
			{title : \'Example 2\', inline : \'span\', classes : \'example2\'},
			{title : \'Table styles\'},
			{title : \'Table row 1\', selector : \'tr\', classes : \'tablerow1\'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>';	
	}
}

/* End of file profil.php */
/* Location: ./application/controllers/profil.php */