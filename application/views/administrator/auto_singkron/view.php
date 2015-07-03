<script type="text/javascript">
var x = 1;
function cek(){
    $.ajax({
        url: "<?php echo site_url('auto_singkron/proses'); ?>",
        cache: false,
        success: function(msg){
            $("#notifikasi").html(msg);
        }
    });
    var waktu = setTimeout("cek()",3000);
}
$(document).ready(function(){
    cek();
});
</script>
<p>Proses sedang berjalan .... <img src="<?php echo base_url();?>asset/images/ajax-loader.gif" /></p>
<div id="notifikasi"></div>