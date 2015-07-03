<script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});	
	$("#simpan").click(function(){
		var judul = $("#judul").val();
		if(judul.length==0){
			alert("Maaf, Judul tidak boleh kosong");
			$("#judul").focus();
			return false;
		}
	});
});
</script>
<span><?php echo $pesan;?></span>
<form name="form" method="post" id="tt" enctype="multipart/form-data" action="<?php echo base_url();?>index.php/administrator/jenis_layanan/simpan">
<table width="100%">
<tr>
	<td width="15%">Jenis Layanan</td>
    <td width="5">:</td>
    <td><input type="text" name="judul" id="judul" size="50" maxlength="50" value="<?php echo $jenis_layanan;?>" /></td>
    <input type="hidden" id="id" name="id" value="<?php echo $id_jenis;?>"/>
</tr>
<tr>    
	<td>Keterangan</td>
    <td>:</td>
    <td><textarea name="ket" id="ket"  style="width:600px; height:350px;" />
    <?php echo $ket;?>
    </textarea></td>
</tr>
<tr>
	<td colspan="3" align="center">
    <button type="submit" name="simpan" id="simpan" class="easyui-linkbutton" data-options="iconCls:'icon-save'">SIMPAN</button>
    <a href="<?php echo base_url();?>index.php/administrator/jenis_layanan/tambah">
    <button type="button" name="reset" id="reset" class="easyui-linkbutton" data-options="iconCls:'icon-new'">KOSONG</button>
    </a>
    <a href="<?php echo base_url();?>index.php/administrator/jenis_layanan/">
    <button type="button" name="kembali" id="kembali" class="easyui-linkbutton" data-options="iconCls:'icon-back'">Kembali</button>
    </a>
    </td>
</tr>
</table>       

