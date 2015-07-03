<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=laporan_pcmb.xls");
header("Pragma: no-cache");
header("Expires: 0");
$th = $this->config->item('thak');
?>
<center><h1>LAPORAN NILAI PCMB IAIN SMH BANTEN <br />TAHUN AKADEMIK <?php echo $th;?></h1></center>
<table border="1" width="100%">
	<tr>
    	<th width="20">No</th>
        <th width="150">No Ujian</th>
        <th width="300">Nama </th>
        <th width="50">L/P</th>
		<th width="100">PIL 1</th>
		<th width="100">PIL 2</th>
		<th width="100">PIL 3</th>
        <th width="100">NPU</th>
        <th width="100">NPA</th>
		<th width="100">NBA</th>
        <th width="100">NBI</th>
		<th width="100">NWA</th>
	</tr> 
<?php 
$no=1;   
foreach($data->result_array() as $r){
	$npu = $this->admin_model->npu($r['NoUjian']);
	$npa = $this->admin_model->npa($r['NoUjian']);
	$nba = $this->admin_model->nba($r['NoUjian']);
	$nbi = $this->admin_model->nbi($r['NoUjian']);
	$nwa = $this->admin_model->nwa($r['NoUjian']);
?>
<tr>
    <td align="center"><?php echo $no;?></td>
    <td align="center"><?php echo $r['NoUjian'];?></td>
    <td ><?php echo $r['Nama'];?></td>
    <td align="center"><?php echo $r['JK'];?></td>
	<td align="center"><?php echo $r['Jur1'];?></td>
	<td align="center"><?php echo $r['Jur2'];?></td>
	<td align="center"><?php echo $r['Jur3'];?></td>
    <td ><?php echo $npu;?></td>
    <td ><?php echo $npa;?></td>
	<td ><?php echo $nba;?></td>
    <td ><?php echo $nbi;?></td>
	<td ><?php echo $nwa;?></td>
</tr>
    <?php
	$no++;
	}    
?>
</table>