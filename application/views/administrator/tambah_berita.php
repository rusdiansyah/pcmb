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
<?php echo form_open_multipart('administrator/berita/simpan');?>
<table width="100%">
<tr>
	<td width="10%">Judul</td>
    <td width="5">:</td>
    <td><input type="text" name="judul" id="judul" size="50" maxlength="50" value="<?php echo $judul_berita;?>" /></td>
    <input type="hidden" id="id" name="id" value="<?php echo $id_berita;?>" />
</tr>
<tr>
	<td width="10%">Headline</td>
    <td width="5">:</td>
    <td>
    <?php 
	if($pilih=='Y'){
	?>
    <input type="radio" name="pilih" class="pilih" value="Y" checked="checked" />Ya
    <input type="radio" name="pilih" class="pilih" value="N" />Tidak
    <?php }elseif ($pilih=='N'){ ?>
    <input type="radio" name="pilih" class="pilih" value="Y"  />Ya
    <input type="radio" name="pilih" class="pilih" value="N" checked="checked" />Tidak
    <?php }else{ ?>
    <input type="radio" name="pilih" class="pilih" value="Y" checked="checked" />Ya
    <input type="radio" name="pilih" class="pilih" value="N" />Tidak
    <?php } ?>
    </td>
</tr>
<tr>    
	<td>Isi Berita</td>
    <td>:</td>
    <td><textarea name="isi" id="isi"  style="width:600px; height:350px;" />
    <?php echo $isi_berita;?>
    </textarea></td>
</tr>
<tr>    
	<td>Gambar</td>
    <td>:</td>
    <td>
    <?php
	if(!empty($gambar_berita)){
	?>
    	<img src="<?php echo base_url();?>asset/foto_berita/<?php echo $gambar_berita;?>" width="250" height="150"><br />
    <?php
	}
	?>
	<input type="file" name="gambar" size="50" />
    </td>
</tr>    
<tr>
	<td colspan="3" align="center">
    <button type="submit" name="simpan" id="simpan" class="easyui-linkbutton" data-options="iconCls:'icon-save'">SIMPAN</button>
    <button type="reset" name="reset" id="reset" class="easyui-linkbutton" data-options="iconCls:'icon-new'">KOSONG</button>
    <a href="<?php echo base_url();?>index.php/administrator/berita">
    <button type="button" class="easyui-linkbutton" data-options="iconCls:'icon-back'">KEMBALI</button>
    </a>
    </td>
</tr>
</table>     
</form>  

