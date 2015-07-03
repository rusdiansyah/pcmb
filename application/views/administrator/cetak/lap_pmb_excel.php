<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=laporan_pcmb.xls");
header("Pragma: no-cache");
header("Expires: 0");
$th = $this->config->item('thak');
?>
<center><h1>LAPORAN PCMB IAIN SMH BANTEN <br />TAHUN AKADEMIK <?php echo $th;?></h1></center>
<table border="1" width="100%">
	<tr>
    	<th width="20">No</th>
        <th width="150">No Ujian</th>
        <th width="150">No Daftar</th>
        <th width="300">Nama </th>
        <th width="250">Tmpt Lahir</th>
        <th width="150">Tgl Lahir</th>
        <th width="50">L/P</th>
        <th width="300">Asal Sekolah</th>
        <th width="200">Pilihan 1</th>
        <th width="200">Pilihan 2</th>
        <th width="200">Pilihan 3</th>
	</tr> 
<?php 
$no=1;   
foreach($data->result_array() as $r){
	$jur1 = $this->app_model->cari_jurusan($r['Jur1']);
	$jur2 = $this->app_model->cari_jurusan($r['Jur2']);
	$jur3 = $this->app_model->cari_jurusan($r['Jur3']);
	$tgl = $this->app_model->tgl_indo($r['TglLhr']);
?>
<tr>
    <td align="center"><?php echo $no;?></td>
    <td align="center"><?php echo $r['NoUjian'];?></td>
    <td align="center"><?php echo $r['NoDaftar'];?></td>
    <td ><?php echo $r['Nama'];?></td>
    <td ><?php echo $r['TmptLhr'];?></td>
    <td align="center"><?php echo $tgl;?></td>
    <td align="center"><?php echo $r['JK'];?></td>
    <td ><?php echo $r['NmAsalSek'];?></td>
    <td ><?php echo $jur1;?></td>
    <td ><?php echo $jur2;?></td>
    <td ><?php echo $jur3;?></td>
</tr>
    <?php
	$no++;
	}    
?>
</table>