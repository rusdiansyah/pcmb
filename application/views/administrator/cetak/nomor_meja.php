<style type="text/css">
*{
font-family:Verdana, Geneva, sans-serif;
margin:0px;
padding:0px;
}
@page {
 margin-left:3cm 2cm 2cm 2cm;
}
.atas{
width:20.99cm ; 
margin:0px;
padding:0px;
}
.table.kotak{
width:20.99cm ; 
margin:0px;
padding:0px;
}
table.grid{
width:10cm ; 
font-size: 14px;
border-collapse:collapse;
padding:5px;
margin:5px;
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
font-size: 36px;
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
</style>
<div class="atas">
<table class="table kotak" width="100%">
<tr>  
<?php
	$col = 2;
	$cnt = 0;
	foreach($data->result() as $r){
	if ($cnt >= $col) {
	echo "</tr><tr>";
	$cnt = 0;
	}
	$cnt++;
?>
	<td align="center" width="50%">
    <table class="grid">
    <tr>
    	<td align="center"><h1><?php echo $r->NoUjian;?></h1></td>
    </tr>
    <tr>    
        <td align="center" style="background-color:#F0F0F0;">
		<strong>
		<?php echo str_replace(";","",strtoupper($r->Nama));?>
        </strong>
        </td>
    </tr>
    </table>
    </td>
    <?php
	}
?>
</tr></table>    
</div>