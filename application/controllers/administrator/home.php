<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * @author : Deddy Rusdiansyah,S.Kom
	 * @keterangan : Controller untuk halaman awal ketika aplikasi  diakses
	 **/
	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Home";
			$d['content']= $this->load->view('administrator/content',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('/home/');
		}
	}
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */