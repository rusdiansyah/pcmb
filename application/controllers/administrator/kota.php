<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kota extends CI_Controller {
	/**
	 * @author : Deddy Rusdiansyah,S.Kom
	 * @keterangan : Controller untuk halaman awal ketika aplikasi  diakses
	 **/
	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Kota";
			
			$d['content']= $this->load->view('administrator/kota/view',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			header('location:'.base_url().'index.php/login');
		}
	}
	
	public function view()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			if(isset($_GET['grid']))
				echo $this->json_model->getJson_kota();
			else
				$this->load->view('administrator/kota/view');
		}else{
			header('location:'.base_url().'index.php/login');
		}
	}
	
	public function simpan()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
				$table = "provinsi";
				$id['id_provinsi'] = $this->input->post('id_provinsi');
				$up['provinsi'] = $this->input->post('provinsi');
			
				$hasil = $this->app_model->getSelectedData($table,$id);
				$row = $hasil->num_rows();
				if($row>0){
					$this->app_model->updateData($table,$up,$id);
					echo "Data sukses diubah";
				}else{
					$this->app_model->insertData($table,$up);
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
				$id['id_provinsi'] = $this->input->post('id_provinsi'); //
				
				$hasil = $this->app_model->getSelectedData("provinsi",$id); //
				$row = $hasil->num_rows();
				if($row>0){
					$this->app_model->deleteData("provinsi",$id);
					echo "Data sukses dihapus";
				}
		}else{
				header('location:'.base_url());
		}
	}
	
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */