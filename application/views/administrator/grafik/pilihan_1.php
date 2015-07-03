<script type="text/javascript">
$(function () {
var chart;
$(document).ready(function() {
chart = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },  
         title: {
            text: 'PRODI PILIHAN 1'
         },
         xAxis: {
            categories: ['Program Studi']
         },
         yAxis: {
            title: {
               text: 'Jumlah Calon Mahasiswa'
            }
         },
              series: [           
<?php
//$th = $this->config->item('thak');
foreach($data->result() as $t){
	$prodi=$t->sing_baru;
	$sql_jumlah = $this->admin_model->grafik_pilihan1($prodi);            
	  ?>
	  {
			  name: '<?php echo $prodi; ?>',
			  data: [<?php echo $sql_jumlah; ?>],
			  dataLabels: {
					enabled: true,
					color: '#FFFFFF',
					align: 'center',
					x: 0,
					y: 20,
					formatter: function() {
						return this.y;
					}
				}	
	  },
<?php } ?>
]
});    
}); 
});
</script>
<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>