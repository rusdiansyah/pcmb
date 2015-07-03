<script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});	
	$("#tgl_mulai").datepicker({
		dateFormat      : "dd-mm-yy",        
	  	showOn          : "button",
	  	buttonImage     : "<?php echo base_url();?>asset/images/calendar.gif",
	  	buttonImageOnly : true				
	});
	$("#tgl_selesai").datepicker({
		dateFormat      : "dd-mm-yy",        
	  	showOn          : "button",
	  	buttonImage     : "<?php echo base_url();?>asset/images/calendar.gif",
	  	buttonImageOnly : true				
	});
	
	$("#simpan").click(function(){
		var judul = $("#judul_agenda").val();
		if(judul.length==0){
			alert("Maaf, Judul tidak boleh kosong");
			$("#judul_agenda").focus();
			return false;
		}
	});
});
</script>
<span><?php echo $pesan;?></span>
<?php echo form_open_multipart('administrator/agenda/simpan');?>
<table width="100%">
<tr>
	<td width="10%">Tema</td>
    <td width="5">:</td>
    <td>
    <input type="text" name="judul_agenda" id="judul_agenda" value="<?php echo $judul_agenda;?>"  size="100" maxlength="100"/>
    </td>
    <input type="hidden" id="id" name="id" value="<?php echo $id_agenda;?>" />
</tr>
<tr>    
	<td>Isi Agenda</td>
    <td>:</td>
    <td><textarea name="isi_agenda" id="isi_agenda"  style="width:600px; height:250px;" />
    <?php echo $isi_agenda;?>
    </textarea></td>
</tr>
<tr>
	<td width="10%">Tempat</td>
    <td width="5">:</td>
    <td>
    <input type="text" name="tempat_agenda" id="tempat_agenda" value="<?php echo $tempat_agenda;?>"  size="50" maxlength="50"/>
    </td>
</tr>
<tr>
	<td width="10%">Pengirim</td>
    <td width="5">:</td>
    <td>
    <input type="text" name="pengirim_agenda" id="pengirim_agenda" value="<?php echo $pengirim_agenda;?>"  size="50" maxlength="50"/>
    </td>
</tr>
<tr>
	<td width="10%">Tanggal</td>
    <td width="5">:</td>
    <td>
    <input type="text" name="tgl_mulai" id="tgl_mulai" value="<?php echo $tgl_mulai;?>"  size="12" maxlength="12"/> s/d
    <input type="text" name="tgl_selesai" id="tgl_selesai" value="<?php echo $tgl_selesai;?>"  size="12" maxlength="12"/>
    </td>
</tr>
<tr>
	<td width="10%">Jam</td>
    <td width="5">:</td>
    <td>
    <input type="text" name="jam_agenda" id="jam_agenda" value="<?php echo $jam_agenda;?>"  size="30" maxlength="30"/>
    </td>
</tr>
<tr>
	<td colspan="3" align="center">
    <button type="submit" name="simpan" id="simpan" class="easyui-linkbutton" data-options="iconCls:'icon-save'">SIMPAN</button>
    <a href="<?php echo base_url();?>index.php/administrator/agenda/tambah">
    <button type="button" name="reset" id="reset" class="easyui-linkbutton" data-options="iconCls:'icon-new'">KOSONG</button>
    </a>
    <a href="<?php echo base_url();?>index.php/administrator/agenda">
    <button type="button" class="easyui-linkbutton" data-options="iconCls:'icon-back'">KEMBALI</button>
    </a>
    </td>
</tr>
</table>     
</form>  

