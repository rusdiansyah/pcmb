<script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});	
	$("#dp").focus();
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
	$("#tgl").datepicker({
		dateFormat      : "dd-mm-yy",        
	  	showOn          : "button",
	  	buttonImage     : "<?php echo base_url();?>asset/images/calendar.gif",
	  	buttonImageOnly : true				
	});
	$("#harga").keypress(function (data)  { 
		if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)){
	          return false;
		}	
	});
	$("#simpan").click(function(){
		var bp = $("#bp").val();
		var kota = $("#kota").val();
		var kec = $("#kec").val();
		var tgl  = $("#tgl").val();
		var harga  = $("#harga").val();
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
		if(bp.length==0){
			alert("Maaf, Bahan Pokok tidak boleh kosong");
			$("#bp").focus();
			return false;
		}
		if(tgl.length==0){
			alert("Maaf, Tanggal tidak boleh kosong");
			$("#tgl").focus();
			return false;
		}
		if(harga.length==0){
			alert("Maaf, Harga tidak boleh kosong");
			$("#harga").focus();
			return false;
		}
	});
});
</script>
<span><?php echo $pesan;?></span>
<?php echo form_open_multipart('administrator/harga_bahan_pokok/simpan');?>
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
	<td width="10%">Bahan Pokok</td>
    <td width="5">:</td>
    <td>
    <select name="bp" id="bp" style="height:20px;">
    <?php
	if($id_bp==''){
	?>
    <option value="">-Pilih-</option>
    <?php } ?>
    <?php
	foreach($l_bp->result_array() as $db){
		if($id_bp==$db['id_bp']){
	?>
    	<option value="<?php echo $db['id_bp'];?>" selected="selected"><?php echo $db['nama_bp'];?> / <?php echo $db['satuan'];?></option>
    <?php
		}else{
	?>
    	<option value="<?php echo $db['id_bp'];?>"><?php echo $db['nama_bp'];?> / <?php echo $db['satuan'];?></option>
    <?php 
		}
	}
	?>
    </select>
    </td>
</tr>
<tr>
	<td width="10%">Tanggal</td>
    <td width="5">:</td>
    <td><input type="text" name="tgl" id="tgl" size="12" maxlength="12" value="<?php echo $tanggal;?>" /></td>
    <input type="hidden" id="id" name="id" value="<?php echo $id_harga;?>" />
</tr>
<tr>
	<td width="10%">Harga</td>
    <td width="5">:</td>
    <td><input type="text" name="harga" id="harga" size="20" maxlength="20" value="<?php echo $harga;?>" /></td>
</tr>
<tr>
	<td colspan="3" align="center">
    <button type="submit" name="simpan" id="simpan" class="easyui-linkbutton" data-options="iconCls:'icon-save'">SIMPAN</button>
    <a href="<?php echo base_url();?>index.php/administrator/harga_bahan_pokok/tambah">
    <button type="button" name="reset" id="reset" class="easyui-linkbutton" data-options="iconCls:'icon-new'">KOSONG</button>
    </a>
    <a href="<?php echo base_url();?>index.php/administrator/harga_bahan_pokok">
    <button type="button" class="easyui-linkbutton" data-options="iconCls:'icon-back'">KEMBALI</button>
    </a>
    </td>
</tr>
</table>     
</form>  

