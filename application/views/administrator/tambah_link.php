<script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});	
	
	$("#simpan").click(function(){
		var judul = $("#judul_link").val();
		if(judul.length==0){
			alert("Maaf, Judul tidak boleh kosong");
			$("#judul_link").focus();
			return false;
		}
	});
});
</script>
<span><?php echo $pesan;?></span>
<?php echo form_open_multipart('administrator/link/simpan');?>
<table width="100%">
<tr>
	<td width="10%">Lembaga</td>
    <td width="5">:</td>
    <td>
    <input type="text" name="judul_link" id="judul_link" value="<?php echo $judul_link;?>"  size="100" maxlength="100"/>
    </td>
    <input type="hidden" id="id" name="id" value="<?php echo $id_link;?>" />
</tr>
<tr>
	<td width="10%">Url / Link</td>
    <td width="5">:</td>
    <td>
    <input type="text" name="url" id="url" value="<?php echo $url;?>"  size="100" maxlength="100"/>
    </td>
</tr>
<tr>    
	<td>Gambar</td>
    <td>:</td>
    <td>
    <?php
	if(!empty($gambar_link)){
	?>
    	<img src="<?php echo base_url();?>asset/foto_banner/<?php echo $gambar_link;?>" width="150" height="50"><br />
    <?php
	}
	?>
	<input type="file" name="gambar" size="50" />
    </td>
</tr>
<tr>
	<td colspan="3" align="center">
    <button type="submit" name="simpan" id="simpan" class="easyui-linkbutton" data-options="iconCls:'icon-save'">SIMPAN</button>
    <a href="<?php echo base_url();?>index.php/administrator/link/tambah">
    <button type="button" name="reset" id="reset" class="easyui-linkbutton" data-options="iconCls:'icon-new'">KOSONG</button>
    </a>
    <a href="<?php echo base_url();?>index.php/administrator/link">
    <button type="button" class="easyui-linkbutton" data-options="iconCls:'icon-back'">KEMBALI</button>
    </a>
    </td>
</tr>
</table>     
</form>  

