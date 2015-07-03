<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/*
		***	Controller : home.php
		***	by Deddy Rusdiansyah
		***	http://deddyrusdiansyah.blogspot.com
	*/
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('captcha','date','text_helper'));
		session_start();
	}
	
	public function index()
	{		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Home';

			/* content */	
			$d['content']= $this->load->view('formulir',$d,true);
			$d['content']= $this->load->view('formulir',$d,true);
			
			$this->load->view('home',$d);
		}else{
			header('location:'.base_url().'index.php/home');
		}	
	}
	
	public function panduan()
	{		
			$d['judul'] = 'panduan';
			/* content */	
			$d['content']= $this->load->view('panduan',$d,true);
			
			$this->load->view('home',$d);	
	}

	public function panitia()
	{		
			$d['judul'] = 'panduan';
			/* content */	
			$d['content']= $this->load->view('panitia',$d,true);
			
			$this->load->view('home',$d);	
	}

	public function prodi()
	{		
			$d['judul'] = 'panduan';
			$d['l_fak'] = $this->app_model->manualQuery("SELECT * FROM tbjurusan WHERE tampil='Yes' GROUP BY Fak");
			/* content */	
			$d['content']= $this->load->view('prodi',$d,true);
			
			$this->load->view('home',$d);	
	}
	
	public function pengumuman()
	{		
			$d['judul'] = 'Pengumuman';
			/* content */	
			$d['content']= $this->load->view('pengumuman',$d,true);
			
			$this->load->view('home',$d);	
	}

	public function hubungi_kami()
	{
			/* config */
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['credit'] = $this->config->item('credit_aplikasi');
					
			/***capcai***/
			$vals = array(
			'img_path' => './captcha/',
			'img_url' => base_url().'captcha/',
			'font_path' => './system/fonts/impact.ttf',
			'img_width' => '155',
			'img_height' => '40',
			'expiration' => 90
			);
			$cap = create_captcha($vals);
		 
			$datamasuk = array(
				'captcha_time' => $cap['time'],
				'ip_address' => $this->input->ip_address(),
				'word' => $cap['word']
			);
			/*
			$expiration = time()-900;
			$this->app_model->manualQuery("DELETE FROM captcha WHERE captcha_time < ".$expiration);
			*/
			$this->app_model->insertData('captcha', $datamasuk);
			
			$d['gbr_captcha'] = $cap['image'];
			
			$dt['nama'] = mysql_real_escape_string($this->input->post('nama'));
			$dt['email'] = $this->input->post('email');
			$dt['subjek'] = mysql_real_escape_string($this->input->post('subjek'));
			$dt['pesan'] = $this->input->post('pesan');
			//$d['captcha'] = $this->input->post('captcha');
			$dt['tanggal'] = date('Y-m-d');
			$cap = 	$this->input->post('captcha');
			
			if(empty($dt['nama'])){
				$d['content']= $this->load->view('hubungi_kami',$d,true);
				/* kanan */
				$dd['berita']= $this->kanan_model->kanan_berita();
				$dd['agenda']= $this->kanan_model->kanan_agenda();
				$dd['foto']= $this->kanan_model->kanan_foto();
				$dd['link']= $this->kanan_model->kanan_link();
				$d['kanan']=$this->load->view('kanan',$dd,true);
				$this->load->view('home',$d);
			}else{
				$expiration = time()-9000;
				$this->app_model->manualQuery("DELETE FROM captcha WHERE captcha_time < ".$expiration);
				
				$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
				$binds = array($cap, $this->input->ip_address(), $expiration);
				$query = $this->db->query($sql, $binds);
				$row = $query->num_rows();
				if ($row == 0){
					echo "Captcha salah silahkan ulangi lagi.";
				}else{			
					$this->app_model->insertData("hubungi",$dt);
					echo "sukses";
				}
			}
	}
	
	public function simpan_hubungi(){
			$d['nama'] = mysql_real_escape_string($this->input->post('nama'));
			$d['email'] = mysql_real_escape_string($this->input->post('email'));
			$d['subjek'] = mysql_real_escape_string($this->input->post('subjek'));
			$d['pesan'] = $this->input->post('pesan');
			$d['captcha'] = $this->input->post('captcha');
			$d['tanggal'] = date('Y-m-d');
			
			$expiration = time()-9000;
			$this->app_model->manualQuery("DELETE FROM captcha WHERE captcha_time < ".$expiration);
			
			$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
			$binds = array($cap, $this->input->ip_address(), $expiration);
			$query = $this->db->query($sql, $binds);
			$row = $query->row();
			if ($row->count == 0){
				echo "Captcha salah silahkan ulangi lagi.";
			}else{			
				$this->app_model->insertData("hubungi",$d);
				echo "Data sukses disimpan";
			}
					
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/login.php */