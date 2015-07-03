<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Generate extends CI_Controller {

	/**
	 * @author : Deddy Rusdiansyah,S.Kom
	 * @keterangan : Controller untuk halaman awal ketika aplikasi  diakses
	 **/
	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			
			$jur = $this->app_model->manualQuery("SELECT * FROM tbjurusan WHERE tampil='Ya' AND fak_btn<>'PASCA'");
			foreach($jur->result() as $t){
				echo $t->Jur;
			}
		}else{
			redirect('/home/');
		}
	}
	
	
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */