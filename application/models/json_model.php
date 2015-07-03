<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Json_Model extends CI_Model {
	/**
	 * @author : 
	 * @keterangan : Model untuk menangani semua query database aplikasi
	 **/
	public function getJson_pengguna()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'username'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		
		$offset = ($page-1) * $rows;
		$where = " WHERE username LIKE '%$cari%' OR nama_lengkap LIKE '%$cari%'"; 
		$text = "SELECT * FROM users
			$where 
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM users $where")->num_rows();
		$row = array();	
		$criteria = $this->db->query($text);
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'username'=>$data['username'],
				'passwrod'=>$data['password'],
				'nama_lengkap'=>$data['nama_lengkap']
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}
	public function getJson_provinsi()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'provinsi'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		
		$offset = ($page-1) * $rows;
		$where = " WHERE provinsi LIKE '%$cari%'"; 
		$text = "SELECT * FROM provinsi
			$where 
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM provinsi $where")->num_rows();
		$row = array();	
		$criteria = $this->db->query($text);
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'id_provinsi'=>$data['id_provinsi'],
				'provinsi'=>$data['provinsi']
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}
	
	public function getJson_prodi()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'KdJur'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		
		$offset = ($page-1) * $rows;
		$where = " WHERE Jur LIKE '%$cari%' AND sing LIKE '%$cari%'"; 
		$text = "SELECT * FROM tbjurusan
			$where 
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM tbjurusan $where")->num_rows();
		$row = array();	
		$criteria = $this->db->query($text);
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'KdJur'=>$data['KdJur'],
				'sing'=>$data['sing'],
				'Jur'=>$data['Jur'],
				'Fak'=>$data['Fak']
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}
	
	public function getJson_kota()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id_provinsi'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		
		$offset = ($page-1) * $rows;
		$where = " WHERE kab_kota LIKE '%$cari%' AND id_provinsi LIKE '%$cari%'"; 
		$text = "SELECT * FROM kab_kota
			$where 
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM kab_kota $where ")->num_rows();
		$row = array();	
		$criteria = $this->db->query($text);
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'id_kab_kota'=>$data['id_kab_kota'],
				'id_provinsi'=>$data['id_provinsi'],
				'kab_kota'=>$data['kab_kota']
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}
	
	public function getJson_Pekerjaan()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'KdKerjaOrtu'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		
		$offset = ($page-1) * $rows;
		$where = " WHERE KerjaOrtu LIKE '%$cari%'"; 
		$text = "SELECT * FROM tbkerjaortu
			$where 
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM tbkerjaortu $where ")->num_rows();
		$row = array();	
		$criteria = $this->db->query($text);
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'KdKerjaOrtu'=>$data['KdKerjaOrtu'],
				'KerjaOrtu'=>$data['KerjaOrtu']
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}
	
	public function getJson_Penghasilan()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'KdHasilOrtu'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		
		$offset = ($page-1) * $rows;
		$where = " WHERE Penghasilan LIKE '%$cari%'"; 
		$text = "SELECT * FROM tbpenghasilanortu
			$where 
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM tbpenghasilanortu $where ")->num_rows();
		$row = array();	
		$criteria = $this->db->query($text);
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'KdHasilOrtu'=>$data['KdHasilOrtu'],
				'Penghasilan'=>$data['Penghasilan']
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}
	public function getJson_Pendidikan()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'KdPendOrtu'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		
		$offset = ($page-1) * $rows;
		$where = " WHERE Pendidikan LIKE '%$cari%'"; 
		$text = "SELECT * FROM tbpendidikanortu
			$where 
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM tbpendidikanortu $where ")->num_rows();
		$row = array();	
		$criteria = $this->db->query($text);
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'KdPendOrtu'=>$data['KdPendOrtu'],
				'Pendidikan'=>$data['Pendidikan']
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}
	
	public function getJson_KODEBAYAR()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		
		$offset = ($page-1) * $rows;
		
		$where = " WHERE kode_bayar LIKE '%$cari%' OR nama_bayar LIKE '%$cari%'"; //
		
		$text = "SELECT * FROM kode_bayar
			$where 
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM kode_bayar")->num_rows();
		$row = array();	
		
		$criteria = $this->db->query($text);
		
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'kode_bayar'=>$data['kode_bayar'],
				'nama_bayar'=>$data['nama_bayar']
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}
	
	public function getJson_data_beli()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'tglbeli'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		$cari_tgl = isset($_POST['cari_tgl']) ? $_POST['cari_tgl'] : '';
		
		$offset = ($page-1) * $rows;
		
		$tahun = date('Y');
		
		$where = "WHERE tahun='$tahun'";
		if(!empty($cari)){
			$where .= "  AND nisn LIKE '%$cari%' OR nama LIKE '%$cari%'"; //
		}elseif(!empty($cari_tgl)){
			$tgl = $this->app_model->tgl_sql($cari_tgl);
			$where .= " AND tglbeli ='$tgl'"; //
		}
		
		$text = "SELECT * FROM beli_formulir
			$where 
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM beli_formulir $where")->num_rows();
		$row = array();	
		
		$criteria = $this->db->query($text);
		
		foreach($criteria->result_array() as $data)
		{	
			$tgl = $this->app_model->tgl_sql($data['tglbeli']);
			$row[] = array(
				'tglbeli'=>$tgl,
				'nisn'=>$data['nisn'],
				'nama'=>$data['nama'],
				'no_hp'=>$data['no_hp'],
				'pin'=>$data['pin'],
				'tahun'=>$data['tahun']
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}
	
	public function getJson_data_PMB()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'NoUjian'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		$cari_tgl = isset($_POST['cari_tgl']) ? $_POST['cari_tgl'] : '';
		$cari_prodi = isset($_POST['cari_prodi']) ? $_POST['cari_prodi'] : '';
		$cari_ruang = isset($_POST['cari_ruang']) ? $_POST['cari_ruang'] : '';
		
		$offset = ($page-1) * $rows;
		if(!empty($cari)){
			$where = " WHERE NoDaftar LIKE '%$cari%' OR Nama LIKE '%$cari%'"; //
		}elseif(!empty($cari_tgl)){
			$tgl = $this->app_model->tgl_sql($cari_tgl);
			$where = " WHERE TglDaftar ='$tgl'"; //
		}elseif(!empty($cari_prodi)){
			$where = " WHERE Jur1 ='$cari_prodi'"; //
		}elseif(!empty($cari_ruang)){
			$where = " WHERE RUjian ='$cari_ruang'"; //		
		}else{
			$where = " "; //
		}
		
		$text = "SELECT * FROM mspcmb
			$where 
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM mspcmb $where")->num_rows();
		$row = array();	
		$criteria = $this->db->query($text);
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'NoDaftar'=>$data['NoDaftar'],
				'NoUjian'=>$data['NoUjian'],
				'ThAjaran'=>$data['ThAjaran'],
				'TglDaftar'=>$this->app_model->tgl_indo($data['TglDaftar']),
				'Nama'=>$data['Nama'],
				'JK'=>$data['JK'],
				'Jur1'=>$data['Jur1'],
				'Jur2'=>$data['Jur2'],
				'RUjian'=>$data['RUjian'],
				'foto'=>$data['foto'],
				'file_ijazah'=>$data['file_ijazah']
				
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}
	
	public function getJson_singkron()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'tanggal_bayar'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$cari = isset($_POST['cari']) ? $_POST['cari'] : '';
		
		$offset = ($page-1) * $rows;
		//$where = " WHERE nim LIKE '%$cari%' OR nama LIKE '%$cari%'"; 
		//$cari = '24-05-2013';
		$tgl = $this->app_model->tgl_sql($cari);
		$where = " WHERE tanggal_bayar ='$tgl'"; //
		
		$text = "SELECT * FROM tagihan_mhs_btn
			$where 
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM tagihan_mhs_btn $where")->num_rows();
		$row = array();	
		
		$criteria = $this->db->query($text);
		
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'nim'=>$data['nim'],
				'nama'=>$data['nama'],
				'angkatan'=>$data['angkatan'],
				'kode_bayar'=>$data['kode_bayar'],
				'pin'=>$data['pin'],
				'tahun'=>$data['tahun'],
				'jml_tarif'=>number_format($data['jml_tarif']),
				'flag_status'=>$data['flag_status'],
				'flag_status_H2H'=>$data['flag_status_H2H'],
				'tanggal_bayar'=>$this->app_model->tgl_indo($data['tanggal_bayar'])
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}
		
	
}
	
/* End of file app_model.php */
/* Location: ./application/models/app_model.php */