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
		var dokumen = $("#dokumen").val();
		if(judul.length==0){
			alert("Maaf, Judul tidak boleh kosong");
			$("#judul").focus();
			return false;
		}
		if(dokumen.length==0){
			alert("Maaf, Dokumen tidak boleh kosong");
			$("#dokumen").focus();
			return false;
		}
	});
});
</script>
<span><?php echo $pesan;?></span>
<?php echo form_open_multipart('administrator/download/simpan');?>
<table width="100%">
<tr>
	<td width="10%">Judul</td>
    <td width="5">:</td>
    <td><input type="text" name="judul" id="judul" size="50" maxlength="50" value="<?php echo $judul_download;?>" /></td>
    <input type="hidden" id="id" name="id" value="<?php echo $id_download;?>" />
</tr>
<tr>    
	<td>Dokumen</td>
    <td>:</td>
    <td>
    <?php
	if(!empty($dokumen_download)){
	?>
    	<?php echo $dokumen_download;?><br />
    <?php
	}
	?>
	<input type="file" name="dokumen" id="dokumen" size="50" />
    </td>
</tr>    
<tr>
	<td colspan="3" align="center">
    <button type="submit" name="simpan" id="simpan" class="easyui-linkbutton" data-options="iconCls:'icon-save'">SIMPAN</button>
    <a href="<?php echo base_url();?>index.php/administrator/download/tambah">    
    <button type="button" name="reset" id="reset" class="easyui-linkbutton" data-options="iconCls:'icon-new'">KOSONG</button>
    </a>
    <a href="<?php echo base_url();?>index.php/administrator/download">
    <button type="button" class="easyui-linkbutton" data-options="iconCls:'icon-back'">KEMBALI</button>
    </a>
    </td>
</tr>
</table>     
</form>  

