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
width:20.99cm ; 
font-size: 12px;
border-collapse:collapse;
}
table.grid th{
	padding:7px;
}
table.grid th{
background: #F0F0F0;
border:1px solid #000;
border-top: 1px solid #000;
border-bottom: 2px groove #000;
text-align:center;
}
table.grid tr td{
	padding:5px;
	border-bottom:0.2mm solid #000;
	border:1px solid #000;
}
h1{
font-size: 16px;
}
h2{
font-size: 14px;
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
width:20.99cm ; 
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
width:20.99cm ; 
page-break-after: always;
margin-bottom:10px;
}
.akhir {
width:20.99cm ; 
font-size:13px;
}
.page {
width:20.99cm ; 
font-size:12px;
padding:10px;
}
table.footer{
width:20.99cm ; 
font-size: 12px;
border-collapse:collapse;
}
table.footer tr td {
	padding:5px;
}
</style>
<?php
$th = $this->config->item('thak');
?>
<div class="atas">
<img src="<?php echo base_url();?>asset/images/kop.JPG" width="800" />
<center><h1>PENILAIAN TES BACA TULIS AL-QUR'AN PCMB <br />TAHUN AKADEMIK <?php echo $th;?></h1></center>
<div style="float:left">Jenjang : S1</div>
<div style="float:right">Ruang : <?php echo $ruang;?></div>
</div>
<table class="grid" width="100%">
	<tr>
    	<th width="20" rowspan="2" >No</th>
        <th width="150" rowspan="2">No Ujian</th>
        <th width="300" rowspan="2">Nama </th>
        <th width="20" rowspan="2">L/P</th>
        <th width="150" colspan="3">Nilai Kemampuan Membaca</th>
        <th width="50" rowspan="2">Jumlah<br />Baca</th>
        <th width="50" rowspan="2">Nilai<br />Tulis</th>
        <th width="50" rowspan="2">Jumlah<br />Total</th>
	</tr>        
    <tr>
    	<th width="50">Tajwid</th>
        <th width="50">Makhraj</th>
        <th width="50">Fashahah</th>
	</tr>        
<?php
	$no=1;
	foreach($data->result_array() as $r){
?>
    <tr>
    	<td align="center"><?php echo $no;?></td>
        <td align="center"><?php echo $r['NoUjian'];?></td>
        <td ><?php echo str_replace(";","",strtoupper($r['Nama']));?></td>
        <td align="center"><?php echo $r['JK'];?></td>
        <td ></td>
        <td ></td>
        <td ></td>
        <td ></td>
        <td ></td>
        <td ></td>
    </tr>
    <?php
	$no++;
	}
?>
</table>
<div style="padding:10px"></div>
<table width="100%" class="footer">
<tr>
	<td width="50%" valign="top"> 
    Keterangan Nilai :
    <ol>       
    <li>1. Tajwid = 20 - 40</li>
    <li>2. Makhraj = 10 - 30</li>
    <li>3. Fashahah = 10 - 30</li>
    <li>4. Tes Tulis = 5 - 100</li>
    </ol>
    </td>
	<td width="50%" valign="top" align="center">
    Serang, 1 Agustus 2013.
    <br />
    Penguji Lisan
    <br />
    <br /><br /><br />
    <b>( ____________________________ )</b>
    </td>
</tr>
</table>    