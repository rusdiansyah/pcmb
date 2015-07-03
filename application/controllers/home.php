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
			/*
			$id = $this->session->userdata('nim');
			if(!empty($id)){
				$id['NoDaftar'] = $this->session->userdata('nim');
				$d['online'] = 'Offline';
				$this->app_model->updateData("mspcmb",$d,$id);
				$this->session->sess_destroy();
			}
			*/
			$d['judul'] = 'Home';
			/* content */	
			$d['content']= $this->load->view('content',$d,true);
			
			$this->load->view('home',$d);	
	}
	
	public function panduan()
	{		
			$d['judul'] = 'panduan';
			/* content */	
			$d['content']= $this->load->view('panduan',$d,true);
			
			$this->load->view('home',$d);	
	}
	
	public function alur()
	{		
			$d['judul'] = 'alur';
			/* content */	
			$d['content']= $this->load->view('alur',$d,true);
			
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
			$d['l_fak'] = $this->app_model->manualQuery("SELECT * FROM tbjurusan WHERE tampil='Ya' AND fak_btn<>'PASCA' GROUP BY Fak");
			/* content */	
			$d['content']= $this->load->view('prodi',$d,true);
			
			$this->load->view('home',$d);	
	}
	
	public function simpan_survey()
	{		
		$this->db->empty_table('survey'); 
		$data = $this->app_model->manualQuery("SELECT Survey FROM mspcmb");
		foreach($data->result() as $t){
			$exp = explode(",",$t->Survey);
			$jml_array = count($exp)-1;
			for($i=0;$i<$jml_array;$i++){
				$dt = $exp[$i];
				
					$cari = $this->app_model->manualQuery("SELECT * FROM survey WHERE survey='$dt'");
					if($cari->num_rows>0){
						$this->app_model->manualQuery("UPDATE survey SET jml=jml+1 WHERE survey='$dt'");
					}else{
						//if(!empty($dt)){
						$this->app_model->manualQuery("INSERT INTO survey (survey,jml) VALUES ('$dt',1)");
						//}
					}
			}
		}
	}
	
	public function grafik_survey()
	{		
			$d['judul'] = 'Garfik Survey';
			$d['survey'] = $this->app_model->manualQuery("SELECT * FROM survey");
			$d['jml_survey'] = $this->app_model->manualQuery("SELECT Survey FROM mspcmb");
			/* content */	
			$this->simpan_survey();
			$d['content']= $this->load->view('grafik_survey',$d,true);
			
			$this->load->view('home',$d);	
	}
	
	public function pengumuman()
	{		
			$d['judul'] = 'Pengumuman';
			/* content */	
			$d['content']= $this->load->view('pengumuman',$d,true);
			
			$this->load->view('home',$d);	
	}

	
	public function login(){

			//$this->load->library('form_validation');

			$this->form_validation->set_rules('noform', 'No Formulir', 'user_check','Tess');
			$this->form_validation->set_rules('kodeakses', 'Kode Akses', 'required');

			$this->form_validation->set_message('user_check', 'Maaf, Tidak Boleh Ada Kosong');
			$this->form_validation->set_message('required', 'Maaf, Kode Akses Tidak Boleh Kosong');


			if ($this->form_validation->run() == FALSE)
			{
				$this->index();
			}
			else
			{
				$u = $this ->security->xss_clean($this->input->post('noform'));
				$p = $this ->security->xss_clean($this->input->post('kodeakses'));
				$this->app_model->getLoginPeserta($u,$p);
			}				
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/login.php */