<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grafik extends CI_Controller {

	/**
	 * @author : Deddy Rusdiansyah,S.Kom
	 * @keterangan : Controller untuk halaman awal ketika aplikasi  diakses
	 **/
	public function pilihan_1()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Grafik Berdasarkan PRODI Pilihan 1 ";
			
			$d['data'] = $this->app_model->manualQuery("SELECT * FROM tbjurusan WHERE tampil='Ya' AND fak_btn<>'PASCA'");
			$d['content']= $this->load->view('administrator/grafik/pilihan_1',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('/home/');
		}
	}
	
	public function pilihan_2()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Grafik Berdasarkan PRODI Pilihan 2 ";
			
			$d['data'] = $this->app_model->manualQuery("SELECT * FROM tbjurusan WHERE tampil='Ya' AND fak_btn<>'PASCA'");
			$d['content']= $this->load->view('administrator/grafik/pilihan_2',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('/home/');
		}
	}
	
	public function pilihan_3()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Grafik Berdasarkan PRODI Pilihan 3 ";
			
			$d['data'] = $this->app_model->manualQuery("SELECT * FROM tbjurusan WHERE tampil='Ya' AND fak_btn<>'PASCA'");
			$d['content']= $this->load->view('administrator/grafik/pilihan_3',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('/home/');
		}
	}
	
	public function sex()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Grafik Berdasarkan Jenis Kelamin";
			
			$d['data'] = $this->app_model->manualQuery("SELECT JK FROM mspcmb GROUP BY JK");
			$d['content']= $this->load->view('administrator/grafik/sex',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('/home/');
		}
	}
	
	public function kota()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Grafik Berdasarkan Kota";
			
			$d['data'] = $this->app_model->manualQuery("SELECT Kota FROM mspcmb GROUP BY Kota");
			$d['content']= $this->load->view('administrator/grafik/kota',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('/home/');
		}
	}
	
	public function asal_sekolah()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Grafik Berdasarkan Asal Sekolah";
			
			$d['data'] = $this->app_model->manualQuery("SELECT AsalSek FROM tbasalsekolah");
			$d['content']= $this->load->view('administrator/grafik/asal_sekolah',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('/home/');
		}
	}
	
	public function pendidikan_ortu()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Grafik Berdasarkan Pendidikan Orang Tua";
			
			$d['data'] = $this->app_model->manualQuery("SELECT Pendidikan FROM tbpendidikanortu");
			$d['content']= $this->load->view('administrator/grafik/pendidikan_ortu',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('/home/');
		}
	}
	
	public function pekerjaan_ortu()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Grafik Berdasarkan Pekerjaan Orang Tua";
			
			$d['data'] = $this->app_model->manualQuery("SELECT KerjaOrtu FROM tbkerjaortu");
			$d['content']= $this->load->view('administrator/grafik/pekerjaan_ortu',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('/home/');
		}
	}
	
	public function penghasilan_ortu()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Grafik Berdasarkan Penghasilan Orang Tua";
			
			$d['data'] = $this->app_model->manualQuery("SELECT Penghasilan FROM tbpenghasilanortu");
			$d['content']= $this->load->view('administrator/grafik/penghasilan_ortu',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('/home/');
		}
	}
	
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */