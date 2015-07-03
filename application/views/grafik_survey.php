<?php
$total =0;
$tot =0;
$a=1;
foreach($survey->result() as $t){
	$jml = $t->jml;
	$persen = $jml; 
	$data[$a] = "['".$t->survey."',".$persen."]";
	$a++;
	$tot=$tot+$jml;
}
$total = $jml_survey->num_rows(); //$tot;
$tampil_data = '';
$jml_data = $survey->num_rows();
for ($i=1; $i<=$jml_data; $i++) {

	$tampil_data .= $data[$i];
	if($i < $jml_data) $tampil_data .= ',';
}

?>
<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Dari mana Anda tahu Kampus IAIN SMH Banten ?'
            },
			subtitle: {
                text: 'Total Responden : <?php echo $total;?> Calon Mahasiswa'
            },
            tooltip: {
        	    pointFormat: '{series.name}: <b>{point.percentage}%</b>',
            	percentageDecimals: 0
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        formatter: function() {
                            return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Total :<?php echo $total;?> Calon Mahasiswa',
                data: [<?php echo $tampil_data;?>]
            }]
        });
    });    
});
</script>
<ul id="crumbs">
		<li><a href="<?php echo base_url();?>index.php/home" class="home"><i class="icon-home icon-black"></i>Home</a></li>
        <li class="active">Grafik Survey</li>
</ul>
<br>
<div class="thumbnails">
<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>