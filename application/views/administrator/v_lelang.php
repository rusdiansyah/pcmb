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
<a href="<?php echo base_url();?>index.php/administrator/lelang/tambah">
<button type="button" name="tambah" id="tambah" class="easyui-linkbutton" data-options="iconCls:'icon-add'">Tambah Data</button>
</a>
<a href="<?php echo base_url();?>index.php/administrator/lelang">
<button type="button" name="tambah" id="tambah" class="easyui-linkbutton" data-options="iconCls:'icon-reload'">Refresh</button>
</a>
</div>
<div style="float:right">
<form action="<?php echo base_url();?>index.php/administrator/lelang" method="post">
Pencarian : <input type="text" name="cari" id="cari" size="50" />
<button type="submit" class="easyui-linkbutton" data-options="iconCls:'icon-search'">Cari</button>
</form>
</div>

<table id="dataTable" width="100%">
<tr>
	<th>No</th>
    <th>Nama Kegiatan</th>
    <th>Nilai</th>
    <th>Tanggal Posting</th>
    <th>Dibaca</th>
    <th>Aksi</th>
</tr>
<?php
	if($data->num_rows()>0){
		$no =1+$hal;
		foreach($data->result_array() as $db){  
		$tgl = $this->app_model->tgl_indo($db['tanggal']); 
		$nilai = number_format($db['nilai']);		
		?>    
    	<tr>
			<td align="center" width="5"><?php echo $no; ?></td>
            <td valign="top" ><?php echo $db['nama_kegiatan']; ?></td>
            <td align="right" width="160"><?php echo $nilai; ?></td>
			<td align="center" width="100"><?php echo $tgl; ?></td>
            <td align="center"><?php echo $db['dibaca']; ?></td>
            <td align="center">
            <a href="<?php echo base_url();?>index.php/administrator/lelang/edit/<?php echo $db['id_lelang'];?>">
			<img src="<?php echo base_url();?>asset/images/ed.png" title='Ubah'>
			</a>
            <a href="<?php echo base_url();?>index.php/administrator/lelang/hapus/<?php echo $db['id_lelang'];?>"
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