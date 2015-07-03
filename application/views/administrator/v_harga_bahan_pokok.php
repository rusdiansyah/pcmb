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
<form name="form" action="<?php echo base_url();?>index.php/administrator/harga_bahan_pokok/tambah" method="post">
<button type="submit" name="tambah" id="tambah" class="easyui-linkbutton" data-options="iconCls:'icon-add'">Tambah Data</button>
<a href="<?php echo base_url();?>index.php/administrator/harga_bahan_pokok">
<button type="button" name="fil" id="fil" class="easyui-linkbutton" data-options="iconCls:'icon-reload'">Refresh</button>
</a>
</form>
</div>
<div style="float:right">
<form name="form" action="<?php echo base_url();?>index.php/administrator/harga_bahan_pokok/filter" method="post">
	Filter Bahan Pokok : <select name="filter" id="filter" style="height:20px;">
    <?php 
	if(empty($filter)){
	?>
    <option value="">-Pilih-</option>
    <?php
	}
	foreach($l_bp->result_array() as $a){
		if($filter==$a['id_bp']){
	?>
    <option value="<?php echo $a['id_bp'];?>" selected="selected"><?php echo $a['nama_bp'];?></option>
	<?php
		}else{
	?>
    <option value="<?php echo $a['id_bp'];?>"><?php echo $a['nama_bp'];?></option>
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
    <th>Bahan Pokok</th>
    <th>Satuan</th>
    <th>Tanggal</th>
    <th>Harga</th>
    <th>Aksi</th>
</tr>
<?php
	if($data->num_rows()>0){
		$no =1+$hal;
		foreach($data->result_array() as $db){
			$jenis = '';//$this->app_model->bahan_pokok($db['id_bp']); 
			$bp = $this->app_model->bahan_pokok($db['id_bp']); 
			$satuan = $this->app_model->satuan($db['id_bp']); 
			$tgl = $this->app_model->tgl_indo($db['tanggal']); 
		?>    
    	<tr>
			<td align="center" width="7"><?php echo $no; ?></td>
            <td valign="top"><?php echo $bp; ?></td>
            <td valign="top"><?php echo $satuan; ?></td>
            <td valign="top"><?php echo $tgl; ?></td>
            <td align="center"><?php echo number_format($db['harga']); ?></td>
            <td align="center">
            <a href="<?php echo base_url();?>index.php/administrator/harga_bahan_pokok/edit/<?php echo $db['id_harga'];?>">
			<img src="<?php echo base_url();?>asset/images/ed.png" title='Ubah'>
			</a>
            <a href="<?php echo base_url();?>index.php/administrator/harga_bahan_pokok/hapus/<?php echo $db['id_harga'];?>"
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