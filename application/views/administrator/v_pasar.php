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
<div>
<div style="float:left">
<form name="form" action="<?php echo base_url();?>index.php/administrator/pasar/tambah" method="post">
<button type="submit" name="tambah" id="tambah" class="easyui-linkbutton" data-options="iconCls:'icon-add'">Tambah Data</button>
<a href="<?php echo base_url();?>index.php/administrator/pasar">
<button type="button" name="fil" id="fil" class="easyui-linkbutton" data-options="iconCls:'icon-reload'">Refresh</button>
</a>
</form>
</div>
<div style="float:right">
<form name="form" action="<?php echo base_url();?>index.php/administrator/pasar/filter" method="post">
	Filter Kota : <select name="filter" id="filter" style="height:20px;">
    <?php 
	if(empty($filter)){
	?>
    <option value="">-Pilih-</option>
    <?php
	}
	foreach($l_kota->result_array() as $a){
		if($filter==$a['id_kota']){
	?>
    <option value="<?php echo $a['id_kota'];?>" selected="selected"><?php echo $a['kota'];?></option>
	<?php
		}else{
	?>
    <option value="<?php echo $a['id_kota'];?>"><?php echo $a['kota'];?></option>
    <?php		
		}
	}
	?>
    </select>
<button type="submit" name="cmbfilter" id="cmbfilter" class="easyui-linkbutton" data-options="iconCls:'icon-search'">Filter</button>
</form>    
</div>
</div>
<table id="dataTable" width="100%">
<tr>
	<th>No</th>
    <th>Kab/Kota</th>
    <th>Kecamatan</th>
    <th>Pasar</th>
    <th>Aksi</th>
</tr>
<?php
	if($data->num_rows()>0){
		$no =1+$hal;
		foreach($data->result_array() as $db){
			$kota =$this->app_model->kota($db['id_kota']); 
			$kec = $this->app_model->kec($db['id_kec']);
		?>    
    	<tr>
			<td align="center" width="7"><?php echo $no; ?></td>
            <td valign="top"><?php echo $kota; ?></td>
            <td valign="top"><?php echo $kec; ?></td>
            <td valign="top"><?php echo $db['nama_pasar']; ?></td>
            <td align="center">
            <a href="<?php echo base_url();?>index.php/administrator/pasar/edit/<?php echo $db['id_pasar'];?>">
			<img src="<?php echo base_url();?>asset/images/ed.png" title='Ubah'>
			</a>
            <a href="<?php echo base_url();?>index.php/administrator/pasar/hapus/<?php echo $db['id_pasar'];?>"
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