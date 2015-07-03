<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ref_json extends CI_Controller {

	/**
	 * @author : Deddy Rusdiansyah,S.Kom
	 * @web : http://deddyrusdiansyah.blogspot.com
	 * @keterangan : Controller untuk halaman profil
	 **/

	
	public function cari_nim()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$id = $this->input->post('nim');
			$s2 = $this->input->post('s2');
			if($s2=="s2"){
				$text = "SELECT * FROM msdaftarmhsbaru_pasca WHERE nim='$id'";
			}else{
				$text = "SELECT * FROM msdaftarmhsbaru WHERE nim='$id'";
			}
			$tabel = $this->app_model->manualQuery($text);
			$row = $tabel->num_rows();
			if($row>0){
				foreach($tabel->result() as $t){
					$data['nama'] = $t->Nama;
					$data['angkatan'] = substr($t->ThAjaran,0,4);
					$jur = $t->LulusJur;
					if($s2=="s2"){
						$data['nama_fakultas'] = "PASCA";
					}else{
						$data['nama_fakultas'] = $this->app_model->cari_fakultas($jur);
					}
					$data['nama_prodi'] = $jur;
					
					echo json_encode($data);
				}
			}else{
				$data['nama'] = '';
				  $data['angkatan'] = '';
				  $data['nama_fakultas'] = '';
				  $data['nama_prodi'] = '';
				echo json_encode($data);
			}
		}else{
			header('location:'.base_url());
		}
	}
	
}

/* End of file profil.php */
/* Location: ./application/controllers/profil.php */