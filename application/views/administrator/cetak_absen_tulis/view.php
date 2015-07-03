<script type="text/javascript">
var url;
function cetak(){
	var tahun = $('#tahun').val();
	var ruang = $('#ruang').val();
	
	if(tahun.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, Tahun Ajaran tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#tahun").focus();
		return false();
	}
	if(ruang.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, Ruang Ujian tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#ruang").focus();
		return false();
	}
	 window.location.assign("<?php echo site_url();?>/administrator/cetak_absen_tulis/cetak/"+tahun+'/'+ruang);
}
</script>
<div id="form" class="easyui-windo" style="width:500px; height:auto; padding: 20px 30px">
<table width="80%">
<tr>
	<td width="20%">Tahun Ajaran</td>
    <td>
        <select name="tahun" id="tahun">
        <option value="">-Pilih-</option>
        <?php
		$data = $this->admin_model->tahun();
		foreach($data->result() as $t){
		?>
        <option value="<?php echo $t->ThAjaran;?>"><?php echo $t->ThAjaran;?></option>
        <?php
		}?>
        </select>
	</td>
</tr>
<tr>
	<td width="20%">Ruang</td>
    <td>
        <select name="ruang" id="ruang">
        <option value="">-Pilih-</option>
        <?php
		$data = $this->admin_model->ruang();
		foreach($data->result() as $t){
		?>
        <option value="<?php echo $t->RUjian;?>"><?php echo $t->RUjian;?></option>
        <?php
		}?>
        </select>
	</td>
</tr>
<tr>
	<td colspan="2" align="center">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" onclick="cetak()">Cetak</a>
    </td>
</tr>    
</table>    
</div>