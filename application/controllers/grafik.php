<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grafik extends CI_Controller {

	/**
	 * @keterangan : Controller untuk halaman profil
	 **/
	
	public function index()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['credit'] = $this->config->item('credit_aplikasi');
			
			$d['instansi'] = $this->session->userdata('perusahaan');
			$d['jenis_usaha'] = $this->session->userdata('jenis_usaha');
			$d['npwp'] = $this->session->userdata('npwp');
			$d['alamat'] = $this->session->userdata('alamat');
			
			$d['judul'] = '';//$this->load->view('judul',$d,true);
			$d['content']= $this->load->view('grafik_jual',$d,true);
			
			$this->load->view('home',$d);
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	
}

/* End of file profil.php */
/* Location: ./application/controllers/profil.php */