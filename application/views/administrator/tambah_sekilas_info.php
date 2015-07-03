<script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});	
	
	$("#simpan").click(function(){
		var judul = $("#judul_info").val();
		if(judul.length==0){
			alert("Maaf, Judul tidak boleh kosong");
			$("#judul_info").focus();
			return false;
		}
	});
});
</script>
<span><?php echo $pesan;?></span>
<?php echo form_open_multipart('administrator/sekilas_info/simpan');?>
<table width="100%">
<tr>
	<td width="10%">Informasi</td>
    <td width="5">:</td>
    <td>
    <input type="text" name="judul_info" id="judul_info" value="<?php echo $judul_info;?>"  size="100" maxlength="100"/>
    </td>
    <input type="hidden" id="id" name="id" value="<?php echo $id_sekilas;?>" />
</tr>
<tr>
	<td colspan="3" align="center">
    <button type="submit" name="simpan" id="simpan" class="easyui-linkbutton" data-options="iconCls:'icon-save'">SIMPAN</button>
    <a href="<?php echo base_url();?>index.php/administrator/sekilas_info/tambah">
    <button type="button" name="reset" id="reset" class="easyui-linkbutton" data-options="iconCls:'icon-new'">KOSONG</button>
    </a>
    <a href="<?php echo base_url();?>index.php/administrator/sekilas_info">
    <button type="button" class="easyui-linkbutton" data-options="iconCls:'icon-back'">KEMBALI</button>
    </a>
    </td>
</tr>
</table>     
</form>  

