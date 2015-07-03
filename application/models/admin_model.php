<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Model extends CI_Model {

	/**
	 * @author : Deddy Rusdiansyah
	 * @web : http://deddyrusdiansyah.blogspot.com
	 * @keterangan : Model untuk menangani semua query database aplikasi
	 **/
	
	public function getAllData($table)
	{
		return $this->db->get($table);
	}
	
	public function getAllDataLimited($table,$limit,$offset)
	{
		return $this->db->get($table, $limit, $offset);
	}
	
	public function getSelectedDataLimited($table,$data,$limit,$offset)
	{
		return $this->db->get_where($table, $data, $limit, $offset);
	}
		
	//select table
	public function getSelectedData($table,$data)
	{
		return $this->db->get_where($table, $data);
	}
	
	//update table
	function updateData($table,$data,$field_key)
	{
		$this->db->update($table,$data,$field_key);
	}
	function deleteData($table,$data)
	{
		$this->db->delete($table,$data);
	}
	
	function insertData($table,$data)
	{
		$this->db->insert($table,$data);
	}
	
	//Query manual
	function manualQuery($q)
	{
		return $this->db->query($q);
	}
	
	public function npu($nomor){
		$data = $this->db->query("SELECT * FROM nilai_pu WHERE nomor='$nomor'");
		$row = $data->num_rows();
		if($row>0){
			foreach($data->result() as $t){
				$nilai = $t->nilai;
			}
		}else{
			$nilai = 0;
		}
		return $nilai;
	}
	
	public function npa($nomor){
		$data = $this->db->query("SELECT * FROM nilai_pa WHERE nomor='$nomor'");
		$row = $data->num_rows();
		if($row>0){
			foreach($data->result() as $t){
				$nilai = $t->nilai;
			}
		}else{
			$nilai = 0;
		}
		return $nilai;
	}
	
	public function nba($nomor){
		$data = $this->db->query("SELECT * FROM nilai_ba WHERE nomor='$nomor'");
		$row = $data->num_rows();
		if($row>0){
			foreach($data->result() as $t){
				$nilai = $t->nilai;
			}
		}else{
			$nilai = 0;
		}
		return $nilai;
	}
	
	public function nbi($nomor){
		$data = $this->db->query("SELECT * FROM nilai_bi WHERE nomor='$nomor'");
		$row = $data->num_rows();
		if($row>0){
			foreach($data->result() as $t){
				$nilai = $t->nilai;
			}
		}else{
			$nilai = 0;
		}
		return $nilai;
	}
	
	public function nwa($nomor){
		$data = $this->db->query("SELECT * FROM nilai_wa WHERE nomor='$nomor'");
		$row = $data->num_rows();
		if($row>0){
			foreach($data->result() as $t){
				$nilai = $t->nilai;
			}
		}else{
			$nilai = 0;
		}
		return $nilai;
	}
	
	public function tahun(){
		$hasil = $this->db->query("SELECT ThAjaran FROM mspcmb GROUP BY ThAjaran");
		return $hasil;
	}
	
	public function ruang(){
		$hasil = $this->db->query("SELECT RUjian FROM mspcmb GROUP BY RUjian");
		return $hasil;
	}
	
	public function list_kode_bayar(){
		$this->db = $this->load->database('iain',true);
		$hasil = $this->db->query("SELECT kode_bayar FROM kode_bayar");
		return $hasil;
	}
	
	public function list_tahun(){
		$this->db = $this->load->database('iain',true);
		$hasil = $this->db->query("SELECT tahun FROM tagihan_mhs_btn GROUP BY tahun");
		return $hasil;
	}
	public function list_flag(){
		$this->db = $this->load->database('iain',true);
		$hasil = $this->db->query("SELECT flag_status_H2H FROM tagihan_mhs_btn GROUP BY flag_status_H2H");
		return $hasil;
	}
	public function list_prodi(){
		$hasil = $this->db->query("SELECT sing FROM tbjurusan");
		return $hasil;
	}
	public function list_provinsi(){
		$hasil = $this->db->query("SELECT * FROM provinsi");
		return $hasil;
	}
	public function list_ruang(){
		$hasil = $this->db->query("SELECT RUjian FROM mspcmb GROUP BY RUjian");
		return $hasil;
	}
	
	public function cari_fakultas($id){
		$q = $this->db->query("SELECT * FROM tbjurusan WHERE sing='$id'");
		$r = $q->num_rows();
		if($r>0){
			foreach($q->result() as $t){
				$hasil= $t->fak_btn;
			}
		}else{
			$hasil = 0;
		}
		return $hasil;
	}
	
	public function nama_jurusan($id){
		$q = $this->db->query("SELECT * FROM tbjurusan WHERE sing_baru='$id'");
		$r = $q->num_rows();
		if($r>0){
			foreach($q->result() as $t){
				$hasil= $t->jur_baru;
			}
		}else{
			$hasil = 0;
		}
		return $hasil;
	}
	
	public function cari_tgh($id){
		//$dbmssql = $this->load->database('default',TRUE); 
		
		$q = $this->db->query("SELECT * FROM kode_bayar WHERE kode_bayar='$id'");
		$r = $q->num_rows();
		if($r>0){
			foreach($q->result() as $t){
				$hasil= $t->tagihan_xx;
			}
		}else{
			$hasil = 0;
		}
		return $hasil;
	}
	//Konversi tanggal
	public function tgl_sql($date){
		$exp = explode('-',$date);
		if(count($exp) == 3) {
			$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
		}
		return $date;
	}
	public function tgl_str($date){
		$exp = explode('-',$date);
		if(count($exp) == 3) {
			$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
		}
		return $date;
	}
	
	public function tgl_sql_easyui($date){
		$exp = explode('/',$date);
		if(count($exp) == 3) {
			$date = $exp[2].'-'.$exp[0].'-'.$exp[1];
		}
		return $date;
	}
	
	public function ambilTgl($tgl){
		$exp = explode('-',$tgl);
		$tgl = $exp[2];
		return $tgl;
	}
	
	public function ambilBln($tgl){
		$exp = explode('-',$tgl);
		$tgl = $exp[1];
		$bln = $this->app_model->getBulan($tgl);
		$hasil = substr($bln,0,3);
		return $hasil;
	}
	
	public function tgl_indo($tgl){
			$jam = substr($tgl,11,10);
			$tgl = substr($tgl,0,10);
			$tanggal = substr($tgl,8,2);
			$bulan = $this->app_model->getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun.' '.$jam;		 
	}	

	public function getBulan($bln){
		switch ($bln){
			case 1: 
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	} 
	
	public function hari_ini($hari){
		date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
		$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
		//$hari = date("w");
		$hari_ini = $seminggu[$hari];
		return $hari_ini;
	}
	
	//query login
	public function getLoginData($usr,$psw)
	{
		$u = mysql_real_escape_string($usr);
		$p = mysql_real_escape_string(md5($psw));
		$q_cek_login = $this->db->get_where('users', array('username' => $u, 'password' => $p));
		if(count($q_cek_login->result())>0)	
		{
			foreach($q_cek_login->result() as $qck)
			{
					foreach($q_cek_login->result() as $qad)
					{
						$sess_data['logged_in'] = 'getLoginH2H';
						$sess_data['username'] = $qad->username;
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'index.php/home');
			}
		}else{
			$this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah. Atau akun Anda diblokir');
			header('location:'.base_url().'index.php/login');
		}
	}
	
	public function grafik_pilihan1($jur){
		$sql = $this->db->query("SELECT Jur1,ThAjaran FROM mspcmb WHERE Jur1='$jur'");
		$hasil = $sql->num_rows();
		return $hasil;
	}
	public function grafik_pilihan2($jur){
		$sql = $this->db->query("SELECT Jur2,ThAjaran FROM mspcmb WHERE Jur2='$jur'");
		$hasil = $sql->num_rows();
		return $hasil;
	}
	public function grafik_pilihan3($jur){
		$sql = $this->db->query("SELECT Jur3,ThAjaran FROM mspcmb WHERE Jur3='$jur'");
		$hasil = $sql->num_rows();
		return $hasil;
	}
	public function grafik_sex($sex){
		$sql = $this->db->query("SELECT JK,ThAjaran FROM mspcmb WHERE JK='$sex'");
		$hasil = $sql->num_rows();
		return $hasil;
	}
	public function grafik_kota($id){
		$sql = $this->db->query("SELECT Kota,ThAjaran FROM mspcmb WHERE Kota='$id'");
		$hasil = $sql->num_rows();
		return $hasil;
	}
	
	public function grafik_asal_sekolah($id){
		$sql = $this->db->query("SELECT AsalSek FROM mspcmb WHERE AsalSek='$id'");
		$hasil = $sql->num_rows();
		return $hasil;
	}
	
	public function grafik_pendidikan_ayah($id){
		$sql = $this->db->query("SELECT PendAyah FROM mspcmb WHERE PendAyah='$id'");
		$hasil = $sql->num_rows();
		return $hasil;
	}
	
	public function grafik_pendidikan_ibu($id){
		$sql = $this->db->query("SELECT PendIbu FROM mspcmb WHERE PendIbu='$id'");
		$hasil = $sql->num_rows();
		return $hasil;
	}
	
	public function grafik_pekerjaan_ayah($id){
		$sql = $this->db->query("SELECT KerjaAyah FROM mspcmb WHERE KerjaAyah='$id'");
		$hasil = $sql->num_rows();
		return $hasil;
	}
	
	public function grafik_pekerjaan_ibu($id){
		$sql = $this->db->query("SELECT KerjaIbu FROM mspcmb WHERE KerjaIbu='$id'");
		$hasil = $sql->num_rows();
		return $hasil;
	}
	
	public function grafik_penghasilan_ayah($id){
		$sql = $this->db->query("SELECT HasilAyah FROM mspcmb WHERE HasilAyah='$id'");
		$hasil = $sql->num_rows();
		return $hasil;
	}
	
	public function grafik_penghasilan_ibu($id){
		$sql = $this->db->query("SELECT HasilIbu FROM mspcmb WHERE HasilIbu='$id'");
		$hasil = $sql->num_rows();
		return $hasil;
	}
}
	
/* End of file app_model.php */
/* Location: ./application/models/app_model.php */