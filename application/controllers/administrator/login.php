<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * @author : Deddy Rusdiansyah,S.Kom
	 * @web : http://deddyrusdiansyah.blogspot.com
	 * @keterangan : Controller untuk halaman awal ketika aplikasi koperasi diakses
	 **/
	 
	public function index()
	{
			
			$u = $this->input->post('username');
			$p = $this->input->post('password');
			if (empty($u) && empty($p)){
				$this->load->view('administrator/login');	
			}else{
				$this->app_model->getLoginAdmin($u,$p);
			}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		header('location:'.base_url().'index.php');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/koperasi.php */