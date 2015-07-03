<script type="text/javascript">
$(document).ready(function(){
	$("#nomor").focus();
	cari_spm();
	doSearch();
	
	$("#nomor").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});
	
	$("#pengeluaran_uang").keypress(function(data){
		if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
			return false;
		}
	});
	
	$("#potongan_uang").keypress(function(data){
		if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
			return false;
		}
	});
	
	$("#tanggal").datepicker({
		dateFormat      : "dd-mm-yy",        
	  	showOn          : "button",
	  	buttonImage     : "<?php echo base_url();?>asset/images/calendar.gif",
	  	buttonImageOnly : true				
	});
	
	function cari_spm(){
		var id = $("#nomor").val();
		$.ajax({
			type	: "POST",
			url		: "<?php echo site_url('ref_json/cari_spm'); ?>",
			data	: "id="+id,
			dataType: "json",
			success	: function(data){
				$("#tanggal").val(data.tanggal);
				$("#th_anggaran").val(data.th_anggaran);
				$("#cara_bayar").val(data.cara_bayar);
				$("#mata_anggaran").val(data.mata_anggaran);
				$("#kepada").val(data.kepada);
				$("#npwp").val(data.npwp);
				$("#rekening").val(data.rekening);
				$("#bank_pos").val(data.bank_pos);
				$("#uraian").val(data.uraian);
			}
		});
	}
	
	function doSearch(){  
	$('#datagrid-crud').datagrid('load',{    
        cari: $("#nomor").val()
    });  
}
});
var url;
function create(){
	var nomor = $("#nomor").val();
	var tanggal = $("#tanggal").val();
	
	var string = $("#h-form").serialize();
	
	if(nomor.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, Nomor tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#nomor").focus();
		return false();
	}
	if(tanggal.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, Tanggal tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#tanggal").focus();
		return false();
	}
	
	$('#dialog-form').dialog('open').dialog('setTitle','Tambah Data');
	$('#d-form').form('clear');
	$("#pengeluaran_akun").focus();
	
}
function simpan(){
	var nomor = $("#nomor").val();
	var tanggal = $("#tanggal").val();
	
	var string = $("#h-form").serialize();
	
	if(nomor.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, Nomor tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#nomor").focus();
		return false();
	}
	if(tanggal.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, Tanggal tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#tanggal").focus();
		return false();
	}
	
	$.ajax({
		type	: "POST",
		url		: "<?php echo site_url('spm/simpan'); ?>",
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

function simpan_detail(){
	var nomor = $("#nomor").val();
	var pe_akun = $("#pengeluaran_akun").val();
	var po_akun = $("#potongan_akun").val();
	
	var a = $("#d-form").serialize();
	var string = a+"&nomor="+nomor;
	
	if(nomor.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, Nomor tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#nomor").focus();
		return false();
	}
	
	if(pe_akun.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, Pengeluaran Akun tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#pengeluaran_akun").focus();
		return false();
	}
	if(po_akun.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, Potongan Akun tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#potongan_akun").focus();
		return false();
	}
	
	$.ajax({
		type	: "POST",
		url		: "<?php echo site_url('spm/simpan_detail'); ?>",
		data	: string,
		success	: function(data){
			$.messager.show({
				title:'Info',
				msg:data, //'Password Tidak Boleh Kosong.',
				timeout:2000,
				showType:'slide'
			});
			$('#datagrid-crud').datagrid('reload');
			$('#dialog-form').dialog('close');
		}
	});
	return false();
}

function update(){
	var row = $('#datagrid-crud').datagrid('getSelected');
	if(row){
		$('#dialog-form').dialog('open').dialog('setTitle','Edit Data');
		$('#d-form').form('load',row);
	}
}
function remove(){  
	var row = $('#datagrid-crud').datagrid('getSelected');  
	if (row){  
		$.messager.confirm('Confirm','Apakah Anda akan menghapus data ini ?',function(r){  
			if (r){  
				$.ajax({
					type	: "POST",
					url		: "<?php echo site_url('spm/hapus_detail'); ?>",
					data	: 'id='+row.id,
					success	: function(data){
						$.messager.show({
							title:'Info',
							msg:data,
							timeout:2000,
							showType:'slide'
						});
						$('#datagrid-crud').datagrid('reload');
					}
				});  
			}  
		});  
	}  
} 
function doSearch(value){  
	$('#datagrid-crud').datagrid('load',{    
        cari: value //$('#productid').val()  
    });  
}  
</script>
<style type="text/css">
textarea {
	width:350px;
}
</style>
<div style="padding:10px;">
<form id="h-form" method="post" novalidate>
<table width="100%">
<tr>
<td width="50%" valign="top">
		<div class="form-item">
			<label for="type">Nomor</label><br />
			<input type="text" name="nomor" id="nomor" value="<?php echo $nomor;?>" class="easyui-validatebox" required="true" size="30" maxlength="30"  />
		</div>
        <div class="form-item">
			<label for="type">Tanggal</label><br />
			<input type="text" name="tanggal" id="tanggal" class="easyui-validatebox" required="true" size="12" maxlength="12"  />
		</div>
		<div class="form-item">
			<label for="type">Th Anggaran</label><br />
			<input type="text" name="th_anggaran" id="th_anggaran" class="easyui-validatebox" required="true" size="5" maxlength="5" />
		</div>
        <div class="form-item">
			<label for="type">Cara Bayar</label><br />
			<select name="cara_bayar" id="cara_bayar">
            <option value="">-PILIH-</option>
            <option value="TUNAI">TUNAI</option>
            <option value="GIRO BANK">GIRO BANK</option>
            </select>
		</div>
        <div class="form-item">
			<label for="type">Mata Anggaran</label><br />
			<select name="mata_anggaran" id="mata_anggaran">
            <option value="">-PILIH-</option>
            <option value="525111">525111</option>
            <option value="525115">525115</option>
            <option value="525119">525119</option>
            <option value="537112">537112</option>
            </select>
		</div>
</td>
<td width="50%" valign="top">
		<div class="form-item">
			<label for="type">Kepada</label><br />
			<input type="text" name="kepada" id="kepada" class="easyui-validatebox" required="true" size="35" maxlength="35" />
		</div>
        <div class="form-item">
			<label for="type">NPWP</label><br />
			<input type="text" name="npwp" id="npwp" class="easyui-validatebox" required="true" size="20" maxlength="20" />
		</div>
        <div class="form-item">
			<label for="type">Rekening</label><br />
			<input type="text" name="rekening" id="rekening" class="easyui-validatebox" required="true" size="20" maxlength="20" />
		</div>
        <div class="form-item">
			<label for="type">BANK/POS</label><br />
			<input type="text" name="bank_pos" id="bank_pos" class="easyui-validatebox" required="true" size="50" maxlength="50" />
		</div>
        <div class="form-item">
			<label for="type">Uraian</label><br />
			<textarea name="uraian" id="uraian" rows="3"></textarea>
		</div>
</td>
</tr>
<tr>
<td colspan="2" align="center">
<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="simpan()">Simpan</a>
	<a href="<?php echo base_url();?>index.php/spm" class="easyui-linkbutton" iconCls="icon-close" plain="true">Tutup </a>
</td>
</tr>
</table>       
	</form>            
</div>

<!-- Data Grid -->
<table id="datagrid-crud" title="Detail" class="easyui-datagrid" style="width:auto; height: auto;" url="<?php echo site_url('spm/view_detail'); ?>?grid=true" toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" collapsible="true">
	<thead>
		<tr>
			<th field="id" width="10" sortable="true">ID</th>
            <th field="pengeluaran_akun" width="50" sortable="true">Pengeluaran Akun</th>
			<th field="pengeluaran_uang" width="50" sortable="true">Pengeluaran Uang</th>
            <th field="potongan_akun" width="50" sortable="true">Potongan Akun</th>
            <th field="potongan_uang" width="50" sortable="true">Potongan Uang</th>
		</tr>
	</thead>
</table>

<!-- Toolbar -->
<div id="toolbar" >
<table cellpadding="0" cellspacing="0" style="width:100%">
<tr>
	<td style="padding-left:2px;"> 
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="create()">Tambah</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="update()">Edit </a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="remove()">Hapus</a>
</tr>    
</table>
</div> 

<!-- Dialog Form -->
<div id="dialog-form" class="easyui-dialog" style="width:500px; height:auto; padding: 20px 30px" closed="true" buttons="#dialog-buttons">
	<form id="d-form" method="post" novalidate>
		<div class="form-item">
			<label for="type">Pengeluaran Akun</label><br />
			<input type="text" name="pengeluaran_akun" id="pengeluaran_akun" class="easyui-validatebox" required="true" size="30" maxlength="30"  />
		</div>
        <div class="form-item">
			<label for="type">Pengeluaran Uang</label><br />
			<input type="text" name="pengeluaran_uang" id="pengeluaran_uang" class="easyui-validatebox" required="true" size="30" maxlength="30"  />
		</div>
		<div class="form-item">
			<label for="type">Potongan Akun</label><br />
			<input type="text" name="potongan_akun" id="potongan_akun" class="easyui-validatebox" required="true" size="30" maxlength="30" />
		</div>
        <div class="form-item">
			<label for="type">Potongan Uang</label><br />
			<input type="text" name="potongan_uang" id="potongan_uang" class="easyui-validatebox" required="true" size="30" maxlength="30" />
		</div>
	</form>
</div>

<!-- Dialog Button -->
<div id="dialog-buttons">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan_detail()">Simpan</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:jQuery('#dialog-form').dialog('close')">Batal</a>
</div>
