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
<table id="dataTable" width="100%">
<tr>
	<th>No</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Subjek</th>
    <th>Tanggal</th>
    <th>Balas</th>
    <th>Tanggal Balas</th>
    <th>Hapus</th>
</tr>
<?php
	if($data->num_rows()>0){
		$no =1+$hal;
		foreach($data->result_array() as $db){  
		$tgl = $this->app_model->tgl_indo($db['tanggal']); 
		$tgl_balas = $this->app_model->tgl_indo($db['tgl_balas']); 
		?>    
    	<tr>
			<td align="center" width="30"><?php echo $no; ?></td>
            <td ><?php echo $db['nama']; ?></td>
            <td ><?php echo $db['email']; ?></td>
            <td ><?php echo $db['subjek']; ?></td>
			<td align="center"><?php echo $tgl; ?></td>
            <td align="center" width="30">
            <a href="<?php echo base_url();?>index.php/administrator/hubungi/balas/<?php echo $db['id_hubungi'];?>">
			<img src="<?php echo base_url();?>asset/images/pesan.png" title='Ubah'>
			</a>
            </td>
            <td align="center"><?php echo $tgl_balas; ?></td>
            <td align="center" width="30">
            <a href="<?php echo base_url();?>index.php/administrator/hubungi/hapus/<?php echo $db['id_hubungi'];?>"
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