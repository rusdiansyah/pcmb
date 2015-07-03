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
		var judul = $("#nama_kegiatan").val();
		if(judul.length==0){
			alert("Maaf, Nama Kegiatan tidak boleh kosong");
			$("#nama_kegiatan").focus();
			return false;
		}
	});
});
</script>
<span><?php echo $pesan;?></span>
<?php echo form_open_multipart('administrator/lelang/simpan');?>
<table width="100%">
<tr>
	<td width="10%">Nama Kegiatan</td>
    <td width="5">:</td>
    <td><input type="text" name="nama_kegiatan" id="nama_kegiatan" size="50" maxlength="50" value="<?php echo $nama_kegiatan;?>" /></td>
    <input type="hidden" id="id" name="id" value="<?php echo $id_lelang;?>" />
</tr>
<tr>
	<td width="10%">Nilai</td>
    <td width="5">:</td>
    <td><input type="text" name="nilai_lelang" id="nilai_lelang" size="20" maxlength="20" value="<?php echo $nilai_lelang;?>" /></td>
</tr>
<tr>    
	<td>Keterangan</td>
    <td>:</td>
    <td><textarea name="ket_lelang" id="ket_lelang"  style="width:600px; height:350px;" />
    <?php echo $ket_lelang;?>
    </textarea></td>
</tr>
<tr>    
	<td>Dokumen Lama</td>
    <td>:</td>
    <td>
    <?php
	if(!empty($dokumen_lelang)){
	?>
    	<a href="<?php echo base_url();?>asset/images/<?php echo $dokumen_lelang;?>"><?php echo $dokumen_lelang;?></a>
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
    <a href="<?php echo base_url();?>index.php/administrator/lelang/tambah">
    <button type="button" name="reset" id="reset" class="easyui-linkbutton" data-options="iconCls:'icon-new'">KOSONG</button>
    </a>
    <a href="<?php echo base_url();?>index.php/administrator/lelang">
    <button type="button" class="easyui-linkbutton" data-options="iconCls:'icon-back'">KEMBALI</button>
    </a>
    </td>
</tr>
</table>     
</form>  

