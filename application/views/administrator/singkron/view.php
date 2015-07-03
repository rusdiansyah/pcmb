<script type="text/javascript">
var url;
	$( "#cari" ).datepicker();
	$( "#tgl" ).datepicker();
function proses(){  
	var tgl = $("#tgl").val(); 
	 
	 if(tgl.length==0){
		alert('Maaf, Tanggal tidak boleh kosong');
		$("#tgl").focus();
		return false();
	}
	$.ajax({
		type	: "POST",
		url		: "<?php echo site_url('singkron/proses'); ?>",
		data	: 'tgl='+tgl,
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

function doSearch(){  
	var value =$('#cari').val() ;
	if(value.length==0){
		alert('Maaf, Tanggal tidak boleh kosong');
		$("#cari").focus();
		return false();
	}
	$('#datagrid-crud').datagrid('load',{    
        cari: $('#cari').val()  
    });  
	//alert(value);
}  
</script>
<!-- Data Grid -->
<table id="datagrid-crud" title="Daftar <?php echo $judul;?>" class="easyui-datagrid" style="width:auto; height: auto;" url="<?php echo site_url('singkron/view'); ?>?grid=true" toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" collapsible="true">
	<thead>
		<tr>
			<th field="nim" width="30" sortable="true">NIM</th>
			<th field="nama" width="50" sortable="true">Nama</th>
            <th field="angkatan" width="20" sortable="true">Angkatan</th>
            <th field="kode_bayar" width="20" sortable="true">Kode Bayar</th>
            <th field="pin" width="30" sortable="true">PIN</th>
            <th field="tahun" width="20" sortable="true" align="center">Tahun</th>
            <th field="jml_tarif" width="30" sortable="true" align="right">Jumlah Tarif</th>
            <th field="flag_status" width="20" sortable="true">Flag</th>
            <th field="flag_status_H2H" width="20" sortable="true">Flag H2H</th>
            <th field="tanggal_bayar" width="30" sortable="true">Tanggal Bayar</th>
		</tr>
	</thead>
</table>

<!-- Toolbar -->
<div id="toolbar" >
<table cellpadding="0" cellspacing="0" style="width:100%">
<tr>
	<td style="padding-left:2px;"> 
	Tanggal: <input name="tgl" id="tgl" style="width:100px"> 
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="proses()">Proses</a>
    <a href="<?php echo base_url();?>index.php/singkron" class="easyui-linkbutton" iconCls="icon-reload" plain="true">Refresh</a>
    </td>
    <td style="text-align:right; padding-right:2px;">
    Cari Tanggal : <input name="cari" id="cari" style="width:100px">  <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="doSearch()">Cari</a>
    </td>
</tr>    
</table>
</div>                
