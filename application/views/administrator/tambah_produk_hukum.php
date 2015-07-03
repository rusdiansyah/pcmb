<script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});	
	
	$("#nilai_lelang").keypress(function(data){
		if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
			return false;
		}
	});
	
	$("#simpan").click(function(){
		var pilih = $("#kategori").val();
		var judul = $("#judul_ph").val();
		
		if(pilih.length==0){
			alert("Maaf, Kategori tidak boleh kosong");
			$("#kategori").focus();
			return false;
		}
		
		if(judul.length==0){
			alert("Maaf, Judul tidak boleh kosong");
			$("#judul_ph").focus();
			return false;
		}
	});
});
</script>
<span><?php echo $pesan;?></span>
<?php echo form_open_multipart('administrator/produk_hukum/simpan');?>
<table width="100%">
<tr>
	<td width="10%">Kategori</td>
    <td width="5">:</td>
    <td>
    <select name="kategori" id="kategori">
    <?php
	if($kategori==''){
	?>
    <option value="">-Pilih-</option>
    <?php } ?>
    <?php
	foreach($jenis_ph->result_array() as $db){
		if($kategori==$db['id_jenis_ph']){
	?>
    	<option value="<?php echo $db['id_jenis_ph'];?>" selected="selected"><?php echo $db['jenis_ph'];?></option>
    <?php
		}else{
	?>
    	<option value="<?php echo $db['id_jenis_ph'];?>"><?php echo $db['jenis_ph'];?></option>
    <?php 
		}
	}
	?>
    </select>
    </td>
</tr>
<tr>
	<td width="10%">Judul</td>
    <td width="5">:</td>
    <td><input type="text" name="judul_ph" id="judul_ph" size="50" maxlength="100" value="<?php echo $judul_ph;?>" /></td>
    <input type="hidden" id="id" name="id" value="<?php echo $id_ph;?>" />
</tr>
<tr>    
	<td>Dokumen Lama</td>
    <td>:</td>
    <td>
    <?php
	if(!empty($dokumen_ph)){
	?>
    	<a href="<?php echo base_url();?>asset/images/<?php echo $dokumen_ph;?>"><?php echo $dokumen_ph;?></a>
    <?php
	}
	?>
    </td>
</tr>    
<tr>    
	<td>Dokumen Baru</td>
    <td>:</td>
    <td>    
	<input type="file" name="dokumen" size="50" />
    </td>
</tr>    
<tr>
	<td colspan="3" align="center">
    <button type="submit" name="simpan" id="simpan" class="easyui-linkbutton" data-options="iconCls:'icon-save'">SIMPAN</button>
    <a href="<?php echo base_url();?>index.php/administrator/produk_hukum/tambah">
    <button type="button" name="reset" id="reset" class="easyui-linkbutton" data-options="iconCls:'icon-new'">KOSONG</button>
    </a>
    <a href="<?php echo base_url();?>index.php/administrator/produk_hukum">
    <button type="button" class="easyui-linkbutton" data-options="iconCls:'icon-back'">KEMBALI</button>
    </a>
    </td>
</tr>
</table>     
</form>  

