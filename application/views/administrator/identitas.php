<script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});	
	
});
</script>
<style type="text/css">
</style>
<span><?php echo $pesan;?></span>
<form name="form" method="post" id="tt" enctype="multipart/form-data" action="<?php echo base_url();?>index.php/administrator/identitas/simpan">
<table width="70%">
<tr>
	<td width="25%">Nama Website</td>
    <td width="5">:</td>
    <td><input type="text" name="nama_website" id="nama_website" value="<?php echo $nama_website;?>" size="30" maxlength="30" /></td>
</tr>
<tr>
	<td>Alamat Web</td>
    <td>:</td>
    <td><input type="text" name="alamat_website" id="alamat_website" value="<?php echo $alamat_website;?>" size="50" maxlength="50"/></td>
</tr>
<tr>
	<td>Alamat</td>
    <td>:</td>
    <td><input type="text" name="alamat" id="alamat" value="<?php echo $alamat;?>" size="50" maxlength="50"/></td>
</tr>
<tr>    
	<td>Selamat Datang</td>
    <td>:</td>
    <td><textarea name="selamat_datang" id="selamat_datang"  style="width:600px; height:120px;" />
    <?php echo $selamat_datang;?>
    </textarea></td>
</tr>
<tr>    
	<td>Deskripsi</td>
    <td>:</td>
    <td><textarea name="meta_deskripsi" id="meta_deskripsi"  style="width:600px; height:100px;" />
    <?php echo $meta_deskripsi;?>
    </textarea></td>
</tr>
<tr>    
	<td>Keyword</td>
    <td>:</td>
    <td><textarea name="meta_keyword" id="meta_keyword" style="width:600px; height:100px;" />
    <?php echo $meta_keyword;?>
    </textarea></td>
</tr>
<tr>    
	<td>Email</td>
    <td>:</td>
    <td><input type="text" name="email" id="email" value="<?php echo $email;?>" size="30" maxlength="30" /></td>
</tr>
<tr>    
	<td>Logo</td>
    <td>:</td>
    <td><img src="<?php echo base_url(); ?>asset/images/<?php echo $logo; ?>" /><br /><br />
    <input type="file" name="logo" id="logo" class="text" /></td>
</tr>    
<tr>
	<td colspan="3" align="center">
    <button type="submit" name="simpan" id="simpan" class="easyui-linkbutton" data-options="iconCls:'icon-save'">SIMPAN</button>
    </td>
</tr>
</table>       

