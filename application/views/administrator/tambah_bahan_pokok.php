<script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});	

	$("#simpan").click(function(){
		var jenis = $("#jenis_bp").val();
		var bp  = $("#bahan_pokok").val();
		if(jenis.length==0){
			alert("Maaf, Jenis tidak boleh kosong");
			$("#jenis").focus();
			return false;
		}
		if(bp.length==0){
			alert("Maaf, Bahan Pokok tidak boleh kosong");
			$("#bahan_pokok").focus();
			return false;
		}
	});
});
</script>
<span><?php echo $pesan;?></span>
<?php echo form_open_multipart('administrator/bahan_pokok/simpan');?>
<table width="100%">
<tr>
	<td width="10%">Jenis</td>
    <td width="5">:</td>
    <td>
    <select name="jenis" id="jenis" style="height:20px;">
    <?php
	if($id_jenis==''){
	?>
    <option value="">-Pilih-</option>
    <?php } ?>
    <?php
	foreach($l_jenis_bp->result_array() as $db){
		if($id_jenis==$db['id_jenis_bp']){
	?>
    	<option value="<?php echo $db['id_jenis_bp'];?>" selected="selected"><?php echo $db['jenis_bp'];?></option>
    <?php
		}else{
	?>
    	<option value="<?php echo $db['id_jenis_bp'];?>"><?php echo $db['jenis_bp'];?></option>
    <?php 
		}
	}
	?>
    </select>
    </td>
</tr>
<tr>
	<td width="10%">Nama Bahan Pokok</td>
    <td width="5">:</td>
    <td><input type="text" name="bp" id="bp" size="50" maxlength="50" value="<?php echo $bp;?>" /></td>
    <input type="hidden" id="id" name="id" value="<?php echo $id_bp;?>" />
</tr>
<tr>
	<td width="10%">Satuan</td>
    <td width="5">:</td>
    <td><input type="text" name="satuan" id="satuan" size="20" maxlength="20" value="<?php echo $satuan;?>" /></td>
</tr>
<tr>    
	<td>Foto</td>
    <td>:</td>
    <td>
    <?php
	if(!empty($foto)){
	?>
    	<img src="<?php echo base_url();?>asset/bahan_pokok/<?php echo $foto;?>" width="150" height="100"><br />
    <?php
	}
	?>
	<input type="file" name="foto" size="50" />
    </td>
</tr>  
<tr>
	<td colspan="3" align="center">
    <button type="submit" name="simpan" id="simpan" class="easyui-linkbutton" data-options="iconCls:'icon-save'">SIMPAN</button>
    <a href="<?php echo base_url();?>index.php/administrator/bahan_pokok/tambah">
    <button type="button" name="reset" id="reset" class="easyui-linkbutton" data-options="iconCls:'icon-new'">KOSONG</button>
    </a>
    <a href="<?php echo base_url();?>index.php/administrator/bahan_pokok">
    <button type="button" class="easyui-linkbutton" data-options="iconCls:'icon-back'">KEMBALI</button>
    </a>
    </td>
</tr>
</table>     
</form>  

