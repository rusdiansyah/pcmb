<table class="table table-bordered table-striped table-hover" width="70%">
<tbody>
<tr>
	<td colspan="2"><b>A. Data Pribadi</b></td>
</tr>    
<tr>
	<td class="span4">No Daftar</td>
	<td>: <?php echo $NoDaftar;?></td>
</tr>
<tr>
	<td class="span4">No Ujian</td>
	<td>: <?php echo $NoUjian;?></td>
</tr>
<tr>
	<td class="span4">Pilihan 1 Jurusan</td>
	<td>: <?php echo $Jur1;?></td>
</tr>
<tr>
	<td class="span4">Pilihan 2 Jurusan</td>
	<td>: <b><?php echo $Jur2;?></b></td>
</tr>
<tr>
	<td class="span4">Nama Lengkap *)</td>
	<td>: <b><?php echo $Nama;?></b></td>
</tr>
<tr>
	<td>Tempat Lahir</td>
	<td>: <?php echo $TmptLhr;?></td>
</tr>
<tr>
	<td>Tanggal Lahir</td>
	<td>: <?php echo $TglLhr;?></td>
</tr>
<tr>
	<td>Jenis Kelamin</td>
	<td>: <?php if($JK=='L'){
				echo 'Laki-laki';
	}else{
		echo 'Perempuan';
	};?></td>
</tr>
<tr>	
	<td>Alamat</td>
	<td>: <?php echo $Alamat1;?><br />
		<?php echo $Alamat2;?>
	</td>
</tr>
<tr>	
	<td>Provinsi</td>
	<td></td>
</tr>
<tr>	
	<td>Kota</td>
	<td>: <?php echo $Kota;?>
	</td>
</tr>
<tr>
	<td>Telepon/HP</td>
	<td>: <?php echo $Telp;?></td>
</tr>
<tr>	
	<td>Email</td>
	<td>: <?php echo $EMail;?></td>
</tr>
<tr>	
	<td>Warga Negara</td>
	<td>: <?php echo $WN;?>
	</td>
</tr>
<tr>	
	<td>Golongan Darah</td>
	<td>: <?php echo $GolDarah;?>
	</td>
</tr>
<tr>	
	<td>Hobby</td>
	<td>: <?php echo $Hobby;?></td>
</tr>
<tr>	
	<td>Penyakit Yang Derita</td>
	<td>: <?php echo $Penyakit;?></td>
</tr>
<tr>	
	<td>Asal Sekolah</td>
	<td>: <?php echo $AsalSek;?>
	</td>
</tr>
<tr>	
	<td>Nama Sekolah</td>
	<td>: <?php echo $NmAsalSek;?></td>
</tr>
<tr>	
	<td>No Ijazah</td>
	<td>: <?php echo $NoIjazah;?></td>
</tr>
<tr>	
	<td>Tahun Ijazah</td>
	<td>: <?php echo $IjTh;?></td>
</tr>
<tr>	
	<td>Jumlah Mata Pelajaran dalam Ijazah</td>
	<td>: <?php echo $IjJmlMP;?></td>
</tr>
<tr>	
	<td>Jumlah Nilai dalam Ijazah</td>
	<td>: <?php echo $IjJmlNilai;?></td>
</tr>
<tr>
	<td colspan="2"><b>B. Data Orang Tua</b></td>
</tr>    
<tr>	
	<td>Nama Ayah</td>
	<td>: <?php echo $NmAyah;?></td>
</tr>
<tr>	
	<td>Pekerjaan Ayah</td>
	<td>: <?php echo $KerjaAyah;?>
	</td>
</tr>
<tr>	
	<td>Penghasilan Ayah</td>
	<td>: <?php echo $HasilAyah;?>
	</td>
</tr>
<tr>	
	<td>Pendidikan Ayah</td>
	<td>: <?php echo $PendAyah;?>
	</td>
</tr>
<tr>	
	<td>Nama Ibu</td>
	<td>: <?php echo $NmIbu;?></td>
</tr>
<tr>	
	<td>Pekerjaan Ibu</td>
	<td>: <?php echo $KerjaIbu;?>
	</td>
</tr>
<tr>	
	<td>Penghasilan Ibu</td>
	<td>: <?php echo $HasilIbu;?>
	</td>
</tr>
<tr>	
	<td>Pendidikan Ibu</td>
	<td>: <?php echo $PendIbu;?>
	</td>
</tr>
<tr>	
	<td>Nama Wali</td>
	<td>: <?php echo $NmWali;?></td>
</tr
><tr>	
	<td>Alamat Wali</td>
	<td>: <?php echo $AlamatWali;?></td>
</tr>	
<tr>	
	<td>Hubungan Wali</td>
	<td>: <?php echo $HubWali;?></td>
</tr>
<tr>	
	<td>Survey</td>
	<td>: <?php echo $Survey;?></td>
</tr>
<tr>	
	<td valign="top">Foto</td>
	<td valign="top">: <?php echo $foto;?><br />
    <img src="<?php echo base_url();?>peserta/foto/<?php echo $foto;?>" />
    </td>
</tr>
</tbody>
</table>