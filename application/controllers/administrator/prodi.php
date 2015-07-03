<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prodi extends CI_Controller {
	/**
	 * @author : Deddy Rusdiansyah,S.Kom
	 * @keterangan : Controller untuk halaman awal ketika aplikasi  diakses
	 **/
	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Program Studi";
			
			$d['content']= $this->load->view('administrator/prodi/view',$d,true);
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
				echo $this->json_model->getJson_Prodi();
			else
				$this->load->view('administrator/prodi/view');
		}else{
			redirect('/administrator/login/login/');
		}
	}
	
	public function simpan()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
				
				$table = "tbjurusan";
				$id['KdJur'] = $this->input->post('KdJur');
				
				$up['KdJur'] = $this->input->post('KdJur');
				$up['Fak'] = $this->input->post('Fak');
				$up['sing'] = $this->input->post('sing');
				$up['Jur'] = $this->input->post('Jur');
			
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
				redirect('/administrator/login/login/');
		}
	}
	
	public function hapus()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
				
				$id['KdJur'] = $this->input->post('id'); //
				
				$hasil = $this->app_model->getSelectedData("tbjurusan",$id); //
				$row = $hasil->num_rows();
				if($row>0){
					$this->app_model->deleteData("tbjurusan",$id);
					echo "Data sukses dihapus";
				}
				
		}else{
				redirect('/administrator/login/login/');
		}
	}
	
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */