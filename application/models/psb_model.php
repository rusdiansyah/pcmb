<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Psb_model extends CI_Model {

	/**
	 * @author : Deddy Rusdiansyah
	 * @web : http://deddyrusdiansyah.blogspot.com
	 * @keterangan : Model untuk menangani semua query database aplikasi
	 **/
	
	public function menu_profil(){
		$hasil = $this->db->query("SELECT * FROM halamanstatis");
		return $hasil;
	}
	
	public function sekilasinfo(){
		$hasil = $this->db->query("SELECT * FROM sekilasinfo ORDER BY tgl_posting LIMIT 10");
		return $hasil;
	}
	
	public function bahan_pokok(){
		$hasil = $this->db->query("SELECT * FROM bahan_pokok ORDER BY tglinsert DESC LIMIT 10");
		return $hasil;
	}
	
	public function pengunjung(){
		$ip = $_SERVER['REMOTE_ADDR'];
		$tanggal = date("Ymd");
        $waktu   = time();
		
		$text = "SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'";
		$stat = $this->app_model->manualQuery($text);
		$row = $stat->num_rows();
		if($row>0){
			$this->app_model->manualQuery("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
		}else{
			$this->app_model->manualQuery("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
		}
		//$hasil = $this->app_model->manualQuery("SELECT sum(hits) as total FROM statistik"); 
		$hasil = $this->db->query("SELECT COUNT(hits) as total FROM statistik");
		foreach($hasil->result() as $dt){
			$totalpengunjung=$dt->total;
		}
		
		$hasil = $totalpengunjung;
		/*
		$d["ip"] = $ip;
		$d["browser"] = $this->agent->browser();
		$d["os"] = $this->agent->platform();
		*/
		return $hasil;
	}
	
	public function pengunjung_hari_ini(){
		$tanggal = date("Ymd");
		$data       = $this->db->query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip");
		$hasil = $data->num_rows();
		return $hasil;
	}
	public function online(){
		$bataswaktu       = time() - 300;
        $data = $this->db->query("SELECT * FROM statistik WHERE online > '$bataswaktu'");
		$hasil = $data->num_rows();
		return $hasil;
	}
	
	public function ip_address(){
		$ip = $_SERVER['REMOTE_ADDR'];
		return $ip;
	}
}
	
/* End of file app_model.php */
/* Location: ./application/models/app_model.php */