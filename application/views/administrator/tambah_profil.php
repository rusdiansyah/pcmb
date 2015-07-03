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
<?php echo form_open_multipart('administrator/profil/simpan');?>
<table width="100%">
<tr>
	<td width="10%">Judul</td>
    <td width="5">:</td>
    <td><input type="text" name="judul" id="judul" size="50" maxlength="50" value="<?php echo $judul_profil;?>" /></td>
    <input type="hidden" id="id" name="id" value="<?php echo $id_profil;?>" />
</tr>
<tr>    
	<td>Isi Halaman</td>
    <td>:</td>
    <td><textarea name="isi" id="isi"  style="width:600px; height:350px;" />
    <?php echo $isi_profil;?>
    </textarea></td>
</tr>
<tr>    
	<td>Gambar</td>
    <td>:</td>
    <td>
    <?php
	if(!empty($gambar_profil)){
	?>
    	<img src="<?php echo base_url();?>asset/images/<?php echo $gambar_profil;?>" width="250" height="150"><br />
    <?php
	}
	?>
	<input type="file" name="userfile" size="50" />
    </td>
</tr>    
<tr>
	<td colspan="3" align="center">
    <button type="submit" name="simpan" id="simpan" class="easyui-linkbutton" data-options="iconCls:'icon-save'">SIMPAN</button>
    <button type="reset" name="reset" id="reset" class="easyui-linkbutton" data-options="iconCls:'icon-new'">KOSONG</button>
    <a href="<?php echo base_url();?>index.php/administrator/profil">
    <button type="button" class="easyui-linkbutton" data-options="iconCls:'icon-back'">KEMBALI</button>
    </a>
    </td>
</tr>
</table>     
</form>  

