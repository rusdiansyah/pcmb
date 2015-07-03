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
<div style="float:left">
<a href="<?php echo base_url();?>index.php/administrator/berita/tambah">
<button type="button" name="tambah" id="tambah" class="easyui-linkbutton" data-options="iconCls:'icon-add'">Tambah Data</button>
</a>
<a href="<?php echo base_url();?>index.php/administrator/berita">
<button type="button" name="tambah" id="tambah" class="easyui-linkbutton" data-options="iconCls:'icon-reload'">Refresh</button>
</a>
</div>
<div style="float:right">
<form action="<?php echo base_url();?>index.php/administrator/berita" method="post">
Pencarian : <input type="text" name="cari" id="cari" size="50" />
<button type="submit" class="easyui-linkbutton" data-options="iconCls:'icon-search'">Cari</button>
</form>
</div>

<table id="dataTable" width="100%">
<tr>
	<th>No</th>
    <th>Judul</th>
    <th>Isi</th>
    <th>Tanggal Posting</th>
    <th>Headline</th>
    <th>Aksi</th>
</tr>
<?php
	if($data->num_rows()>0){
		$no =1+$hal;
		foreach($data->result_array() as $db){  
		$tgl = $this->app_model->tgl_indo($db['tanggal']); 
		$isi_berita = strip_tags($db['isi_berita']);  
		$isi = substr($isi_berita,0,160);
		?>    
    	<tr>
			<td align="center" width="5"><?php echo $no; ?></td>
            <td valign="top" width="260"><?php echo $db['judul']; ?></td>
            <td valign="top" ><?php echo $isi; ?></td>
			<td align="center" width="100"><?php echo $tgl; ?></td>
            <td align="center"><?php echo $db['headline']; ?></td>
            <td align="center">
            <a href="<?php echo base_url();?>index.php/administrator/berita/edit/<?php echo $db['id_berita'];?>">
			<img src="<?php echo base_url();?>asset/images/ed.png" title='Ubah'>
			</a>
            <a href="<?php echo base_url();?>index.php/administrator/berita/hapus/<?php echo $db['id_berita'];?>"
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