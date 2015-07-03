<script type="text/javascript">
$(document).ready(function(){
	$("#nisn").focus();
	$("#nisn").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
		cari_nisn();
	});
	
	function cari_nisn(){
		var nisn = $("#nisn").val();
		
		$.ajax({
			type	: "POST",
			url		: "<?php echo site_url('administrator/data_beli/cari_nisn'); ?>",
			data	: "nisn="+nisn,
			dataType: "json",
			success	: function(data){
				$("#nama").val(data.nama);
				$("#no_hp").val(data.no_hp);
			}
		});
	}
	
	$("#semester").keypress(function(data){
		if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
			return false;
		}
	});

});
var url;
function simpan(){
	var nisn = $("#nisn").val();
	var nama = $("#nama").val();
	
	
	var string = $("#my-form").serialize();
	
	//alert(string);
	
	if(nisn.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, NISN tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#nisn").focus();
		return false();
	}
	if(nama.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, Nama tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#nama").focus();
		return false();
	}
	
	$.ajax({
		type	: "POST",
		url		: "<?php echo site_url('administrator/data_beli/simpan'); ?>",
		data	: string,
		success	: function(data){
			$.messager.show({
				title:'Info',
				msg:data, //'Password Tidak Boleh Kosong.',
				timeout:2000,
				showType:'slide'
			});
		}
	});
	return false();
}
function cetak_bukti(){
		//var nisn = $("#nisn").val();
		var nisn = $('#nisn').val(); 
		
		if(nisn.length==0){
			$.messager.show({
				title:'Info',
				msg:'Maaf, NISN tidak boleh kosong', //'Password Tidak Boleh Kosong.',
				timeout:2000,
				showType:'slide'
			});
			return false();
		}
		
		window.open('<?php echo site_url();?>/administrator/data_beli/cetak/'+nisn);
		return false();
	}
</script>
<style type="text/css">
textarea {
	width:350px;
}
</style>
<div style="padding:10px;">
<form id="my-form" method="post" novalidate>
<table width="100%">
<tr>
<td width="80%" valign="top">
		<div class="form-item">
			<label for="type">NISN</label><br />
			<input type="text" name="nisn" id="nisn" class="easyui-validatebox" required="true" size="20" maxlength="20"  />
		</div>
        <div class="form-item">
			<label for="type">Nama</label><br />
			<input type="text" name="nama" id="nama" class="easyui-validatebox" required="true" size="50" maxlength="50"  />
		</div>
		<div class="form-item">
			<label for="type">No HP</label><br />
			<input type="text" name="no_hp" id="no_hp" class="easyui-validatebox" required="true" size="20" maxlength="10" />
		</div>
		<div class="form-item">
			<label for="type">Biaya</label><br />
			<input type="text" name="biaya" id="biaya" class="easyui-validatebox" value="200000" required="true" size="20" maxlength="10" />
		</div>
</td>
</tr>
<tr>
<td colspan="1" align="center">
<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="simpan()">Simpan</a>
<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="cetak_bukti()">Cetak </a>
<a href="<?php echo base_url();?>index.php/administrator/data_beli/tambah" class="easyui-linkbutton" iconCls="icon-ok" plain="true">Kosong Form</a>
<a href="<?php echo base_url();?>index.php/administrator/data_beli" class="easyui-linkbutton" iconCls="icon-close" plain="true">Tutup </a>
</td>
</tr>
</table>       
	</form>            
</div>
