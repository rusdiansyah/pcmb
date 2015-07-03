<script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});	
	
});
</script>
<style type="text/css">
</style>
<span><?php echo $pesan;?></span>
<form name="form" method="post" id="tt" enctype="multipart/form-data" action="<?php echo base_url();?>index.php/administrator/kepala/simpan">
<table width="70%">
<tr>
	<td width="25%">Nama Kepala</td>
    <td width="5">:</td>
    <td><input type="text" name="nama_kepala" id="nama_kelapa" value="<?php echo $nama_kepala;?>" size="30" maxlength="30" /></td>
</tr>
<tr>
	<td>NIP</td>
    <td>:</td>
    <td><input type="text" name="nip" id="nip" value="<?php echo $nip;?>" size="50" maxlength="50"/></td>
</tr>
<tr>    
	<td>Keterangan</td>
    <td>:</td>
    <td><textarea name="ket" id="ket"  style="width:600px; height:200px;" />
    <?php echo $ket;?>
    </textarea></td>
</tr>
<tr>    
	<td>Foto</td>
    <td>:</td>
    <td><img src="<?php echo base_url(); ?>asset/foto_pimpinan/<?php echo $foto; ?>" /><br /><br />
    <input type="file" name="foto" id="foto" class="text" /></td>
</tr>    
<tr>
	<td colspan="3" align="center">
    <button type="submit" name="simpan" id="simpan" class="easyui-linkbutton" data-options="iconCls:'icon-save'">SIMPAN</button>
    </td>
</tr>
</table>       

