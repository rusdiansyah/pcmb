<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kode_bayar extends CI_Controller {

	/**
	 * @author : Deddy Rusdiansyah,S.Kom
	 * @keterangan : Controller untuk halaman awal ketika aplikasi  diakses
	 **/
	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Kode Bayar";
			
			$d['content']= $this->load->view('kode_bayar/view',$d,true);
			$this->load->view('home',$d);
		}else{
			//header('location:'.base_url().'index.php/administrator/login/login');
			redirect('/administrator/login/login/');
		}
	}
	
	public function view()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			if(isset($_GET['grid']))
				echo $this->json_model->getJson_KODEBAYAR();
			else
				$this->load->view('kode_bayar/view');
		}else{
			redirect('/administrator/login/login/');
		}
	}
	/*
	public function simpan()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
				$id['username'] = $this->input->post('username');
				
				$up['username'] = $this->input->post('username');
				$up['password'] = md5($this->input->post('password'));	
				$up['nama_lengkap'] = $this->input->post('nama_lengkap');
				
				$hasil = $this->app_model->getSelectedData("users",$id);
				$row = $hasil->num_rows();
				if($row>0){
					$this->app_model->updateData("users",$up,$id);
					echo "Data sukses diubah";
				}else{
					$this->app_model->insertData("users",$up);
					echo "Data sukses disimpan";
				}
		}else{
				header('location:'.base_url());
		}
	}
	
	public function hapus()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
				$id['username'] = $this->input->post('id'); //
				
				$hasil = $this->app_model->getSelectedData("users",$id); //
				$row = $hasil->num_rows();
				if($row>0){
					$this->app_model->deleteData("users",$id);
					echo "Data sukses dihapus";
				}
		}else{
				header('location:'.base_url());
		}
	}
	*/
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */