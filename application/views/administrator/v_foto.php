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
	
	$("#filter").change(function(){
		var id = $("#filter").val();
		window.location='<?php echo base_url();?>index.php/administrator/foto/filter/'+id;
	});
	
});
</script>
<div >
<div style="float:left">
<form name="form" action="<?php echo base_url();?>index.php/administrator/foto/tambah" method="post">
<button type="submit" name="tambah" id="tambah" class="easyui-linkbutton" data-options="iconCls:'icon-add'">Tambah Data</button>
<a href="<?php echo base_url();?>index.php/administrator/foto">
<button type="button" name="fil" id="fil" class="easyui-linkbutton" data-options="iconCls:'icon-reload'">Refresh</button>
</a>
</form>
</div>
<div style="float:right">
	Filter Album : <select name="filter" id="filter" style="height:20px;">
    <option value="">-Pilih-</option>
    <?php
	foreach($album->result_array() as $a){
	?>
    <option value="<?php echo $a['id_album'];?>"><?php echo $a['jdl_album'];?></option>
	<?php
	}
	?>
    </select>
</div>
</div>

<table id="dataTable" width="100%">
<tr>
	<th>No</th>
    <th>Album</th>
    <th>Judul Foto</th>
    <th>Gambar</th>
    <th>Aksi</th>
</tr>
<?php
	if($data->num_rows()>0){
		$no =1+$hal;
		foreach($data->result_array() as $db){  
		?>    
    	<tr>
			<td align="center" width="20"><?php echo $no; ?></td>
            <td ><?php echo $db['jdl_album']; ?></td>
            <td align="left" ><?php echo $db['jdl_gallery']; ?></td>
            <td align="left" width="200"><?php echo $db['gbr_gallery']; ?></td>
            <td align="center" width="50">
            <a href="<?php echo base_url();?>index.php/administrator/foto/edit/<?php echo $db['id_gallery'];?>">
			<img src="<?php echo base_url();?>asset/images/ed.png" title='Edit'>
			</a>
            <a href="<?php echo base_url();?>index.php/administrator/foto/hapus/<?php echo $db['id_gallery'];?>">
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