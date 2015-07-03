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
		var gambar = $("#userfile").val();
		var album  = $("#album").val();
		if(album.length==0){
			alert("Maaf, Album tidak boleh kosong");
			$("#album").focus();
			return false;
		}
		if(judul.length==0){
			alert("Maaf, Judul tidak boleh kosong");
			$("#judul").focus();
			return false;
		}
		if(gambar.length==0){
			alert("Maaf, Gambar tidak boleh kosong");
			$("#gambar").focus();
			return false;
		}
	});
});
</script>
<span><?php echo $pesan;?></span>
<?php echo form_open_multipart('administrator/foto/simpan');?>
<table width="100%">
<tr>
	<td width="10%">Album</td>
    <td width="5">:</td>
    <td>
    <select name="album" id="album" style="height:20px;">
    <?php
	if($id_album==''){
	?>
    <option value="">-Pilih-</option>
    <?php } ?>
    <?php
	foreach($album->result_array() as $db){
		if($id_album==$db['id_album']){
	?>
    	<option value="<?php echo $db['id_album'];?>" selected="selected"><?php echo $db['jdl_album'];?></option>
    <?php
		}else{
	?>
    	<option value="<?php echo $db['id_album'];?>"><?php echo $db['jdl_album'];?></option>
    <?php 
		}
	}
	?>
    </select>
    </td>
</tr>
<tr>    
	<td>Gambar</td>
    <td>:</td>
    <td>
    <?php
	if(!empty($gambar_foto)){
	?>
    	<img src="<?php echo base_url();?>asset/img_galeri/<?php echo $gambar_foto;?>" width="150" height="100"><br />
    <?php
	}
	?>
	<input type="file" name="userfile" size="50" />
    </td>
</tr>    
<tr>
	<td width="10%">Judul</td>
    <td width="5">:</td>
    <td><input type="text" name="judul" id="judul" size="50" maxlength="50" value="<?php echo $judul_foto;?>" /></td>
    <input type="hidden" id="id" name="id" value="<?php echo $id_foto;?>" />
</tr>
<tr>
	<td colspan="3" align="center">
    <button type="submit" name="simpan" id="simpan" class="easyui-linkbutton" data-options="iconCls:'icon-save'">SIMPAN</button>
    <a href="<?php echo base_url();?>index.php/administrator/foto/tambah">
    <button type="button" name="reset" id="reset" class="easyui-linkbutton" data-options="iconCls:'icon-new'">KOSONG</button>
    </a>
    <a href="<?php echo base_url();?>index.php/administrator/foto">
    <button type="button" class="easyui-linkbutton" data-options="iconCls:'icon-back'">KEMBALI</button>
    </a>
    </td>
</tr>
</table>     
</form>  

