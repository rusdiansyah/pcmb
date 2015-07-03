<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna extends CI_Controller {
	/**
	 * @author : Deddy Rusdiansyah,S.Kom
	 * @keterangan : Controller untuk halaman awal ketika aplikasi  diakses
	 **/
	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Pengguna";
			
			$d['content']= $this->load->view('administrator/pengguna/view',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('/administrator/login/login/');
		}
	}
	
	public function view()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			if(isset($_GET['grid']))
				echo $this->json_model->getJson_pengguna();
			else
				$this->load->view('administrator/pengguna/view');
		}else{
			redirect('/administrator/login/login/');
		}
	}
	
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
				redirect('/administrator/login/login/');
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
				redirect('/administrator/login/login/');
		}
	}
	
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */