<script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});	
	
	$("#simpan").click(function(){
		var judul = $("#ym").val();
		if(judul.length==0){
			alert("Maaf, ID YM tidak boleh kosong");
			$("#ym").focus();
			return false;
		}
	});
});
</script>
<span><?php echo $pesan;?></span>
<?php echo form_open_multipart('administrator/ym/simpan');?>
<table width="100%">
<tr>
	<td width="10%">Nama</td>
    <td width="5">:</td>
    <td>
    <input type="text" name="nama_ym" id="nama_ym" value="<?php echo $nama_ym;?>"  size="50" maxlength="100"/>
    </td>
    <input type="hidden" id="id" name="id" value="<?php echo $id_ym;?>" />
</tr>
<tr>
	<td width="10%">ID Yahoo!</td>
    <td width="5">:</td>
    <td>
    <input type="text" name="ym" id="ym" value="<?php echo $ym;?>"  size="50" maxlength="100"/>
    </td>
</tr>
<tr>
	<td colspan="3" align="center">
    <button type="submit" name="simpan" id="simpan" class="easyui-linkbutton" data-options="iconCls:'icon-save'">SIMPAN</button>
    <a href="<?php echo base_url();?>index.php/administrator/ym/tambah">
    <button type="button" name="reset" id="reset" class="easyui-linkbutton" data-options="iconCls:'icon-new'">KOSONG</button>
    </a>
    <a href="<?php echo base_url();?>index.php/administrator/ym">
    <button type="button" class="easyui-linkbutton" data-options="iconCls:'icon-back'">KEMBALI</button>
    </a>
    </td>
</tr>
</table>     
</form>  

