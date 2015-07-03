<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_beli extends CI_Controller {

	/**
	 * @author : Deddy Rusdiansyah,S.Kom
	 * @keterangan : Controller untuk halaman awal ketika aplikasi  diakses
	 **/
	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Data Pembelian Formulir";
			
			$d['content']= $this->load->view('administrator/data_beli/view',$d,true);
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
				echo $this->json_model->getJson_data_beli();
			else
				$this->load->view('administrator/data_beli/view');
		}else{
			redirect('/administrator/login/login/');
		}
	}
	
	public function tambah()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Input Pembelian Formulir";
			
			$d['content']= $this->load->view('administrator/data_beli/form',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('/administrator/login/login/');
		}
	}
	
	public function simpan()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
				
				$petugas = $this->session->userdata('nama_lengkap');
				
				$table = "beli_formulir";
				$id['nisn'] = $this->input->post('nisn');
				$id['tahun'] = date('Y');
				
				$up['nisn'] = $this->input->post('nisn');
				$up['nama'] = $this->input->post('nama');
				$up['no_hp'] = $this->input->post('no_hp');
				$up['biaya'] = $this->input->post('biaya');
				$up['tglbeli'] = date('Y-m-d');
				$up['tahun'] = date('Y');
				$up['pin'] = rand(0, 99999999);
				$up['petugas'] = $petugas;
			
				$hasil = $this->app_model->getSelectedData($table,$id);
				$row = $hasil->num_rows();
				if($row>0){
					//$this->app_model->updateData($table,$up,$id);
					echo "NISN sudah pernah di membeli Formulir";
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
	
	public function cari_nisn()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
				
			$id = $this->input->post('nisn');
			
			$text = "SELECT * FROM beli_formulir WHERE nisn='$id'";
			
			$tabel = $this->app_model->manualQuery($text);
			$row = $tabel->num_rows();
			if($row>0){
				foreach($tabel->result() as $t){
					$data['nama'] = $t->nama;
					$data['no_hp'] = $t->no_hp;
					echo json_encode($data);
				}
			}else{
				$data['nama'] = '';
				  $data['no_hp'] = '';
				echo json_encode($data);
			}
		}else{
				redirect('/administrator/login/login/');
		}
	}
	
	public function cetak(){
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$nisn = $this->uri->segment(4);//'123456';//$this->input->post('nim');
			$d['nisn'] = $nisn;
			$thA = $this->config->item('thak');
			
			
			// ambil data dengan memanggil fungsi di model
			$data = $this->app_model->getSelectedData("beli_formulir",$d);
			$num_rows = $data->num_rows();
		
			if($num_rows > 0) {
			  
			  $pdf=new reportProduct();
			  $pdf->setKriteria("transaksi");
			  $pdf->setNama("TANDA TERIMA PENDAFTARAN PCMB ".$nisn);
			  $pdf->AliasNbPages();
			  $pdf->AddPage("P","A4");
				foreach($data->result() as $t){
					//Instanciation of inherited class
					//$thA = $t->ThAjaran;
					//$th = $thA.'/'.$thA+1;
					$A4[0]=210;
					$A4[1]=297;
					$Q[0]=216;
					$Q[1]=279;
					//$pdf=new PDF('P','mm',$A4);
					//$pdf->Open();
					//$pdf->AliasNbPages();
					//$pdf->AddPage();
					$pdf->SetXY(6,6);
					$pdf->SetLineWidth(.3);
					$pdf->Cell(198,100,'',1,1);
					//$pdf->Image('../../images/logo-iain2.jpg',8,142,20,20);
					$pdf->SetXY(6,8);
					$pdf->SetFont('Times','B',10);
					$pdf->Cell(198,5,'KWITANSI PEMBELIAN FORMULIR',0,1,'C');
					$pdf->Ln(2);
					$pdf->SetX(6);
					$pdf->Cell(198,4,'Penerimaan Calon Mahasiswa Baru',0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(198,4,$this->config->item('nama_instansi'),0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(198,4,'Tahun Akademik '.$thA,0,1,'C');
					$pdf->SetLineWidth(.2);
					$pdf->Line(8,30,200,30);
					
					$pdf->Ln(10);
					$pdf->SetFont('Times','',10);
					$pdf->Cell(35,5,'NISN',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->nisn,0,1,'L',false);
					
					$pdf->SetFont('Times','',10);
					$pdf->Cell(35,5,'Nama',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->nama,0,1,'L',false);
					
					$pdf->Cell(35,5,'No.HP',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->no_hp,0,1,'L',false);
					
					$pdf->Cell(35,5,'PIN',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->pin,0,1,'L',false);
					
					$pdf->Cell(35,5,'Biaya',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,'Rp. '.number_format($t->biaya).'( Dua Ratus Ribu Rupiah )',0,1,'L',false);
					
					
					$pdf->Ln(10);
					$pdf->Cell(140,4,'',0,0);
					$pdf->Cell(56,4,'Serang, '.$this->app_model->tgl_indo($t->tglbeli),0,1,'C');
					$pdf->Cell(140,4,'',0,0);
					$pdf->Cell(56,4,'Petugas,',0,1,'C');
					$pdf->Ln(15);
					$pdf->SetFont('','B');
					$pdf->Cell(140,2,'',0,0);
					$pdf->Cell(56,2,$t->petugas,0,1,'C');
					$pdf->Cell(140,2,'',0,0);
					$pdf->Cell(56,2,'-------------------------------------',0,1,'C');
					$pdf->Cell(140,2,'',0,0);
					$pdf->SetFont('','I');
					$pdf->Cell(56,2,'Nama Jelas & Tanda Tangan',0,1,'C');
					
					
					
					$pdf->Ln(10);
					$pdf->SetX(0);
					$pdf->SetFont('Times','I',7);
					$pdf->MultiCell(210,4,'--------------------------------------------------------------------------------------------------------------------- potong di sini ---------------------------------------------------------------------------------------------------------------------');
					
					$pdf->SetXY(6,120);
					$pdf->SetLineWidth(.3);
					$pdf->Cell(198,100,'',1,1);
					//$pdf->Image('../../images/logo-iain2.jpg',8,142,20,20);
					
					$pdf->SetXY(6,122);
					$pdf->SetFont('Times','B',10);
					$pdf->Cell(198,5,'KWITANSI PEMBELIAN FORMULIR',0,1,'C');
					$pdf->Ln(2);
					$pdf->SetX(6);
					$pdf->Cell(198,4,'Penerimaan Calon Mahasiswa Baru',0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(198,4,$this->config->item('nama_instansi'),0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(198,4,'Tahun Akademik '.$thA,0,1,'C');
					$pdf->SetLineWidth(.2);
					$pdf->Line(8,144,200,144);
					
					$pdf->Ln(10);
					$pdf->SetFont('Times','',10);
					$pdf->Cell(35,5,'NISN',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->nisn,0,1,'L',false);
					
					$pdf->SetFont('Times','',10);
					$pdf->Cell(35,5,'Nama',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->nama,0,1,'L',false);
					
					$pdf->Cell(35,5,'No.HP',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->no_hp,0,1,'L',false);
					
					$pdf->Cell(35,5,'PIN',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->pin,0,1,'L',false);
					
					$pdf->Cell(35,5,'Biaya',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,'Rp. '.number_format($t->biaya).'( Dua Ratus Ribu Rupiah )',0,1,'L',false);
					
					
					$pdf->Ln(10);
					$pdf->Cell(140,4,'',0,0);
					$pdf->Cell(56,4,'Serang, '.$this->app_model->tgl_indo($t->tglbeli),0,1,'C');
					$pdf->Cell(140,4,'',0,0);
					$pdf->Cell(56,4,'Petugas,',0,1,'C');
					$pdf->Ln(15);
					$pdf->SetFont('','B');
					$pdf->Cell(140,2,'',0,0);
					$pdf->Cell(56,2,$t->petugas,0,1,'C');
					$pdf->Cell(140,2,'',0,0);
					$pdf->Cell(56,2,'-------------------------------------',0,1,'C');
					$pdf->Cell(140,2,'',0,0);
					$pdf->SetFont('','I');
					$pdf->Cell(56,2,'Nama Jelas & Tanda Tangan',0,1,'C');
				}
			  //$a->Output();
			  //$a->Image($file_foto,160,173,$new_w,$new_h);
	  			$pdf->Output('KWITANSI_FORMULIR_'.$nisn.'.pdf','D');
			}else{
			  redirect('/administrator/home/selesai/');
			  //echo "data ewehan";
			}
			exit();
		}else{
			redirect('/administrator/home/logout/');
		}
	}
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */