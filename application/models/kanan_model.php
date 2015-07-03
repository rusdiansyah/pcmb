<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kanan_model extends CI_Model {

	/**
	 * @author : Deddy Rusdiansyah
	 * @web : http://deddyrusdiansyah.blogspot.com
	 * @keterangan : Model untuk menangani semua query database aplikasi
	 **/
	
	public function kanan_berita(){
		$hasil = $this->db->query("SELECT * FROM berita ORDER BY id_berita DESC LIMIT 5");
		return $hasil;
	}
	public function kanan_agenda(){
		$hasil = $this->db->query("SELECT * FROM agenda ORDER BY id_agenda DESC LIMIT 5");
		return $hasil;
	}
	public function kanan_foto(){
		$hasil = $this->db->query("SELECT * FROM gallery ORDER BY id_gallery DESC LIMIT 7");
		return $hasil;
	}
	public function kanan_link(){
		$hasil = $this->db->query("SELECT * FROM banner ORDER BY id_banner DESC ");
		return $hasil;
	}
	
	public function jmlfoto($id){
		$d = $this->db->query("SELECT count(*) as jml FROM gallery WHERE id_album='$id'");
		$r = $d->num_rows();
		if($r>0){
		foreach($d->result() as $t){
			$hasil = $t->jml;
		}
		}else{
			$hasil=0;
		}
		return $hasil;
	}
}
	
/* End of file app_model.php */
/* Location: ./application/models/app_model.php */