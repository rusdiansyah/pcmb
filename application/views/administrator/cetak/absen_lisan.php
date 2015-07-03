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
	padding:10px;
}
table.grid th{
background: #F0F0F0;
border:1px solid #000;
border-top: 1px solid #000;
border-bottom: 2px groove #000;
text-align:center;
}
table.grid tr td{
	padding:8px;
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
	padding-top:5px;
	padding-bottom:5px;
}
</style>
<?php
$th = $this->config->item('thak');
?>
<div class="atas">
<img src="<?php echo base_url();?>asset/images/kop.JPG" width="800" />
<center><h1>DAFTAR HADIR UJIAN <br />LISAN PCMB <br />TAHUN AKADEMIK <?php echo $th;?></h1></center>
<div style="float:left">Jenjang : S1</div>
<div style="float:right">Ruang : <?php echo $ruang;?></div>
</div>
<table class="grid" width="100%">
	<tr>
    	<th width="20">No</th>
        <th width="100">No Ujian</th>
        <th width="300">Nama </th>
        <th width="50">L/P</th>
        <th width="300">Tanda Tangan</th>
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
        <?php
		if($no % 2 == 0 ){
		?>
        	<td style="padding-left:150px;"><?php echo $no;?></td>
        <?php }else{ ?>
        	<td><?php echo $no;?></td>
       	<?php } ?>
    </tr>
    <?php
	$no++;
	}
?>
</table>
<div style="padding:10px"></div>
<strong>Serang, 1 Agustus 2013 </strong><br /><br />
<strong><u>Diisi oleh Pewawancara :</u></strong>
<table width="100%" class="footer">
<tr>
	<td width="50%" valign="top">Nama Pewawancara</td>
    <td valign="top">:</td>
    <td>______________________________ </td>
</tr>
<tr>
	<td valign="top">Tanda Tangan Pewawancara</td>
    <td valign="top">:</td>
    <td><br /><br />______________________________ </td>
</tr>
<tr>
	<td width="50%" valign="top">Jumlah Calan Mahasiswa yang Hadir</td>
    <td valign="top">:</td>
    <td>_____________ </td>
</tr>
<tr>
	<td width="50%" valign="top">Jumlah Calan Mahasiswa yang tidak Hadir</td>
    <td valign="top">:</td>
    <td>_____________ </td>
</tr>
</table>    