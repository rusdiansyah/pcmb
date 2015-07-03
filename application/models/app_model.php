<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_Model extends CI_Model {

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
	
	public function Cari_Prov($id){
		$data = $this->db->query("SELECT * 
						FROM kab_kota as a 
						JOIN provinsi as b
						ON a.id_provinsi = b.id_provinsi
						WHERE kab_kota LIKE '%KAB. ACEH SELATAN%'");
		$row = $data->num_rows();
		if($row>0){
			foreach($data->result()as $t){
				$hasil = $t->provinsi;
			}
		}else{
			$hasil ='';
		}
		return $hasil;
	}
	
	public function cari_nama($id){
		$data = $this->db->query("SELECT * FROM mspcmb WHERE NoUjian='$id'");
		$row = $data->num_rows();
		if($row>0){
			foreach($data->result()as $t){
				$hasil = $t->Nama;
			}
		}else{
			$hasil ='';
		}
		return $hasil;
	}
	
	public function cek_foto($id){
		$data = $this->db->query("SELECT * FROM mspcmb WHERE NoDaftar='$id'");
		$row = $data->num_rows();
		if($row>0){
			foreach($data->result()as $t){
				$hasil = $t->foto;
			}
		}else{
			$hasil ='';
		}
		return $hasil;
	}
	
	public function cari_jurusan($id){
		$data = $this->db->query("SELECT * FROM tbjurusan WHERE sing_baru='$id'");
		$row = $data->num_rows();
		if($row>0){
			foreach($data->result()as $t){
				$hasil = $t->jur_baru;
			}
		}else{
			$hasil ='LULUS TIDAK TERTAMPUNG (LTT)<br>Silahkan Hubungi Akademik Rektorat';
		}
		return $hasil;
	}
	public function cari_fakultas($id){
		$data = $this->db->query("SELECT * FROM tbjurusan WHERE sing_baru='$id'");
		$row = $data->num_rows();
		if($row>0){
			foreach($data->result()as $t){
				$hasil = $t->Fak;
			}
		}else{
			$hasil ='';
		}
		return $hasil;
	}
	
	public function MaxNoUjian($tahun){
		$th = substr($tahun,2,2);
		$data = $this->db->query("SELECT MAX(NoUjian) as no FROM mspcmb WHERE ThAjaran='$tahun'");
		$row=$data->num_rows();
		if($row>0){
			foreach($data->result() as $t){
				$no = $t->no; 
				$tmp = ((int) substr($no,4,4))+1;
				$hasil = $th.'1'.sprintf("%04s", $tmp);
			}
		}else{
			$hasil = $th.'1'.'0001';
		}
		return $hasil;
	}
	public function RuangUjian($th){
		$kap = $this->config->item('kapasitas_ruang');

		$data = $this->db->query("SELECT MAX(NoUjian) as no FROM mspcmb WHERE ThAjaran='$th'");
		$row=$data->num_rows();
		foreach($data->result() as $t){
			$no = $t->no; 
			$no_akhir = ((int) substr($no,4,4))+1;
			$hasil = ($no_akhir - ($no_akhir % $kap))/$kap + 1;
			if ($no_akhir % $kap==0){
			  $hasil -=1;  
			}
		}	
		return $hasil;
	}
	
	public function CariNoUjian($daftar){
		$data = $this->db->query("SELECT * FROM mspcmb WHERE NoDaftar='$daftar'");
		$row=$data->num_rows();
		if($row>0){
			foreach($data->result() as $t){
				$hasil = $t->NoUjian;
			}
		}else{
			$hasil = '';
		}
		return $hasil;
	}
	
	public function CariRuangUjian($daftar){
		$data = $this->db->query("SELECT * FROM mspcmb WHERE NoDaftar='$daftar'");
		$row=$data->num_rows();
		if($row>0){
			foreach($data->result() as $t){
				$hasil = $t->RUjian;
			}
		}else{
			$hasil = '';
		}
		return $hasil;
	}
	
	//query login peserta
	public function getLoginPeserta($usr,$psw)
	{
		$u = mysql_real_escape_string($usr);
		$p = mysql_real_escape_string($psw);

		$q_cek_login = $this->db->get_where('beli_formulir', array('nisn' => $u, 'pin' => $p));
		if(count($q_cek_login->result())>0)
		{
			foreach($q_cek_login->result() as $qck)
			{
					foreach($q_cek_login->result() as $qad)
					{
						$sess_data['logged_in'] = 'aingLoginPesertaYeuh';
						$sess_data['nim'] = $qad->nisn;
						$sess_data['nama'] = $qad->nama;
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'index.php/peserta/home');
			}
		}
		else
		{
			$this->session->set_flashdata('result_login', '<br>No NIM atau Kode Akses yang anda masukkan salah.');
			header('location:'.base_url().'index.php/home');
		}
	}

	//query login
	public function getLoginAdmin($usr,$psw)
	{
		$u = mysql_real_escape_string($usr);
		$p = md5(mysql_real_escape_string($psw));
		$q_cek_login = $this->db->get_where('users', array('username' => $u, 'password' => $p));
		if(count($q_cek_login->result())>0)
		{
			foreach($q_cek_login->result() as $qck)
			{
					foreach($q_cek_login->result() as $qad)
					{
						$sess_data['logged_in'] = 'aingLoginWebAdministrator';
						$sess_data['username'] = $qad->username;
						$sess_data['nama_lengkap'] = $qad->nama_lengkap;
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'index.php/administrator/home');
			}
		}
		else
		{
			$this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
			header('location:'.base_url().'index.php/administrator/login');
		}
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

	
	/* Tanggal dan Jam */
	public function Jam_Now(){
		date_default_timezone_set("Asia/Jakarta");
   		$jam = date("H:i:s"); 
   		
		return $jam;
		//echo "$jam WIB";
	}
	
	public function Hari_Bulan_Indo(){
		date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
		$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum\'at","Sabtu");
		$hari = date("w");
		$hari_ini = $seminggu[$hari];
		
		return $hari_ini;
	}
	
	public function tgl_indo($tanggal){
			date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
			$tgl = $tanggal; //date("Y m d");
			$tanggal = substr($tgl,8,2);
			$bulan = $this->app_model->getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;		 
	}
	
	public function tgl_now_indo(){
			date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
			$tgl = date("Y m d");
			$tanggal = substr($tgl,8,2);
			$bulan = $this->app_model->getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;		 
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
	
	/*fungsi terbilang*/
	public function bilang($x) {
		$x = abs($x);
		$angka = array("", "satu", "dua", "tiga", "empat", "lima",
		"enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$result = "";
		if ($x <12) {
			$result = " ". $angka[$x];
		} else if ($x <20) {
			$result = $this->app_model->bilang($x - 10). " belas";
		} else if ($x <100) {
			$result = $this->app_model->bilang($x/10)." puluh". $this->app_model->bilang($x % 10);
		} else if ($x <200) {
			$result = " seratus" . $this->app_model->bilang($x - 100);
		} else if ($x <1000) {
			$result = $this->app_model->bilang($x/100) . " ratus" . $this->app_model->bilang($x % 100);
		} else if ($x <2000) {
			$result = " seribu" . $this->app_model->bilang($x - 1000);
		} else if ($x <1000000) {
			$result = $this->app_model->bilang($x/1000) . " ribu" . $this->app_model->bilang($x % 1000);
		} else if ($x <1000000000) {
			$result = $this->app_model->bilang($x/1000000) . " juta" . $this->app_model->bilang($x % 1000000);
		} else if ($x <1000000000000) {
			$result = $this->app_model->bilang($x/1000000000) . " milyar" . $this->app_model->bilang(fmod($x,1000000000));
		} else if ($x <1000000000000000) {
			$result = $this->app_model->bilang($x/1000000000000) . " trilyun" . $this->app_model->bilang(fmod($x,1000000000000));
		}      
			return $result;
	}
	public function terbilang($x, $style=4) {
		if($x<0) {
			$hasil = "minus ". trim($this->app_model->bilang($x));
		} else {
			$hasil = trim($this->app_model->bilang($x));
		}      
		switch ($style) {
			case 1:
				$hasil = strtoupper($hasil);
				break;
			case 2:
				$hasil = strtolower($hasil);
				break;
			case 3:
				$hasil = ucwords($hasil);
				break;
			default:
				$hasil = ucfirst($hasil);
				break;
		}      
		return $hasil;
	}
}
	
/* End of file app_model.php */
/* Location: ./application/models/app_model.php */