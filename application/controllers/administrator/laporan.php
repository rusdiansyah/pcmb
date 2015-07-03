<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

	/**
	 * @author : Deddy Rusdiansyah,S.Kom
	 * @keterangan : Controller untuk halaman awal ketika aplikasi  diakses
	 **/
	public function lap_pmb()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Laporan PMB";
			$d['th'] = $this->app_model->manualQuery("SELECT ThAjaran FROM mspcmb GROUP BY ThAjaran");
			$d['jurusan'] = $this->app_model->manualQuery("SELECT * FROM tbjurusan WHERE tampil='Ya' AND fak_btn<>'PASCA'");
			$d['content']= $this->load->view('administrator/laporan/lap_pmb',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('/home/');
		}
	}
	
	public function cetak_lap_pmb()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$th = $this->uri->segment(4);
			$jurusan = $this->uri->segment(6);
			if($jurusan=='all'){
				$d['data'] = $this->app_model->manualQuery("SELECT * FROM mspcmb WHERE substr(ThAjaran,1,4)='$th' AND NoUjian<>'' ORDER BY NoUjian");
			}else{
				$d['data'] = $this->app_model->manualQuery("SELECT * FROM mspcmb WHERE substr(ThAjaran,1,4)='$th' AND Jur1='$jurusan' AND NoUjian<>'' ORDER BY NoUjian");
			}
			$this->load->view('administrator/cetak/lap_pmb',$d);
		}else{
			redirect('/home/');
		}
	}
	public function cetak_lap_pmb_excel()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$th = $this->uri->segment(4);
			$jurusan = $this->uri->segment(6);
			if($jurusan=='all'){
				$d['data'] = $this->app_model->manualQuery("SELECT * FROM mspcmb WHERE substr(ThAjaran,1,4)='$th' AND NoUjian<>'' ORDER BY NoUjian");
			}else{
				$d['data'] = $this->app_model->manualQuery("SELECT * FROM mspcmb WHERE substr(ThAjaran,1,4)='$th' AND Jur1='$jurusan' AND NoUjian<>'' ORDER BY NoUjian");
			}
			$this->load->view('administrator/cetak/lap_pmb_excel',$d);
		}else{
			redirect('/home/');
		}
	}
	
	public function lap_pmb_ruangan()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Laporan Peserta Per Ruangan";
			$d['th'] = $this->app_model->manualQuery("SELECT ThAjaran FROM mspcmb GROUP BY ThAjaran");
			$d['ruang'] = $this->app_model->manualQuery("SELECT RUjian FROM mspcmb WHERE RUjian<>'' GROUP BY RUjian");
			$d['content']= $this->load->view('administrator/laporan/lap_ruangan',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('/home/');
		}
	}
	
	public function cetak_lap_pmb_ruangan()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$th = $this->config->item('thak');
			$ruang = $this->uri->segment(4);
			$d['ruang'] = $ruang;
			$d['data'] = $this->app_model->manualQuery("SELECT * FROM mspcmb WHERE ThAjaran='$th' AND RUjian='$ruang' ORDER BY NoUjian");
			
			$this->load->view('administrator/cetak/lap_pmb_ruangan',$d);
		}else{
			redirect('/home/');
		}
	}
	
	public function absen_tulis()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Cetak Absen Tulis";
			$d['ruang'] = $this->app_model->manualQuery("SELECT RUjian FROM mspcmb WHERE RUjian<>'' GROUP BY RUjian");
			$d['content']= $this->load->view('administrator/laporan/lap_absen_tulis',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('/home/');
		}
	}
	
	public function cetak_absen_tulis()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$th = $this->config->item('thak');
			$hari = $this->uri->segment(4);
			$ruang = $this->uri->segment(5);
			
			$d['ruang'] = $ruang;
			$d['data'] = $this->app_model->manualQuery("SELECT * FROM mspcmb WHERE ThAjaran='$th' AND RUjian='$ruang' ORDER BY NoUjian");
			if($hari==1){
				$this->load->view('administrator/cetak/absen_tulis_h1',$d);
			}else{
				$this->load->view('administrator/cetak/absen_tulis_h2',$d);
			}
		}else{
			redirect('/home/');
		}
	}
	
	public function absen_lisan()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Cetak Absen Lisan / Wawancara";
			$d['ruang'] = $this->app_model->manualQuery("SELECT RUjian FROM mspcmb WHERE RUjian<>'' GROUP BY RUjian");
			$d['content']= $this->load->view('administrator/laporan/lap_absen_lisan',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('/home/');
		}
	}
	
	public function cetak_absen_lisan()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$th = $this->config->item('thak');
			$ruang = $this->uri->segment(4);
			
			$d['ruang'] = $ruang;
			$d['data'] = $this->app_model->manualQuery("SELECT * FROM mspcmb WHERE ThAjaran='$th' AND RUjian='$ruang' ORDER BY NoUjian");

			$this->load->view('administrator/cetak/absen_lisan',$d);
	
		}else{
			redirect('/home/');
		}
	}
	
	public function absen_baca_alquran()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Cetak Form Penilaian Baca Tulis AL QUR'AN";
			$d['ruang'] = $this->app_model->manualQuery("SELECT RUjian FROM mspcmb WHERE RUjian<>'' GROUP BY RUjian");
			$d['content']= $this->load->view('administrator/laporan/lap_baca_alquran',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('/home/');
		}
	}
	
	public function cetak_baca_alquran()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$th = $this->config->item('thak');
			$ruang = $this->uri->segment(4);
			
			$d['ruang'] = $ruang;
			$d['data'] = $this->app_model->manualQuery("SELECT * FROM mspcmb WHERE ThAjaran='$th' AND RUjian='$ruang' ORDER BY NoUjian");

			$this->load->view('administrator/cetak/absen_baca_alquran',$d);
	
		}else{
			redirect('/home/');
		}
	}
	
	public function nomor_meja()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Cetak Nomor Meja";
			$d['ruang'] = $this->app_model->manualQuery("SELECT RUjian FROM mspcmb WHERE RUjian<>'' GROUP BY RUjian");
			$d['content']= $this->load->view('administrator/laporan/lap_nomor_meja',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('/home/');
		}
	}
	
	public function cetak_nomor_meja()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$th = $this->config->item('thak');
			$ruang = $this->uri->segment(4);
			
			$d['ruang'] = $ruang;
			$d['data'] = $this->app_model->manualQuery("SELECT * FROM mspcmb WHERE ThAjaran='$th' AND RUjian='$ruang' ORDER BY NoUjian");

			$this->load->view('administrator/cetak/nomor_meja',$d);
	
		}else{
			redirect('/home/');
		}
	}
	
	public function nilai_ujian()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['data'] = $this->app_model->manualQuery("SELECT * FROM mspcmb ORDER BY NoUjian");

			$this->load->view('administrator/cetak/cetak_ujian',$d);
	
		}else{
			redirect('/home/');
		}
	}
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */