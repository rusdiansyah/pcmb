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
<?php echo form_open_multipart('administrator/header/simpan');?>
<table width="100%">
<tr>
	<td width="10%">Judul</td>
    <td width="5">:</td>
    <td>
    <input type="text" name="judul_header" id="judul_header" value="<?php echo $judul_header;?>"  size="100" maxlength="100"/>
    </td>
    <input type="hidden" id="id" name="id" value="<?php echo $id_header;?>" />
</tr>
<tr>
	<td width="10%">Status</td>
    <td width="5">:</td>
    <td>
    <select name="status" id="status">
    <?php if(empty($status) || $status=='Y'){ ?>
    <option value="Y" selected="selected">Aktif</option>
    <option value="N">Tidak Aktif</option>
    <?php }else{ ?>
    <option value="Y">Aktif</option>
    <option value="N" selected="selected">Tidak Aktif</option>
    <?php } ?>
    </select>
    </td>
</tr>
<tr>    
	<td>Gambar</td>
    <td>:</td>
    <td>
    <?php
	if(!empty($gambar_header)){
	?>
    	<img src="<?php echo base_url();?>asset/slider/<?php echo $gambar_header;?>" width="150" height="50"><br />
    <?php
	}
	?>
	<input type="file" name="gambar" size="50" />
    </td>
</tr>
<tr>
	<td colspan="3" align="center">
    <button type="submit" name="simpan" id="simpan" class="easyui-linkbutton" data-options="iconCls:'icon-save'">SIMPAN</button>
    <a href="<?php echo base_url();?>index.php/administrator/header/tambah">
    <button type="button" name="reset" id="reset" class="easyui-linkbutton" data-options="iconCls:'icon-new'">KOSONG</button>
    </a>
    <a href="<?php echo base_url();?>index.php/administrator/header">
    <button type="button" class="easyui-linkbutton" data-options="iconCls:'icon-back'">KEMBALI</button>
    </a>
    </td>
</tr>
</table>     
</form>  

