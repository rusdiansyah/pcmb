<script type="text/javascript">
var url;
function cetak(){
	var jurusan = $("#jurusan").val();
	
	if(jurusan.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, Ruangan tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#jurusan").focus();
		return false();
	}
	window.open('<?php echo site_url();?>/administrator/laporan/cetak_absen_lisan/'+jurusan);
	return false();
}
</script>
<!-- Dialog Form -->
<div id="dialog-form" >
	<form id="form" method="post" novalidate>
        <div class="form-item">
			<label for="type">Ruangan</label><br />
			<select name="jurusan" id="jurusan">
            <option value="">-Pilih Ruangan-</option>
             <?php
			foreach($ruang->result() as $t){
				echo "<option value=$t->RUjian>$t->RUjian</option>";
			} ?>
            </select>
		</div>
	</form>
</div>
<!-- Dialog Button -->
<div id="dialog-buttons" style="padding:5px;">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" onclick="cetak()">Cetak</a>
</div>
