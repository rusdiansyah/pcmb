<script type="text/javascript">
$(document).ready(function() {
		
	$("#simpan").click(function(){
		var cek = $(".cek:checked");
		
		var string = $("#my-form").serialize();
			
		if(cek.length==0){
			$('.bottom-right').notify({
				message: {text: 'Maaf, Anda harus memilih salah satunya'},type:'info'
			}).show();
			return false();
		}
		
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/peserta/home/simpan_survey",
			data	: string,
			cache	: false,
			success	: function(data){
				window.location.assign("<?php echo site_url();?>/peserta/home/selesai")
			}
		});

	});
	
});
</script>
<div class="ui-widget">
  <div class="ui-state-highlight ui-corner-all">
    <p><i class="icon-user"></i>
    <strong><?php echo $judul;?></strong></p>
  </div>
</div>
<form id="my-form" name="my-form" method="POST" action="#">
<table class="table table-bordered table-striped table-hover">
<tbody>
<tr>
	<td colspan="2"><h4>Selamat data telah disimpan.</h4></td>
</tr>
<tr>
	<td class="span4">Nomor Ujian Anda </td>
    <td><strong><?php echo $this->app_model->CariNoUjian($this->session->userdata('nim'));?></strong></td>
</tr>     
<tr>
	<td class="span4">Ruang Ujian Anda </td>
    <td><strong><?php echo $this->app_model->CariRuangUjian($this->session->userdata('nim'));?></strong></td>
</tr>      
<tr>
	<td colspan="2"><h4>Dari mana Anda tahu Kampus IAIN SMH Banten</h4></td>
</tr>    
<tr>	
	<td colspan="2">
    <ol>
    <li><input type="checkbox" class="cek" name="cek1" value="Koran," />Koran</li>
    <li><input type="checkbox" class="cek" name="cek2" value="Spanduk," />Spanduk</li>
    <li><input type="checkbox" class="cek" name="cek3" value="Brosur," />Brosur</li>
    <li><input type="checkbox" class="cek" name="cek4" value="Teman," />Teman</li>
    <li><input type="checkbox" class="cek" name="cek5" value="Alumni," />Alumni</li>
    <li><input type="checkbox" class="cek" name="cek6" value="Internet," />Internet</li>
    <li><input type="checkbox" class="cek" name="cek7" value="TV," />TV</li>
    <li><input type="checkbox" class="cek" name="cek8" value="Radio," />Radio</li>
    <li><input type="checkbox" class="cek" name="cek9" value="Lainnya," />Lainnya</li>
    </ol>
    </td>
</tr>

<tr>
	<td colspan="2"><h4>Selesai !!!</h4></td>
</tr>    
<tr>
	<td colspan="2"><center>
    <button type="button" name="simpan" id="simpan" class="btn btn-primary" onclick="return();"><i class="icon-hand-right icon-white"></i> Lanjut Ke Step 5</button>
    </center>
</tbody>
</table>
</form>