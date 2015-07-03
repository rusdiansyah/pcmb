<style type="text/css">
*{
font-family: Arial;
margin:0px;
padding:0px;
}
@page {
 margin-left:3cm 2cm 2cm 2cm;
}
table.grid{
width:29.7cm ; /* width:20.99cm ; */
font-size: 9px;
border-collapse:collapse;
}
table.grid th{
	padding:5px;
}
table.grid th{
background: #F0F0F0;
border-top: 0.2mm solid #000;
border-bottom: 0.2mm solid #000;
text-align:center;
border:1px solid #000;
}
table.grid tr td{
	padding:2px;
	border-bottom:0.2mm solid #000;
	border:1px solid #000;
}
h1{
font-size: 14px;
}
h2{
font-size: 12px;
}
h3{
font-size: 12px;
}
p {
font-size: 10px;
}
center {
	padding:8px;
}
.atas{
display: block;
width:29.7cm ;
margin:0px;
padding:0px;
}
.kanan tr td{
	font-size:12px;
}
.attr{
font-size:9pt;
width: 100%;
padding-top:2pt;
padding-bottom:2pt;
border-top: 0.2mm solid #000;
border-bottom: 0.2mm solid #000;
}
.pagebreak {
width:29.7cm ;
page-break-after: always;
margin-bottom:10px;
}
.akhir {
width:29.7cm ;
font-size:13px;
}
.page {
width:29.7cm ;
font-size:12px;
padding:10px;
}
table.footer{
width:29.7cm ;
font-size: 12px;
border-collapse:collapse;
}
</style>
<?php
$th = $this->config->item('thak');
function myheader($th){
?>
<div class="atas">
<center><h1>LAPORAN PCMB IAIN SMH BANTEN <br />TAHUN AKADEMIK <?php echo $th;?></h1></center>
</div>
<table class="grid" width="100%">
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
}
function myfooter(){	
	echo "</table>";
}
	$no=1;
	$page =1;
	foreach($data->result_array() as $r){
	$jur1 = $this->app_model->cari_jurusan($r['Jur1']);
	$jur2 = $this->app_model->cari_jurusan($r['Jur2']);
	$jur3 = $this->app_model->cari_jurusan($r['Jur3']);
	$tgl = $this->app_model->tgl_str($r['TglLhr']);
	if(($no%15) == 1){
   	if($no > 1){
        myfooter();
        echo "<div class=\"pagebreak\" align='right'>
		<div class='page' align='center'>Hal - $page</div>
		</div>";
		$page++;
  	}
   	myheader($th);
	}
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
myfooter();	
	echo "</table>";
?>
<div style="padding:10px"></div>
<table width="100%" class="footer">
<tr>
	<td width="70%"></td>
	<td width="30%" valign="top" align="center">
    Serang, <?php echo $this->app_model->tgl_indo(date('Y-m-d'));?>
    <br /><br /><br /><br />
    <b><u><?php echo $this->config->item('ketua_panitia');?></u></b>
    </td>
</tr>
</table>    
<div class="page" align="center">Hal - <?php echo $page;?></div>