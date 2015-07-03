<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/*
		***	Controller : home.php
		***	by Deddy Rusdiansyah
		***	http://deddyrusdiansyah.blogspot.com
	*/
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('captcha','date','text_helper'));
		session_start();
	}
	
	public function index()
	{		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Isi Biodata';
			
			$id['NoDaftar'] = $this->session->userdata('nim');
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			$row = $data->num_rows();
			if($row>0){
				foreach($data->result()as $t){
					$d['NoDaftar'] = $t->NoDaftar;
					$d['ThAjaran'] = $t->ThAjaran;
					$d['Angkatan'] = $t->Angkatan;
					$d['KdPS'] = 'S1';
					$d['TglDaftar'] = $this->app_model->tgl_str($t->TglDaftar);
					$d['Nama'] = $t->Nama;
					$d['TmptLhr'] = $t->TmptLhr;
					$d['TglLhr'] = $this->app_model->tgl_str($t->TglLhr);
					$d['JK'] = $t->JK;
					$d['Alamat1'] = $t->Alamat1;
					$d['Alamat2'] = $t->Alamat2;
					$d['Telp'] = $t->Telp;
					$d['EMail'] = $t->EMail;
					$d['Kota'] = $t->Kota;
					$d['WN'] = $t->WN;
					$d['BB'] = $t->BB;
					$d['TB'] = $t->TB;
					$d['GolDarah'] = $t->GolDarah;
					$d['Hobby'] = $t->Hobby;
					$d['Penyakit'] = $t->Penyakit;
					$d['AsalSek'] = $t->AsalSek;
					$d['NmAsalSek'] = $t->NmAsalSek;
					$d['NoIjazah'] = $t->NoIjazah;
					$d['IjTh'] = $t->IjTh;
					$d['IjJmlMP'] = $t->IjJmlMP;
					$d['IjJmlNilai'] = $t->IjJmlNilai;
					$d['NmAyah'] = $t->NmAyah;
					$d['KerjaAyah'] = $t->KerjaAyah;
					$d['HasilAyah'] = $t->HasilAyah;
					$d['PendAyah'] = $t->PendAyah;
					$d['NmIbu'] = $t->NmIbu;
					$d['KerjaIbu'] = $t->KerjaIbu;
					$d['HasilIbu'] = $t->HasilIbu;
					$d['PendIbu'] = $t->PendIbu;
					$d['NmWali'] = $t->NmWali;
					$d['AlamatWali'] = $t->AlamatWali;
					$d['HubWali'] = $t->HubWali;
					$d['Jur1'] = $t->Jur1;
					$d['Jur2'] = $t->Jur2;
					$d['Jur3'] = $t->Jur3;
					
					$d['content']= $this->load->view('peserta/formulir_isi',$d,true);
					$this->load->view('peserta/home',$d);
					//redirect('/peserta/home/foto/');
				}
			}else{
				$d['l_prov'] = $this->app_model->manualQuery("SELECT * FROM provinsi");
				$d['l_sekolah'] = $this->app_model->manualQuery("SELECT * FROM tbasalsekolah");
				$d['l_pekerjaan'] = $this->app_model->manualQuery("SELECT * FROM tbkerjaortu");
				$d['l_penghasilan'] = $this->app_model->manualQuery("SELECT * FROM tbpenghasilanortu");
				$d['l_pendidikan'] = $this->app_model->manualQuery("SELECT * FROM tbpendidikanortu");
				/* content */	
				$d['content']= $this->load->view('peserta/formulir',$d,true);
				$this->load->view('peserta/home',$d);
			}
		}else{
			redirect('/peserta/home/logout/');
		}	
	}
	
	public function simpan_biodata()
	{		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			date_default_timezone_set('Asia/Jakarta');
			$status = "";
		   	$msg = "";
			$tgllhr = $this->app_model->tgl_sql($this->input->post('TglLhr'));
						
			$d['NoDaftar'] = $this->session->userdata('nim');
			$d['ThAjaran'] = $this->config->item('thak');
			$d['Angkatan'] = $this->config->item('angkatan');
			$d['KdPS'] = 'S1';
			$d['TglDaftar'] = date('Y-m-d');//$this->input->post('');
			$d['Nama'] = $this->input->post('Nama');
			$d['TmptLhr'] = $this->input->post('TmptLhr');
			$d['TglLhr'] = $tgllhr;
			$d['JK'] = $this->input->post('JK');
			$d['Alamat1'] = $this->input->post('Alamat1');
			$d['Alamat2'] = $this->input->post('Alamat2');
			$d['Telp'] = $this->input->post('Telp');
			$d['EMail'] = $this->input->post('EMail');
			$d['Kota'] = $this->input->post('Kota');
			$d['WN'] = $this->input->post('WN');
			$d['BB'] = $this->input->post('BB');
			$d['TB'] = $this->input->post('TB');
			$d['GolDarah'] = $this->input->post('GolDarah');
			$d['Hobby'] = $this->input->post('Hobby');
			$d['Penyakit'] = $this->input->post('Penyakit');
			$d['AsalSek'] = $this->input->post('AsalSek');
			$d['NmAsalSek'] = $this->input->post('NmAsalSek');
			$d['NoIjazah'] = $this->input->post('NoIjazah');
			$d['IjTh'] = $this->input->post('IjTh');
			$d['IjJmlMP'] = $this->input->post('IjJmlMP');
			$d['IjJmlNilai'] = $this->input->post('IjJmlNilai');
			$d['NmAyah'] = $this->input->post('NmAyah');
			$d['KerjaAyah'] = $this->input->post('KerjaAyah');
			$d['HasilAyah'] = $this->input->post('HasilAyah');
			$d['PendAyah'] = $this->input->post('PendAyah');
			$d['NmIbu'] = $this->input->post('NmIbu');
			$d['KerjaIbu'] = $this->input->post('KerjaIbu');
			$d['HasilIbu'] = $this->input->post('HasilIbu');
			$d['PendIbu'] = $this->input->post('PendIbu');
			$d['NmWali'] = $this->input->post('NmWali');
			$d['AlamatWali'] = $this->input->post('AlamatWali');
			$d['HubWali'] = $this->input->post('HubWali');
			$d['ipaddress'] = $_SERVER['REMOTE_ADDR'];
			$d['online'] = 'Online';
			
			//$id['NoDaftar'] = $this->input->post('NoDaftar');
			$id['NoDaftar'] = $this->session->userdata('nim');
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			$row = $data->num_rows();
			if($row==0){
				//$this->app_model->updateData("mspcmb",$d,$id);
			//}else{
				$this->app_model->insertData("mspcmb",$d);
				$status="sukses";
				$msg="Data Sukses disimpan";
			}else{
				$status="Info";
				$msg="Data sudah ada silahkan dilanjutkan!!";
			}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		}else{
			redirect('/peserta/home/logout/');
		}	
	}
	
	public function foto()
	{		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Foto';

			/* content */	
			$d['content']= $this->load->view('peserta/foto',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}
	
	public function simpan_foto()
	{		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
		   	$msg = "";
		   	$file_element_name = 'Foto';
			$NoDaftar = $_POST['NoDaftar'];
			if (empty($NoDaftar)){
			  $status = "error";
			  $msg = "Nomor Daftar Kosong";
		   }
		   
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/foto/';
			$config['allowed_types'] = 'jpg|jpeg|png|jp2';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nim');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
			 		$ori = $aa['file_name'];
					$d['foto'] = $ori;
					$id['NoDaftar']= $this->session->userdata('nim');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					 
					 $config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/foto/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '300';
					$config['height']	= '150';
	 			
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					$status = "success";
					$msg = "File Berhasil diupload";
					 @unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}
	
	public function ijazah()
	{		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Ijazah';

			/* content */	
			$d['content']= $this->load->view('peserta/ijazah',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}
	
	public function simpan_ijazah()
	{		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
		   	$msg = "";
		   	$file_element_name = 'Foto';
			$NoDaftar = $_POST['NoDaftar'];
			if (empty($NoDaftar)){
			  $status = "error";
			  $msg = "Nomor Daftar Kosong";
		   }
		   
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/ijazah/';
			$config['allowed_types'] = 'jpg|jpeg|png|jp2';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nim');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
			 		$ori = $aa['file_name'];
					$d['file_ijazah'] = $ori;
					$id['NoDaftar']= $this->session->userdata('nim');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					 
					 $config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/ijazah/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '800';
					$config['height']	= '600';
	 			
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					$status = "success";
					$msg = "File Berhasil diupload";
					 @unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}
	
	public function list_jur()
	{		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$jur = $this->input->post('jur');
			$data = $this->app_model->manualQuery("SELECT Fak,sing_baru,jur_baru FROM tbjurusan WHERE tampil='Ya' AND fak_btn<>'PASCA' AND sing_baru<>'$jur' ORDER BY Fak");
			foreach($data->result()as $t){
				echo "<option value=$t->sing_baru>$t->Fak - $t->jur_baru</option>";
			}
			
		}else{
			redirect('/peserta/home/logout/');
		}
	}
	public function list_jur2()
	{		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$jur1 = $this->input->post('jur1');
			$jur2 = $this->input->post('jur2');
			$data = $this->app_model->manualQuery("SELECT Fak,sing_baru,jur_baru FROM tbjurusan WHERE tampil='Ya' AND fak_btn<>'PASCA' AND sing_baru<>'$jur1' AND sing_baru<>'$jur2' ORDER BY Fak");
			foreach($data->result()as $t){
				echo "<option value=$t->sing_baru>$t->Fak - $t->jur_baru</option>";
			}
			
		}else{
			redirect('/peserta/home/logout/');
		}
	}
	
	public function prodi()
	{		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$no_ujian= $this->app_model->CariNoUjian($this->session->userdata('nim'));
			if(empty($no_ujian)){
				$d['judul'] = 'Pilih Program Studi';
	
				/* content */	
				$d['l_prodi'] = $this->app_model->manualQuery("SELECT Fak,sing_baru,jur_baru FROM tbjurusan WHERE tampil='Ya' AND fak_btn<>'PASCA' ORDER BY Fak");
				$d['content']= $this->load->view('peserta/prodi',$d,true);
				$this->load->view('peserta/home',$d);
			}else{
				redirect('/peserta/home/survey/');
			}	
		}else{
			redirect('/peserta/home/logout/');
		}	
	}
	
	public function simpan_prodi()
	{		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$no_ujian= $this->app_model->CariNoUjian($this->session->userdata('nim'));
			$r_ujian= $this->app_model->CariRuangUjian($this->session->userdata('nim'));
			if(empty($no_ujian) && empty($r_ujian)){
				$thak = $this->config->item('thak');
				$noujian = $this->app_model->MaxNoUjian($thak);
				$ruangujian = $this->app_model->RuangUjian($thak);
				$d['NoUjian'] = $noujian;
				$d['RUjian'] = $ruangujian;
				$d['Jur1'] = $this->input->post('Jur1');
				$d['Jur2'] = $this->input->post('Jur2');
				$d['Jur3'] = $this->input->post('Jur3');
				//$d['Jur3'] = $this->input->post('');
				$id['NoDaftar']= $this->session->userdata('nim');
				$this->app_model->updateData("mspcmb",$d,$id);
				$status = "success";
				$msg = "Input Data tidak dapat diulangi, File Berhasil disimpan";
				echo json_encode(array('status' => $status, 'msg' => $msg));
			}else{
				redirect('/peserta/home/survey/');
			}
			/* tes data */
			/*
			$d['NoUjian'] = '';
				$d['RUjian'] = '';
				$id['NoDaftar']= $this->session->userdata('nim');
				$this->app_model->updateData("mspcmb",$d,$id);
			*/
		}else{
			redirect('/peserta/home/logout/');
		}	
	}
	
	public function survey()
	{		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Survey PCMB';
			
			$d['content']= $this->load->view('peserta/survey',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}
	
	public function simpan_survey()
	{		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			
			$hasil = "";
			for($i=1;$i<=9;$i++){
				$data = $this->input->post('cek'.$i);
				if(isset($data)){
					$hasil .= $this->input->post('cek'.$i);
				}
			}
			
			$d['Survey'] = $hasil;
			$id['NoDaftar']= $this->session->userdata('nim');
			$this->app_model->updateData("mspcmb",$d,$id);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}
	
	public function selesai()
	{		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Biodata Lengkap Peserta';
			$id['NoDaftar'] = $this->session->userdata('nim');
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			$row = $data->num_rows();
			if($row>0){
				foreach($data->result()as $t){
					$d['NoDaftar'] = $t->NoDaftar;
					$d['ThAjaran'] = $t->ThAjaran;
					$d['Angkatan'] = $t->Angkatan;
					$d['KdPS'] = 'S2';
					$d['TglDaftar'] = $this->app_model->tgl_str($t->TglDaftar);
					$d['Nama'] = $t->Nama;
					$d['TmptLhr'] = $t->TmptLhr;
					$d['TglLhr'] = $this->app_model->tgl_str($t->TglLhr);
					$d['JK'] = $t->JK;
					$d['Alamat1'] = $t->Alamat1;
					$d['Alamat2'] = $t->Alamat2;
					$d['Telp'] = $t->Telp;
					$d['EMail'] = $t->EMail;
					$d['Prov'] = $this->app_model->Cari_Prov($t->Kota);
					$d['Kota'] = $t->Kota;
					$d['WN'] = $t->WN;
					$d['BB'] = $t->BB;
					$d['TB'] = $t->TB;
					$d['GolDarah'] = $t->GolDarah;
					$d['Hobby'] = $t->Hobby;
					$d['Penyakit'] = $t->Penyakit;
					$d['AsalSek'] = $t->AsalSek;
					$d['NmAsalSek'] = $t->NmAsalSek;
					$d['NoIjazah'] = $t->NoIjazah;
					$d['IjTh'] = $t->IjTh;
					$d['IjJmlMP'] = $t->IjJmlMP;
					$d['IjJmlNilai'] = $t->IjJmlNilai;
					$d['NmAyah'] = $t->NmAyah;
					$d['KerjaAyah'] = $t->KerjaAyah;
					$d['HasilAyah'] = $t->HasilAyah;
					$d['PendAyah'] = $t->PendAyah;
					$d['NmIbu'] = $t->NmIbu;
					$d['KerjaIbu'] = $t->KerjaIbu;
					$d['HasilIbu'] = $t->HasilIbu;
					$d['PendIbu'] = $t->PendIbu;
					$d['NmWali'] = $t->NmWali;
					$d['AlamatWali'] = $t->AlamatWali;
					$d['HubWali'] = $t->HubWali;
					$d['Jur1'] = $t->Jur1;
					$d['Jur2'] = $t->Jur2;
					$d['Jur3'] = $t->Jur3;
				}
			}
			
			$d['content']= $this->load->view('peserta/formulir_isi',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}
	
	public function cetak(){
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$NoDaftar = $this->session->userdata('nim');
			$NoUjian = $this->app_model->CariNoUjian($NoDaftar);
			$d['NoDaftar'] = $this->session->userdata('nim');
			$d['NoUjian'] = $NoUjian;
			// ambil data dengan memanggil fungsi di model
			$data = $this->app_model->getSelectedData("mspcmb",$d);
			$num_rows = $data->num_rows();
		
			if($num_rows > 0) {
			  // memanggil (instantiasi) class reportProduct di file print_rekap_helper.php
			  $pdf=new reportProduct();
			  // anda dapat membuat report lainnya dalam satu file print_rekap_helper.php
			  // dengan cukup mengubah setKriteria dan membuat kondisi (elseif) di file print_rekap_helper.php
			  $pdf->setKriteria("transaksi");
			  // judul report
			  $pdf->setNama("DATA TRANSAKSI UNTUK BARANG ".$NoDaftar);
			  // buat halaman
			  $pdf->AliasNbPages();
			  // Potrait ukuran A4
			  $pdf->AddPage("P","A4");
				foreach($data->result() as $t){
					//Instanciation of inherited class
					$thA = $t->ThAjaran;
					//$th = $thA.'/'.$thA+1;
					$A4[0]=210;
					$A4[1]=297;
					$Q[0]=216;
					$Q[1]=279;
					//$pdf=new PDF('P','mm',$A4);
					//$pdf->Open();
					//$pdf->AliasNbPages();
					//$pdf->AddPage();
					$pdf->SetTitle('KARTU UJIAN CALOM MAHASISWA BARU'.$thA);
					$pdf->SetCreator('puskom.iainbanten.ac.id with fpdf');
					$pdf->SetLineWidth(.3);
					$pdf->SetXY(6,6);
					$pdf->Cell(96,120,'',1,0,'C');
					$pdf->Cell(6,120,'',0,0,'C');
					$pdf->Cell(96,120,'',1,1,'C');
					$pdf->Image(base_url().'asset/images/logo-iain2.jpg',8,8,15,15);
					$pdf->SetXY(6,8);
					$pdf->SetFont('Times','B',9);
					$pdf->Cell(96,4,'KARTU UJIAN',0,1,'C');
					$pdf->Ln();
					$pdf->SetFont('Times','B',8);
					$pdf->SetX(6);
					$pdf->Cell(96,3,'Penerimaan Calon Mahasiswa Baru (S1)',0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(96,3,'Institut Agama Islam Negeri',0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(96,3,'"Sultan Maulana Hasanuddin" Banten',0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(96,3,'Tahun Akademik '.$thA,0,1,'C');
					
					$pdf->Ln(10);
					$pdf->SetFont('Times','',8);
					$pdf->Cell(30,5,'Ruang Ujian',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->RUjian,0,1,'L',false);
					
					$pdf->Cell(30,5,'Nomor Ujian',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->SetFont('Times','B',8);
					$pdf->Cell(61,5,$t->NoUjian,0,1,'L',false);
					
					$pdf->SetFont('Times','',8);
					$pdf->Cell(30,5,'Nama',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->Nama,0,1,'L',false);
					
					$pdf->Cell(10,5,'Jurusan',0,0,'L',false);
					$pdf->Cell(20,5,'PIL.1',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->Jur1.'-'.$this->app_model->cari_jurusan($t->Jur1),0,1,'L',false);
					
					$pdf->Cell(10,5,'',0,0,'L',false);
					$pdf->Cell(20,5,'PIL.2',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->Jur2.'-'.$this->app_model->cari_jurusan($t->Jur2),0,1,'L',false);
					
					$pdf->Cell(10,5,'',0,0,'L',false);
					$pdf->Cell(20,5,'PIL.3',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->Jur3.'-'.$this->app_model->cari_jurusan($t->Jur3),0,1,'L',false);
					/*
					$pdf->Cell(10,5,'',0,0,'L',false);
					$pdf->Cell(20,5,'PIL.3',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$Jur3,0,1,'L',false);
					*/
					$pdf->Ln(10);
					$pdf->Cell(40,3,'',0,0);
					$pdf->Cell(56,3,'Serang, '.$this->app_model->tgl_indo($t->TglDaftar),0,1,'C');
					$pdf->Cell(40,3,'',0,0);
					$pdf->Cell(56,3,'Peserta,',0,1,'C');
					$pdf->Ln(20);
					$pdf->SetFont('','B');
					$pdf->Cell(40,2,'',0,0);
					$pdf->Cell(56,2,$t->Nama,0,1,'C');
					$pdf->Cell(40,2,'',0,0);
					$pdf->Cell(56,2,'-------------------------------------',0,1,'C');
					$pdf->Cell(40,2,'',0,0);
					$pdf->SetFont('','I');
					$pdf->Cell(56,2,'Nama Jelas & Tanda Tangan',0,1,'C');
					/*
					$pdf->SetXY(12,77);
					$pdf->SetLineWidth(.1);
					$pdf->Cell(35,43,'Pas Foto 4 x 6',1,1,'C');
					*/
					/*
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/foto/'.$t->foto;//'/path/to/image/mypic.jpg';
					//$config['create_thumb'] = TRUE;
					$config['maintain_ratio'] = TRUE;
					$config['width']	= 320;
					$config['height']	= 150;
					$this->load->library('image_lib', $config); 
					$foto = $this->image_lib->resize();
					*/
					$pdf->SetXY(12,77);
					$foto=$t->foto;
					if(empty($foto)){
						$pdf->SetLineWidth(.1);
						$pdf->Cell(35,43,'Pas Foto 4 x 6',1,1,'C');
					}else{
						$pdf->Image(base_url().'peserta/foto/'.$foto);
					}
					
					$pdf->SetXY(108,8);
					$pdf->SetFont('','B');
					$pdf->Cell(96,3,'JADWAL UJIAN',0,1,'C');
					$pdf->Ln(4);
					$pdf->SetFont('Arial','B',8);
					$pdf->SetX(108);
					$pdf->Cell(96,3,'TES TULIS',0,1,'C');
					$pdf->Ln(4);
					$pdf->SetFillColor(229,229,229);
					$pdf->SetFont('Helvetica','',7);
					$pdf->SetX(113);
					$pdf->Cell(84,3,'PROGRAM STRATA 1 (S1)',0,1,'L');
					$pdf->SetX(114);
					$pdf->SetFont('Helvetica','B',7);
					$pdf->Cell(5,5,'No',1,0,'C',true);
					$pdf->Cell(45,5,'Mata Ujian',1,0,'C',true);
					$pdf->Cell(17,5,'Tanggal',1,0,'C',true);
					$pdf->Cell(19,5,'Waktu',1,1,'C',true);
					$pdf->SetX(114);
					$pdf->SetFont('Helvetica','',7);
					$pdf->Cell(5,3,'1.','LR',0,'C');
					$pdf->Cell(45,3,'Pengetahuan Agama (Tafsir, Hadits, ','LR',0,'L');
					$pdf->Cell(17,3,'30 Juli 2013','LR',0,'L');
					$pdf->Cell(19,3,'08.00 s/d 10.00','LR',1,'C');
					$pdf->SetX(114);
					$pdf->Cell(5,3,'','LR',0,'C');
					$pdf->Cell(45,3,'Tauhid, Fiqh dan Sejarah ','LR',0,'L');
					$pdf->Cell(17,3,'','LR',0,'L');
					$pdf->Cell(19,3,'','LR',1,'C');
					$pdf->SetX(114);
					$pdf->Cell(5,3,'','LBR',0,'C');
					$pdf->Cell(45,3,'Kebudayaan Islam)','LBR',0,'L');
					$pdf->Cell(17,3,'','LBR',0,'L');
					$pdf->Cell(19,3,'','LBR',1,'C');
					$pdf->SetX(114);
					$pdf->Cell(5,3,'2.','LR',0,'C');
					$pdf->Cell(45,3,'Pengetahuan Umum (PPKn, Bhs. ','LR',0,'L');
					$pdf->Cell(17,3,'30 Juli 2013','LR',0,'L');
					$pdf->Cell(19,3,'10.30 s/d 12.30','LR',1,'C');
					$pdf->SetX(114);
					$pdf->Cell(5,3,'','LBR',0,'C');
					$pdf->Cell(45,3,'Indonesia, IPS, IPA, dan Matematika) ','LBR',0,'L');
					$pdf->Cell(17,3,'','LBR',0,'L');
					$pdf->Cell(19,3,'','LBR',1,'C');
					
					$pdf->SetX(114);
					$pdf->Cell(5,3,'3.','LBR',0,'C');
					$pdf->Cell(45,3,'Bahasa Arab','LBR',0,'L');
					$pdf->Cell(17,3,'31 Juli 2013','LBR',0,'L');
					$pdf->Cell(19,3,'08.00 s/d 10.00','LBR',1,'C');
					
					$pdf->SetX(114);
					$pdf->Cell(5,3,'4.','LBR',0,'C');
					$pdf->Cell(45,3,'Bahasa Inggris','LBR',0,'L');
					$pdf->Cell(17,3,'31 Juli 2013','LBR',0,'L');
					$pdf->Cell(19,3,'10.30 s/d 12.30','LBR',1,'C');
					
					$pdf->Ln(10);
					$pdf->SetX(108);
					$pdf->SetFont('Helvetica','B',7);
					$pdf->Cell(96,3,'TES LISAN',0,1,'C');
					$pdf->Ln(4);
					$pdf->SetX(113);
					$pdf->SetFont('Helvetica','',7);
					$pdf->Cell(84,3,'PROGRAM STRATA 1 (S1)',0,1,'L');
					$pdf->SetFillColor(229,229,229);
					$pdf->SetX(114);
					$pdf->SetFont('Helvetica','B',7);
					$pdf->Cell(5,5,'No',1,0,'C',true);
					$pdf->Cell(45,5,'Mata Ujian',1,0,'C',true);
					$pdf->Cell(17,5,'Tanggal',1,0,'C',true);
					$pdf->Cell(19,5,'Waktu',1,1,'C',true);
					
					$pdf->SetX(114);
					$pdf->SetFont('Helvetica','',7);
					$pdf->Cell(5,3,'1.','LBR',0,'C');
					$pdf->Cell(45,3,"Baca Tulis Al-Qur'an",'LBR',0,'L');
					$pdf->Cell(17,3,'01 Agst 2013','LBR',0,'L');
					$pdf->Cell(19,3,'09.00 s/d 11.00','LBR',1,'C');
					
					$pdf->Ln(12);
					
					$pdf->SetX(114);
					$pdf->Cell(40,3,'',0,0);
					$pdf->Cell(44,3,'Ketua Panitia PCMB 2013/2014',0,1,'C');
					$pdf->Ln(8);
					$pdf->SetX(114);
					$pdf->Cell(40,3,'',0,0);
					$pdf->Cell(44,3,'Ttd,',0,1,'C');
					$pdf->Ln(8);
					$pdf->SetX(114);
					$pdf->SetFont('Helvetica','BU',7);
					$pdf->Cell(40,3,'',0,0);
					$pdf->Cell(44,3,'Drs. H. Nadjmuddin, MM',0,1,'C');
					
					$pdf->Ln(15);
					$pdf->SetX(0);
					$pdf->SetFont('Times','I',7);
					$pdf->MultiCell(210,4,'--------------------------------------------------------------------------------------------------------------------- potong di sini ---------------------------------------------------------------------------------------------------------------------');
					
					$pdf->SetXY(6,140);
					$pdf->SetLineWidth(.3);
					$pdf->Cell(198,120,'',1,1);
					//$pdf->Image('../../images/logo-iain2.jpg',8,142,20,20);
					$pdf->SetXY(6,142);
					$pdf->SetFont('Times','B',10);
					$pdf->Cell(198,5,'TANDA BUKTI PENDAFTARAN',0,1,'C');
					$pdf->Ln(2);
					$pdf->SetX(6);
					$pdf->Cell(198,4,'Penerimaan Calon Mahasiswa Baru',0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(198,4,'Institut Agama Islam Negeri "Sultan Maulana Hasanuddin" Banten',0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(198,4,'Tahun Akademik '.$thA,0,1,'C');
					$pdf->SetLineWidth(.2);
					$pdf->Line(8,164,200,164);
					
					$pdf->Ln(10);
					$pdf->SetFont('Times','',10);
					$pdf->Cell(35,5,'Ruang Ujian',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->RUjian,0,1,'L',false);
					$pdf->Cell(35,5,'Nomor Ujian',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->SetFont('Times','B',10);
					$pdf->Cell(61,5,$t->NoUjian,0,1,'L',false);
					
					$pdf->SetFont('Times','',10);
					$pdf->Cell(35,5,'Nama',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->Nama,0,1,'L',false);
					
					$pdf->Cell(35,5,'Tempat/Tgl Lahir',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->TmptLhr.", ".$this->app_model->tgl_indo($t->TglLhr),0,1,'L',false);
					
					$pdf->Cell(35,5,'Asal Sekolah',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->AsalSek,0,1,'L',false);
					
					$pdf->Cell(35,5,'Nama Asal Sekolah',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->NmAsalSek,0,1,'L',false);
					
					$pdf->Cell(15,5,'Jurusan',0,0,'L',false);
					$pdf->Cell(20,5,'PIL.1',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->Jur1.'-'.$this->app_model->cari_jurusan($t->Jur1),0,1,'L',false);
					
					$pdf->Cell(15,5,'',0,0,'L',false);
					$pdf->Cell(20,5,'PIL.2',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->Jur2.'-'.$this->app_model->cari_jurusan($t->Jur2),0,1,'L',false);
					
					$pdf->Cell(15,5,'',0,0,'L',false);
					$pdf->Cell(20,5,'PIL.3',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->Jur3.'-'.$this->app_model->cari_jurusan($t->Jur3),0,1,'L',false);
					
					$pdf->Ln(10);
					$pdf->Cell(140,4,'',0,0);
					$pdf->Cell(56,4,'Serang, '.$this->app_model->tgl_indo($t->TglDaftar),0,1,'C');
					$pdf->Cell(140,4,'',0,0);
					$pdf->Cell(56,4,'Peserta,',0,1,'C');
					$pdf->Ln(15);
					$pdf->SetFont('','B');
					$pdf->Cell(140,2,'',0,0);
					$pdf->Cell(56,2,$t->Nama,0,1,'C');
					$pdf->Cell(140,2,'',0,0);
					$pdf->Cell(56,2,'-------------------------------------',0,1,'C');
					$pdf->Cell(140,2,'',0,0);
					$pdf->SetFont('','I');
					$pdf->Cell(56,2,'Nama Jelas & Tanda Tangan',0,1,'C');
				}
			  //$a->Output();
			  //$a->Image($file_foto,160,173,$new_w,$new_h);
	  			$pdf->Output('KARTU_UJIAN_S1_'.$NoDaftar.'.pdf','D');
			}else{
			  redirect('/peserta/home/selesai/');
			  //echo "data ewehan";
			}
			exit();
		}else{
			redirect('/peserta/home/logout/');
		}
	}
	
	public function logout(){
		$id['NoDaftar'] = $this->session->userdata('nim');
		$d['online'] = 'Offline';
		$this->app_model->updateData("mspcmb",$d,$id);
		$this->session->sess_destroy();
		redirect('/home/');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/login.php */