<script type="text/javascript">
$(document).ready(function() {
	$("#Jur1").change(function(){
		var jur = $("#Jur1").val();
		$.ajax({
			  type	: 'POST',
			  url	: "<?php echo site_url(); ?>/peserta/home/list_jur",
			  data	: "jur="+jur,
			  cache	: false,
			  success	: function(data){
				 $("#Jur2").html(data);
			  }
		  });
	});
	
	$("#Jur2").change(function(){
		var jur1 = $("#Jur1").val();
		var jur2 = $("#Jur2").val();
		$.ajax({
			  type	: 'POST',
			  url	: "<?php echo site_url(); ?>/peserta/home/list_jur2",
			  data	: "jur1="+jur1+"&jur2="+jur2,
			  cache	: false,
			  success	: function(data){
				 $("#Jur3").html(data);
			  }
		  });
	});
	
		
	$("#simpan").click(function(){
		var Jur1 = $("#Jur1").val();
		var Jur2 = $("#Jur2").val();
		var Jur3 = $("#Jur3").val();
		
		var string = $("#my-form").serialize();
			
		if(Jur1.length==0){
			$('.bottom-right').notify({
				message: {text: 'Maaf, Pilihan Jurusan Pertama tidak boleh kosong'},type:'info'
			}).show();
			$("#Jur1").focus();
			return false();
		}
		if(Jur2.length==0){
			$('.bottom-right').notify({
				message: {text: 'Maaf, Pilihan Jurusan Kedua tidak boleh kosong'},type:'info'
			}).show();
			$("#Jur2").focus();
			return false();
		}
		if(Jur3.length==0){
			$('.bottom-right').notify({
				message: {text: 'Maaf, Pilihan Jurusan Ketiga tidak boleh kosong'},type:'info'
			}).show();
			$("#Jur3").focus();
			return false();
		}
		/*
		if(Jur1==Jur2){
			$('.bottom-right').notify({
				message: {text: 'Maaf, Anda tidak berhak memilih pilihan yang sama'},type:'info'
			}).show();
			$("#Jur2").focus();
			return false();
		}
		*/
		if (confirm('Pilihan Jurusan tidak dapat diulang, apakah yakin akan menyimpannya ?')){
			var link = $(this);
			$.ajax({
				type	: 'POST',
				url		: "<?php echo site_url(); ?>/peserta/home/simpan_prodi",
				data	: string,
				cache	: false,
				dataType   : 'json',
				success	: function(data){
					if(data.status != 'error'){
						window.location.assign("<?php echo site_url();?>/peserta/home/survey")
					}
					alert(data.msg);
				}
			});
		}
	});
	
});
</script>
<div class="ui-widget">
  <div class="ui-state-highlight ui-corner-all">
    <p><i class="icon-user"></i>
    <strong><?php echo $judul;?></strong></p>
  </div>
</div>
Untuk memilih Program Studi, Anda harus mengikuti aturan sebagai berikut
<ol>
<li>Anda diperkenankan memilih 2 (dua) jurusan yang Anda minati.</li>
<li>Urutan pemilihan Anda merupakan prioritas Anda.</li>
<li>Diterima atau tidak-nya Anda pada Program Studi yang Anda pilih, bergantung pada daya tampung masing-masing jurusan.
Jika nilai Anda masih memenuhi, namun daya tampung sudah tidak mencukupi, maka Anda dimasukkan ke Program Studi dengan 
prioritas di bawahnya selama daya tampung masih memenuhi.</li>
<li>Anda juga diperkenankan memilih Program Studi dengan keduannya berada pada Program Studi yang berbeda-beda</li>
</ol>
<form id="my-form" name="my-form" method="POST" action="#">
<table class="table table-bordered table-striped table-hover">
<tbody>
<tr>
	<td colspan="2"><h4>D. Pilihlah Program Studi dibawah ini</h4></td>
</tr>    
<tr>	
	<td>Pilihan Pertama</td>
	<td>
		<select name="Jur1" id="Jur1" class="span8">
		<option value="">-PILIH PROGRAM STUDI-</option>
		<?php
		foreach ($l_prodi->result() as $t) {
		?>
		<option value="<?php echo $t->sing_baru;?>"><?php echo $t->Fak;?> - <?php echo $t->jur_baru;?></option>
		<?php
		}
		?>
		</select>
	</td>
</tr>
<tr>	
	<td>Pilihan Kedua</td>
	<td>
		<select name="Jur2" id="Jur2" class="span8">
		<option value="">-PILIH PROGRAM STUDI-</option>
		</select>
	</td>
</tr>
<tr>	
	<td>Pilihan Ketiga</td>
	<td>
		<select name="Jur3" id="Jur3" class="span8">
		<option value="">-PILIH PROGRAM STUDI-</option>
		</select>
	</td>
</tr>
<tr>
	<td colspan="2">Silahkan Klik Lanjut !!!</td>
</tr>    
<tr>
	<td colspan="2"><center>
    <a href="<?php echo base_url();?>index.php/peserta/home/foto" class="btn btn-info"><i class="icon-hand-left icon-white"></i> Kembali</a>
    <button type="button" name="simpan" id="simpan" class="btn btn-primary" onclick="return();"><i class="icon-hand-right icon-white"></i> Lanjut Ke Step 4</button>
    </center>
</tbody>
</table>
</form>