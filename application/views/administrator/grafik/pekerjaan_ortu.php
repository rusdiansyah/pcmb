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
            text: 'Grafik Berdasarkan Pekerjaan Ayah'
         },
         xAxis: {
            categories: ['Pekerjaan Orang Tua (Ayah)']
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
	$prodi=$t->KerjaOrtu;
	$sql_jumlah = $this->admin_model->grafik_pekerjaan_ayah($prodi);            
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

<script type="text/javascript">
$(function () {
var chart;
$(document).ready(function() {
chart = new Highcharts.Chart({
         chart: {
            renderTo: 'container_ibu',
            type: 'column'
         },  
         title: {
            text: 'Grafik Berdasarkan Pekerjaan Ibu'
         },
         xAxis: {
            categories: ['Pekerjaan Orang Tua (Ibu)']
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
	$prodi=$t->KerjaOrtu;
	$sql_jumlah = $this->admin_model->grafik_pekerjaan_ibu($prodi);            
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
<div id="container_ibu" style="min-width: 400px; height: 400px; margin: 0 auto"></div>