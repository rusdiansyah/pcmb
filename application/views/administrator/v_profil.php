<script type="text/javascript">
$(function() {
	$("#dataTable tr:even").addClass("stripe1");
	$("#dataTable tr:odd").addClass("stripe2");
	$("#dataTable tr").hover(
		function() {
			$(this).toggleClass("highlight");
		},
		function() {
			$(this).toggleClass("highlight");
		}
	);
});
</script>
<p>
<form name="form" action="<?php echo base_url();?>index.php/administrator/profil/tambah" method="post">
<button type="submit" name="tambah" id="tambah" class="easyui-linkbutton" data-options="iconCls:'icon-add'">Tambah Data</button>
</form>
</p>
<table id="dataTable" width="100%">
<tr>
	<th>No</th>
    <th>Judul</th>
    <th>Isi</th>
    <th>Tanggal Posting</th>
    <th>Gambar</th>
    <th>Aksi</th>
</tr>
<?php
	if($data->num_rows()>0){
		$no =1+$hal;
		foreach($data->result_array() as $db){  
		$tgl = $this->app_model->tgl_indo($db['tgl_posting']); 
		$isi_berita = strip_tags($db['isi_halaman']);  
		$isi = substr($isi_berita,0,130);
		?>    
    	<tr>
			<td align="center"><?php echo $no; ?></td>
            <td ><?php echo $db['judul']; ?></td>
            <td ><?php echo $isi; ?></td>
			<td align="center"><?php echo $tgl; ?></td>
            <td align="left"><?php echo $db['gambar']; ?></td>
            <td align="center">
            <a href="<?php echo base_url();?>index.php/administrator/profil/edit/<?php echo $db['id_halaman'];?>">
			<img src="<?php echo base_url();?>asset/images/ed.png" title='Ubah'>
			</a>
            <a href="<?php echo base_url();?>index.php/administrator/profil/hapus/<?php echo $db['id_halaman'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
			<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
    </tr>
    <?php
		$no++;
		}
	}else{
	?>
    	<tr>
        	<td colspan="5" align="center" >Tidak Ada Data</td>
        </tr>
    <?php	
	}
?>
</table>
<?php echo "<table align='center'><tr><td>".$paginator."</td></tr></table>"; ?>