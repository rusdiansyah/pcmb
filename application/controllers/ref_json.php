<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ref_json extends CI_Controller {

	/**
	 * @keterangan : Controller untuk halaman profil
	 **/
	public function tes(){
		$this->db = $this->load->database('iain',true);
		$text = "SELECT * FROM tagihan_mhs_btn WHERE kode_bayar='PMB' ";
		$data = $this->app_model->manualQuery($text);
		foreach($data->result()as $t){
			echo $t->nim."<br>";
		}
	}
	
	public function List_Jurusan()
	{
			$id = $this->input->post('id');
			
			$text = "SELECT * FROM tbjurusan WHERE Fak='$id' AND tampil='Ya' ORDER BY kd_jur_baru";
			$d = $this->app_model->manualQuery($text);
			echo "<table class='table table-bordered table-striped table-hover'>
				<thead>
				<tr>
					<th>No</th>
					<th>Nama Program Studi</th>
				</tr>
				</thead>
				<tbody>";
			$no=1;
			foreach($d->result_array() as $t){
				echo "<tr>
					<td class='span1'><center>$no</center></td>
					<td>$t[jur_baru]</td>
					</tr>";
				$no++;
			}
			echo "</tbody></table>";
	}

	public function List_Kota()
	{
			$id = $this->input->post('id');
			$text = "SELECT * FROM kab_kota WHERE id_provinsi='$id'";
			$d = $this->app_model->manualQuery($text);
			foreach($d->result_array() as $t){
			?>
				<option value="<?php echo $t['kab_kota'];?>"><?php echo $t['kab_kota'];?></option>";
			<?php
            }
	}
	
	public function cari_lulusan()
	{
			$id = $this->input->post('noujian');
			$tahun = "2013/2014";
			$text = "SELECT * FROM lulus_pcmb WHERE tahun='$tahun' AND noujian='$id'";
			$data = $this->app_model->manualQuery($text);
			$row = $data->num_rows();
			if($row>0){
				foreach($data->result() as $t){
					echo "<div class='alert alert-success'>
					Nomor Ujian : $id <br>
					Nama : ".$this->app_model->cari_nama($id)."<br><br>
					<center><strong>SELAMAT Anda DITERIMA di</strong><br>
					<strong>".$t->jurusan."</strong><br>".
					$this->app_model->cari_jurusan($t->jurusan)."<br>
					".$this->app_model->cari_fakultas($t->jurusan)."
					</center></div>";
				}
			}else{
				$nama = $this->app_model->cari_nama($id);
				if(empty($nama)){
				echo "<div class='alert alert-danger'>
					<center><strong>Nomor Ujian Salah</strong><br>
					Silahkan Cek Kembali Nomor Ujian Anda.</center>
					</div>";	
				}else{
				echo "<div class='alert alert-danger'>
					Nomor Ujian : $id <br>
					Nama : ".$this->app_model->cari_nama($id)."<br><br>
					<center><strong>Anda TIDAK LULUS</strong></center><br>
					</div>";
				}
			}
	}

}

/* End of file profil.php */
/* Location: ./application/controllers/profil.php */