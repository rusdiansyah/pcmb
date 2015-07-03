<?php
foreach($polling_tanya->result_array() as $db){
	$tanya = $db['pilihan'];
}
    
$total=0;
foreach($polling_hasil->result_array() as $t){
	$total =$total+$t['rating'];
}

$tampil_data = '';
$a=1;
foreach($polling_hasil->result_array() as $t){
	$persen = round(($t['rating']/$total)*100,0);
	$data[$a] = "['".$t['pilihan']."',".$persen."]";
	$a++;
}

$tampil_data = '';
for ($i=1; $i<=3; $i++) {

	$tampil_data .= $data[$i];
	if($i < 3) $tampil_data .= ',';
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
                text: 'Hasil Survey Kepuasan Pelanggan'
            },
			subtitle: {
                text: '<?php echo $tanya;?>'
            },
            tooltip: {
        	    pointFormat: '{series.name}: <b>{point.percentage}%</b>',
            	percentageDecimals: 1
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
                name: 'Total :<?php echo $total;?> Responden',
                data: [<?php echo $tampil_data;?>]
            }]
        });
    });    
});
</script>
<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>