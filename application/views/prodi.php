<script type="text/javascript">
$(function() {
	$("#fak").change(function(){
		var id = $("#fak").val();
		$.ajax({
		  type	: 'POST',
		  url	: "<?php echo site_url(); ?>/ref_json/list_Jurusan",
		  data	: "id="+id,
		  cache	: false,
		  success	: function(data){
			  $("#jurusan").html(data);
		  }
	  });
	});
});
</script>
<ul id="crumbs">
		<li><a href="<?php echo base_url();?>index.php/home" class="home"><i class="icon-home icon-black"></i>Home</a></li>
		<li class="active">Program Studi</li>
</ul>
<br>
<label>Faktultas</label>
<select name="fak" id="fak" class="span5">
<option value="">-PILIH-</option>
<?php
foreach ($l_fak->result() as $t) {
?>
<option value="<?php echo $t->Fak;?>"><?php echo $t->Fak;?></option>
<?php
}
?>
</select>
<div id="jurusan"></div>