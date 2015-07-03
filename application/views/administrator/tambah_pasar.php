<script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});	
	$("#kota").change(function(){
		var id = $("#kota").val();
		$.ajax({
		  type	: 'POST',
		  url	: "<?php echo site_url(); ?>/ref_json/listkec",
		  data	: "id="+id,
		  cache	: false,
		  success	: function(data){
			  $("#kec").html(data);
		  }
	  });
	});
	$("#simpan").click(function(){
		var kota = $("#kota").val();
		var kec = $("#kec").val();
		var pasar  = $("#pasar").val();
		if(kota.length==0){
			alert("Maaf, Kota tidak boleh kosong");
			$("#kota").focus();
			return false;
		}
		if(kec.length==0){
			alert("Maaf, Kecamatan tidak boleh kosong");
			$("#kec").focus();
			return false;
		}
		if(pasar.length==0){
			alert("Maaf, Pasar tidak boleh kosong");
			$("#pasar").focus();
			return false;
		}
	});
});
</script>
<span><?php echo $pesan;?></span>
<?php echo form_open_multipart('administrator/pasar/simpan');?>
<table width="100%">
<tr>
	<td width="10%">Kota</td>
    <td width="5">:</td>
    <td>
    <select name="kota" id="kota" style="height:20px;">
    <?php
	if($id_kota==''){
	?>
    <option value="">-Pilih-</option>
    <?php } ?>
    <?php
	foreach($l_kota->result_array() as $db){
		if($id_kota==$db['id_kota']){
	?>
    	<option value="<?php echo $db['id_kota'];?>" selected="selected"><?php echo $db['kota'];?></option>
    <?php
		}else{
	?>
    	<option value="<?php echo $db['id_kota'];?>"><?php echo $db['kota'];?></option>
    <?php 
		}
	}
	?>
    </select>
    </td>
</tr>
<tr>
	<td width="10%">Kecamatan</td>
    <td width="5">:</td>
    <td>
    <select name="kec" id="kec" style="height:20px;">
    <?php
	if(empty($id_kec)){
	?>
    <option value="">-Pilih-</option>
    <?php
	}else{
		echo "<option value='$id_kec'>$kecamatan</option>";
	}
	?>
    </select>
    </td>
</tr>  
<tr>
	<td width="10%">Nama Pasar</td>
    <td width="5">:</td>
    <td><input type="text" name="pasar" id="pasar" size="50" maxlength="50" value="<?php echo $pasar;?>" /></td>
    <input type="hidden" id="id" name="id" value="<?php echo $id_pasar;?>" />
</tr>
<tr>    
	<td>Keterangan</td>
    <td>:</td>
    <td><textarea name="ket" id="ket"  style="width:600px; height:350px;" />
    <?php echo $ket;?>
    </textarea></td>
</tr>
<tr>    
	<td>Foto</td>
    <td>:</td>
    <td>
    <?php
	if(!empty($foto)){
	?>
    	<img src="<?php echo base_url();?>asset/pasar/<?php echo $foto;?>" width="150" height="100"><br />
    <?php
	}
	?>
	<input type="file" name="foto" size="50" />
    </td>
</tr>  
<tr>
	<td colspan="3" align="center">
    <button type="submit" name="simpan" id="simpan" class="easyui-linkbutton" data-options="iconCls:'icon-save'">SIMPAN</button>
    <a href="<?php echo base_url();?>index.php/administrator/pasar/tambah">
    <button type="button" name="reset" id="reset" class="easyui-linkbutton" data-options="iconCls:'icon-new'">KOSONG</button>
    </a>
    <a href="<?php echo base_url();?>index.php/administrator/pasar">
    <button type="button" class="easyui-linkbutton" data-options="iconCls:'icon-back'">KEMBALI</button>
    </a>
    </td>
</tr>
</table>     
</form>  

