<script type="text/javascript">
$(document).ready(function(){
	$("#nim").focus();
	$("#nim").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
		cari_nim();
	});
	
	function cari_nim(){
		var nim = $("#nim").val();
		var s2 = $("#s2:checked").val();
		
		$.ajax({
			type	: "POST",
			url		: "<?php echo site_url('ref_json/cari_nim'); ?>",
			data	: "nim="+nim+"&s2="+s2,
			dataType: "json",
			success	: function(data){
				$("#nama").val(data.nama);
				$("#angkatan").val(data.angkatan);
				$("#nama_fakultas").val(data.nama_fakultas);
				$("#nama_prodi").val(data.nama_prodi);
			}
		});
	}
	
	$("#semester").keypress(function(data){
		if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
			return false;
		}
	});
	
	$('#jml_tarif').priceFormat({
    	prefix: '',
		centsSeparator: '',
		thousandsSeparator: ',',
    	centsLimit: 0
	});

});
var url;
function simpan(){
	var nim = $("#nim").val();
	var nama = $("#nama").val();
	var kode_bayar = $("#kode_bayar").val();
	var jml_tarif = $("#jml_tarif").val();
	var semester = $("#semester").val();
	
	
	var string = $("#my-form").serialize();
	
	//alert(s2);
	
	if(nim.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, NIM tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#nim").focus();
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
	if(kode_bayar.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, Kode Bayar tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#kode_bayar").focus();
		return false();
	}
	if(jml_tarif.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, Jumlah Tarif tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#jml_tarif").focus();
		return false();
	}
	if(semester.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, Semester Tarif tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#semester").focus();
		return false();
	}
	
	$.ajax({
		type	: "POST",
		url		: "<?php echo site_url('data_btn/simpan'); ?>",
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
<td width="50%" valign="top">
<input type="checkbox" name="s2" id="s2" value="s2" class="s2" /> Cheklist untuk pencarian mahasiswa pascasarjana 
		<div class="form-item">
			<label for="type">NIM</label><br />
			<input type="text" name="nim" id="nim" class="easyui-validatebox" required="true" size="20" maxlength="20"  />
		</div>
        <div class="form-item">
			<label for="type">Nama</label><br />
			<input type="text" name="nama" id="nama" class="easyui-validatebox" required="true" size="50" maxlength="50" readonly="readonly"  />
		</div>
		<div class="form-item">
			<label for="type">Angkatan</label><br />
			<input type="text" name="angkatan" id="angkatan" class="easyui-validatebox" required="true" size="10" maxlength="10" readonly="readonly" />
		</div>
        <div class="form-item">
			<label for="type">Kode Bayar</label><br />
			<select name="kode_bayar" id="kode_bayar">
            <option value="">-PILIH-</option>
            <?php
			foreach($kode_bayar->result() as $t){
			?>
            <option value="<?php echo $t->kode_bayar;?>"><?php echo $t->kode_bayar.' - '.$t->nama_bayar;?></option>
            <?php }
			?>
            </select>
		</div>
        <div class="form-item">
			<label for="type">Jumlah Tarif</label><br />
			<input type="text" name="jml_tarif" id="jml_tarif" class="easyui-validatebox" required="true" size="15" maxlength="20" /> PIN <input type="text" name="pin" id="pin" class="easyui-validatebox" required="true" size="12" maxlength="12" readonly="readonly" value="<?php echo $pin;?>" />
		</div>
        <div class="form-item">
			<label for="type">Nomor Rekening</label><br />
			<input type="text" name="nomor_rekening" id="nomor_rekening" class="easyui-validatebox" required="true" size="30" maxlength="30" value="00047001300003990" />
		</div>
</td>
<td width="50%" valign="top">
		<div class="form-item">
			<label for="type">Tahun</label><br />
			<input type="text" name="tahun" id="tahun" class="easyui-validatebox" required="true" size="10" maxlength="10" value="<?php echo $tahun;?>" />
		</div>
        <div class="form-item">
			<label for="type">Nama Fakultas</label><br />
			<input type="text" name="nama_fakultas" id="nama_fakultas" class="easyui-validatebox" required="true" size="30" maxlength="30" />
		</div>
        <div class="form-item">
			<label for="type">Nama Prodi</label><br />
			<input type="text" name="nama_prodi" id="nama_prodi" class="easyui-validatebox" required="true" size="20" maxlength="20" />
		</div>
        <div class="form-item">
			<label for="type">Semester</label><br />
			<input type="text" name="semester" id="semester" class="easyui-validatebox" required="true" size="5" maxlength="5" />
		</div>
        <div class="form-item">
			<label for="type">Pembayaran Ke</label><br />
			<input type="text" name="pembayaran_ke" id="pembayaran_ke" class="easyui-validatebox" required="true" size="5" maxlength="5" value="<?php echo $ke;?>" />
		</div>
</td>
</tr>
<tr>
<td colspan="2" align="center">
<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="simpan()">Simpan</a>
	<a href="<?php echo base_url();?>index.php/data_btn" class="easyui-linkbutton" iconCls="icon-close" plain="true">Tutup </a>
</td>
</tr>
</table>       
	</form>            
</div>
