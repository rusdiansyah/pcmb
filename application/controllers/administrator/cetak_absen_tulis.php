<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cetak_absen_tulis extends CI_Controller {
	/**
	 * @author : Deddy Rusdiansyah,S.Kom
	 * @keterangan : Controller untuk halaman awal ketika aplikasi  diakses
	 **/
	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="DAFTAR HADIR UJIAN TERTULIS";
			
			$d['content']= $this->load->view('administrator/cetak_absen_tulis/view',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('/administrator/login/login/');
		}
	}
	

	public function cetak(){
		$tahun = $this->uri->segment(4);
		$thak = $tahun.'/'.$tahun+1;
		$ruang = $this->uri->segment(5);
		
		$data = $this->db->query("SELECT * FROM mspcmb WHERE ThAjaran='".$tahun."' AND RUjian='".$ruang."'");
		if($data->num_rows()>0){
		//Instanciation of inherited class
		
		$pdf = new reportProduct();
		$pdf->setKriteria("krs");
		$pdf->setNama("DAFTAR HADIR TERTULIS ".$tahun);
		$pdf->Open();
		$pdf->AliasNbPages();
		$pdf->AddPage("P","A4");
		
		/*
		$A4[0]=210;
		$A4[1]=297;
		$F4[0]=210;
		$F4[1]=330;
		$Q[0]=216;
		$Q[1]=279;
		$pdf=new PDF('P','mm',$F4);
		$pdf->Open();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		*/
		$pdf->SetTitle('DAFTAR PESERTA PMB TAHUN AKADEMIK '.$thak);
		$pdf->SetFont('arial','B',12);
		$pdf->Cell(0,5,'DAFTAR HADIR UJIAN TERTULIS PMB',0,1,'C');
		$pdf->Cell(0,5,'TAHUN AKADEMIK '.$thak,0,1,'C');
		$pdf->Ln(5);
		$pdf->SetFont('arial','',11);
		$pdf->Cell(171,5,'Jenjang : S2',0,0,'L');
		$pdf->SetLineWidth(.3);
		$pdf->Cell(20,5,' R   :   '.$ruang,1,1,'C');
		$pdf->Ln(1);
	  
		$pdf->SetFont('arial','B',11);
		$pdf->SetFillColor(229,229,229);
		$pdf->Cell(8,10,'No.',1,0,'C',true);
		$pdf->Cell(18,10,'No Ujian',1,0,'C',true);
		$pdf->Cell(85,10,'Nama',1,0,'C',true);
		$pdf->Cell(80,5,'Tanda Tangan',1,1,'C',true);
		$pdf->SetXY(121,36);
		$pdf->SetFont('arial','',9);
		$pdf->Cell(40,5,'Peng.Agama',1,0,'C',true);
		$pdf->Cell(40,5,'Peng.Umum',1,1,'C',true);
		$pdf->Ln(1);
		$pdf->SetFont('arial','',11);
		$pdf->SetLineWidth(.1);
		//$pdf->FancyTable($baris_data);
		/**awal **/
		//$w=array(10,25,80,20,25,30);
		$w=array(8,18,85,40,40);
		$isi_data = $this->app_model->manualQuery("SELECT * FROM mspcmb 
				WHERE ThAjaran='".$tahun."' 
				AND RUjian='".$ruang."'");
		$rec = $isi_data->result();
		  $n=0;
		  $fill=false;
		  foreach($rec as $r)
		  {
			$pdf->SetFillColor(229,229,229);
			$n++;
				$pdf->Cell($w[0],9,$n,0,0,'C',$fill);
				$pdf->Cell($w[1],9,$r->NoUjian,0,0,'C',$fill);
				$pdf->Cell($w[2],9,$r->Nama,0,0,'L',$fill);
				$pdf->Cell($w[3],9,'',0,0,'C',$fill);
				$pdf->Cell($w[4],9,'',0,0,'L',$fill);
				$pdf->Ln();  
		  }
		  $pdf->Cell(array_sum($w),0,'','T');
		/** terakhir **/
		
		$pdf->Ln(2);
		$pdf->Cell(0,10,'Serang, ____________________ 2012',0,1,'R');
		$pdf->SetFont('arial','',11);
		$pdf->Cell(95,5,'Peng. Agama','LTR',0);
		$pdf->Cell(96,5,'','LTR',1);
		$pdf->Cell(95,10,' ','LR',0);
		$pdf->Cell(96,10,' ','LR',1);
		$pdf->Cell(95,7,'Pengawas I  : __________________________','LBR',0,'C');
		$pdf->Cell(96,7,'Pengawas II : __________________________','LBR',1,'C');
		$pdf->Ln(3);
		$pdf->Cell(95,5,'Peng. Umum','LTR',0);
		$pdf->Cell(96,5,'','LTR',1);
		$pdf->Cell(95,10,' ','LR',0);
		$pdf->Cell(96,10,' ','LR',1);
		$pdf->Cell(95,7,'Pengawas I  : __________________________','LBR',0,'C');
		$pdf->Cell(96,7,'Pengawas II : __________________________','LBR',1,'C');
		
		//Second Page
		$pdf->AddPage();
		$pdf->SetFont('arial','B',12);
		$pdf->Cell(0,5,'DAFTAR HADIR UJIAN TERTULIS PMB',0,1,'C');
		$pdf->Cell(0,5,'TAHUN AKADEMIK '.$thak,0,1,'C');
		$pdf->Ln(5);
		$pdf->SetFont('arial','',11);
		$pdf->Cell(171,5,'Jenjang : S2',0,0,'L');
		$pdf->SetLineWidth(.3);
		$pdf->Cell(20,5,' R   :   '.$ruang,1,1,'C');
		$pdf->Ln(1);
	  
		$pdf->SetFont('arial','B',11);
		$pdf->SetFillColor(229,229,229);
		$pdf->Cell(8,10,'No.',1,0,'C',true);
		$pdf->Cell(18,10,'No Ujian',1,0,'C',true);
		$pdf->Cell(85,10,'Nama',1,0,'C',true);
		$pdf->Cell(80,5,'Tanda Tangan',1,1,'C',true);
		$pdf->SetXY(121,36);
		$pdf->SetFont('arial','',9);
		$pdf->Cell(40,5,'Bhs. Arab',1,0,'C',true);
		$pdf->Cell(40,5,'Bhs. Inggris',1,1,'C',true);
		$pdf->Ln(1);
		$pdf->SetFont('arial','',11);
		$pdf->SetLineWidth(.1);
		//$pdf->FancyTable($baris_data);
		$w=array(8,18,85,40,40);
	    //$pdf->SetFillColor(229,229,229);
		
		$isi_data = $this->app_model->manualQuery("SELECT * FROM mspcmb 
				WHERE ThAjaran='".$tahun."' 
				AND RUjian='".$ruang."'");
		$rec = $isi_data->result();
		  $n=0;
		  $fill=false;
		  foreach($rec as $r)
		  {
			$n++;
				$pdf->Cell($w[0],9,$n,0,0,'C',$fill);
				$pdf->Cell($w[1],9,$r->NoUjian,0,0,'C',$fill);
				$pdf->Cell($w[2],9,$r->Nama,0,0,'L',$fill);
				$pdf->Cell($w[3],9,'',0,0,'C',$fill);
				$pdf->Cell($w[4],9,'',0,0,'L',$fill);
				$pdf->Ln();  
		  }
		  $pdf->Cell(array_sum($w),0,'','T');
		$pdf->Ln(2);
		$pdf->Cell(0,10,'Serang, ____________________ 2012',0,1,'R');
		$pdf->SetFont('arial','',11);
		$pdf->Cell(95,5,'Bhs. Arab','LTR',0);
		$pdf->Cell(96,5,'','LTR',1);
		$pdf->Cell(95,10,' ','LR',0);
		$pdf->Cell(96,10,' ','LR',1);
		$pdf->Cell(95,7,'Pengawas I  : __________________________','LBR',0,'C');
		$pdf->Cell(96,7,'Pengawas II : __________________________','LBR',1,'C');
		$pdf->Ln(3);
		$pdf->Cell(95,5,'Bhs. Inggris','LTR',0);
		$pdf->Cell(96,5,'','LTR',1);
		$pdf->Cell(95,10,' ','LR',0);
		$pdf->Cell(96,10,' ','LR',1);
		$pdf->Cell(95,7,'Pengawas I  : __________________________','LBR',0,'C');
		$pdf->Cell(96,7,'Pengawas II : __________________________','LBR',1,'C');
		
		$pdf->Output(str_replace(' ','_',strtoupper($tahun).'_PCMB_RUANG-'.$ruang.'.pdf'),'D');
		}else{
			echo "Tidak Ada data";
		}
	}
	
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */