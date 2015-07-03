<script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});	
	
	$("#simpan").click(function(){
		var judul = $("#judul_info").val();
		if(judul.length==0){
			alert("Maaf, Judul tidak boleh kosong");
			$("#judul_info").focus();
			return false;
		}
	});
});
</script>
<span><?php echo $pesan;?></span>
<?php echo form_open_multipart('administrator/hubungi/simpan');?>
<table width="100%">
<tr>
	<td width="10%">Kepada</td>
    <td width="5">:</td>
    <td>
    <input type="text" name="email_hubungi" id="email_hubungi" value="<?php echo $email_hubungi;?>"  size="100" maxlength="100" readonly="readonly"/>
    </td>
    <input type="hidden" id="id" name="id" value="<?php echo $id_hubungi;?>" />
</tr>
<tr>
	<td width="10%">Subjek</td>
    <td width="5">:</td>
    <td>
    <input type="text" name="subjek" id="subjek" value="<?php echo $subjek;?>"  readonly="readonly" size="100" maxlength="100"/>
    </td>
</tr>
<tr>    
	<td>Pesan</td>
    <td>:</td>
    <td><textarea name="pesan" id="pesan"  style="width:600px; height:350px;" />
    <br />
    <br />
    <p><?php echo $email;?></p>
    <p><?php echo $this->session->userdata['username'];?></p>
    <p>----------------------------------------------------------------------------------------------------------</p>
	<?php echo $msg;?>
    </textarea></td>
</tr>
<tr>
	<td colspan="3" align="center">
    <button type="submit" name="simpan" id="simpan" class="easyui-linkbutton" data-options="iconCls:'icon-pesan'">KIRIM</button>
    <a href="<?php echo base_url();?>index.php/administrator/hubungi">
    <button type="button" class="easyui-linkbutton" data-options="iconCls:'icon-back'">KEMBALI</button>
    </a>
    </td>
</tr>
</table>     
</form>  

