<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penghasilan_ortu extends CI_Controller {
	/**
	 * @author : Deddy Rusdiansyah,S.Kom
	 * @keterangan : Controller untuk halaman awal ketika aplikasi  diakses
	 **/
	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Penghasilan Orang Tua";
			
			$d['content']= $this->load->view('administrator/penghasilan_ortu/view',$d,true);
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
				echo $this->json_model->getJson_Penghasilan();
			else
				$this->load->view('administrator/penghasilan_ortu/view');
		}else{
			redirect('/administrator/login/login/');
		}
	}
	
	public function simpan()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
				
				$table = "tbpenghasilanortu";
				$id['KdHasilOrtu'] = $this->input->post('KdKerjaOrtu');
				
				$up['KdHasilOrtu'] = $this->input->post('KdKerjaOrtu');
				$up['Penghasilan'] = $this->input->post('KerjaOrtu');
			
				$hasil = $this->app_model->getSelectedData($table,$id);
				$row = $hasil->num_rows();
				if($row>0){
					$this->app_model->updateData($table,$up,$id);
					echo "Data sukses diubah";
				}else{
					$this->app_model->insertData($table,$up);
					echo "Data sukses disimpan";
				}
				
				//echo "Maaf, Belum ada script";
		}else{
				redirect('/administrator/login/login/');
		}
	}
	
	public function hapus()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
				
				$id['KdHasilOrtu'] = $this->input->post('id'); //
				
				$hasil = $this->app_model->getSelectedData("tbpenghasilanortu",$id); //
				$row = $hasil->num_rows();
				if($row>0){
					$this->app_model->deleteData("tbpenghasilanortu",$id);
					echo "Data sukses dihapus";
				}
		}else{
				redirect('/administrator/login/login/');
		}
	}
	
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */