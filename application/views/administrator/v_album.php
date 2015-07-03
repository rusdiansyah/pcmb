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
<form name="form" action="<?php echo base_url();?>index.php/administrator/album/tambah" method="post">
<button type="submit" name="tambah" id="tambah" class="easyui-linkbutton" data-options="iconCls:'icon-add'">Tambah Data</button>
</form>
</p>
<table id="dataTable" width="100%">
<tr>
	<th>No</th>
    <th>Judul</th>
    <th>Jumlah<br />Foto</th>
    <th>Gambar</th>
    <th>Akif</th>
    <th>Edit</th>
</tr>
<?php
	if($data->num_rows()>0){
		$no =1+$hal;
		foreach($data->result_array() as $db){  
		$jml_foto = $this->app_model->getJmlFoto($db['id_album']);
		?>    
    	<tr>
			<td align="center" width="20"><?php echo $no; ?></td>
            <td ><?php echo $db['jdl_album']; ?></td>
            <td align="center" width="50" ><?php echo $jml_foto; ?></td>
            <td align="left" width="200"><?php echo $db['gbr_album']; ?></td>
            <td align="center" width="50">
            <a href="<?php echo base_url();?>index.php/administrator/album/aktif/<?php echo $db['id_album'];?>/<?php echo $db['aktif'];?>">
			<?php echo $db['aktif'];?>
			</a>
            </td>
            <td align="center" width="50">
            <a href="<?php echo base_url();?>index.php/administrator/album/edit/<?php echo $db['id_album'];?>">
			<img src="<?php echo base_url();?>asset/images/ed.png" title='Edit'>
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