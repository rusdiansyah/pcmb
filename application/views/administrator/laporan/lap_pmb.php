<script type="text/javascript">
var url;
function cetak_html(){
	var th = $("#th").val();
	var jurusan = $("#jurusan").val();
	
	if(th.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, Tahun tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#th").focus();
		return false();
	}
	if(jurusan.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, Jurusan tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#jurusan").focus();
		return false();
	}
	
	window.open('<?php echo site_url();?>/administrator/laporan/cetak_lap_pmb/'+th+'/'+jurusan);
	return false();
}
function cetak_excel(){
	var th = $("#th").val();
	var jurusan = $("#jurusan").val();
	
	if(th.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, Tahun tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#th").focus();
		return false();
	}
	if(jurusan.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, Jurusan tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#jurusan").focus();
		return false();
	}
	
	window.open('<?php echo site_url();?>/administrator/laporan/cetak_lap_pmb_excel/'+th+'/'+jurusan);
	return false();
}
</script>
<!-- Dialog Form -->
<div id="dialog-form">
	<form id="form" method="post" novalidate>
		<div class="form-item">
			<label for="type">Tahun Akademik</label><br />
			<select name="th" id="th">
            <option value="">-Pilih-</option>
            <?php
			foreach($th->result() as $t){
				echo "<option value=$t->ThAjaran>$t->ThAjaran</option>";
			} ?>
            </select>
		</div>
		<div class="form-item">
			<label for="type">Jurusan Pilihan 1</label><br />
			<select name="jurusan" id="jurusan">
            <option value="all">Semua Data</option>
             <?php
			foreach($jurusan->result() as $t){
				echo "<option value=$t->sing_baru>$t->jur_baru</option>";
			} ?>
            </select>
		</div>
	</form>
</div>
<!-- Dialog Button -->
<div id="dialog-buttons">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" onclick="cetak_html()">Cetak Ke HTML</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" onclick="cetak_excel()">Cetak Ke Excel</a>
</div>
