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
<form name="form" method="post" id="tt" enctype="multipart/form-data" action="<?php echo base_url();?>index.php/administrator/layanan/simpan">
<table width="100%">
<tr>
	<td width="15%">Jenis</td>
    <td width="5">:</td>
    <td>
    <select name="jenis" id="jenis">
    <?php 
	if(empty($jenis)){
	?>
    <option value="" selected="selected">-Pilih-</option>
    <?php
	}
	foreach($jenis_layanan->result_array() as $j){
		if($jenis==$j['id_jenis']){
	?>
		<option value="<?php echo $j['id_jenis'];?>" selected="selected"><?php echo $j['jenis_layanan'];?></option>
	 <?php
		}else{
	?>
		<option value="<?php echo $j['id_jenis'];?>"><?php echo $j['jenis_layanan'];?></option>
	<?php
		}
	}
	?>
    </select>
    </td>
</tr>
<tr>
	<td width="15%">Judul</td>
    <td width="5">:</td>
    <td><input type="text" name="judul" id="judul" size="50" maxlength="50" value="<?php echo $judul_layanan;?>" /></td>
    <input type="hidden" id="id" name="id" value="<?php echo $id_layanan;?>"/>
</tr>
<tr>    
	<td>Isi Halaman</td>
    <td>:</td>
    <td><textarea name="isi" id="isi"  style="width:600px; height:350px;" />
    <?php echo $isi_layanan;?>
    </textarea></td>
</tr>
<tr>    
	<td>Gambar Lama</td>
    <td>:</td>
    <td>
    <?php
	if(!empty($gambar_layanan)){
	?>
    	<a href="<?php echo base_url();?>asset/img_prosedur/<?php echo $gambar_layanan;?>"><?php echo $gambar_layanan;?></a>
    <?php
	}
	?>
    </td>
</tr>    
<tr>    
	<td>Gambar Baru</td>
    <td>:</td>
    <td>    
	<input type="file" name="gambar" size="50" /> Ukuran terbaik 600x400 Pixel
    </td>
</tr>
<tr>
	<td colspan="3" align="center">
    <button type="submit" name="simpan" id="simpan" class="easyui-linkbutton" data-options="iconCls:'icon-save'">SIMPAN</button>
    <a href="<?php echo base_url();?>index.php/administrator/layanan/tambah">
    <button type="button" name="reset" id="reset" class="easyui-linkbutton" data-options="iconCls:'icon-new'">KOSONG</button>
    </a>
    <a href="<?php echo base_url();?>index.php/administrator/layanan/">
    <button type="button" name="kembali" id="kembali" class="easyui-linkbutton" data-options="iconCls:'icon-back'">Kembali</button>
    </a>
    </td>
</tr>
</table>       

