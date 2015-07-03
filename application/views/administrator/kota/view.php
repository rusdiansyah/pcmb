<script type="text/javascript">
var url;
function create(){
	jQuery('#dialog-form').dialog('open').dialog('setTitle','Tambah Data');
	jQuery('#form').form('clear');
}
function save(){
	var id_provinsi = $("#id_provinsi").val();
	var id_kota = $("#id_kota").val();
	
	var string = $("#form").serialize();
	if(id_provinsi.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, Provinsi tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#id_provinsi").focus();
		return false();
	}
	
	$.ajax({
		type	: "POST",
		url		: "<?php echo site_url('administrator/kota/simpan'); ?>",
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
		$('#form').form('load',row);
	}
}
function remove(){  
	var row = $('#datagrid-crud').datagrid('getSelected');  
	if (row){  
		$.messager.confirm('Confirm','Apakah Anda akan menghapus data ini ?',function(r){  
			if (r){  
				$.ajax({
					type	: "POST",
					url		: "<?php echo site_url('administrator/kota/hapus'); ?>",
					data	: 'id='+row.id_provinsi,
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
<!-- Data Grid -->
<table id="datagrid-crud" title="Daftar <?php echo $judul;?>" class="easyui-datagrid" style="width:auto; height: auto;" url="<?php echo site_url('administrator/kota/view'); ?>?grid=true" toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" collapsible="true">
	<thead>
		<tr>
			<th field="id_kab_kota" width="10" sortable="true">ID</th>
			<th field="id_provinsi" width="50" sortable="true">ID Provinsi</th>
            <th field="kab_kota" width="50" sortable="true">Kota</th>
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
    <a href="<?php echo base_url();?>index.php/administrator/kota" class="easyui-linkbutton" iconCls="icon-reload" plain="true">Refresh</a>
    </td>
    <td style="text-align:right; padding-right:2px;">
	<input id="cari" class="easyui-searchbox" data-options="prompt:'Pencarian data..',searcher:doSearch" style="width:200px"></input> 
    </td>
</tr>    
</table>
</div>                

<!-- Dialog Form -->
<div id="dialog-form" class="easyui-dialog" style="width:500px; height:auto; padding: 20px 30px" closed="true" buttons="#dialog-buttons">
	<form id="form" method="post" novalidate>
		<div class="form-item">
			<label for="type">ID</label><br />
			<input type="text" name="id_provinsi" id="id_provinsi" class="easyui-validatebox" required="true" size="30" maxlength="30"  />
		</div>
        <div class="form-item">
			<label for="type">Provinsi</label><br />
			<select name="id_kota" id="id_kota">
            <option value="">-Pilih-</option>
            <?php
			$data = $this->admin_model->list_provinsi();
			foreach($data->result()as $t){
			?>
            <option value="<?php echo $t->id_provinsi;?>"><?php echo $t->provinsi;?></option>
            <?php
			}
			?>
            </select>
		</div>
		<div class="form-item">
			<label for="type">Kota</label><br />
			<input type="text" name="kota" id="kota" class="easyui-validatebox" required="true" size="50" maxlength="50" />
		</div>
	</form>
</div>

<!-- Dialog Button -->
<div id="dialog-buttons">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="save()">Simpan</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:jQuery('#dialog-form').dialog('close')">Batal</a>
</div>
