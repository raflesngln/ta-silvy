<script src="../asset/js/jquery-1.8.2.min.js"></script>
<script src="../asset/jquery_ui/jquery-ui.js"></script>

<link rel="stylesheet" href="../asset/jquery_ui/jquery-ui.css"> 

  <script type="text/javascript">
  $(function() {
	$("#tgl1").datepicker({
		dateFormat:'yy-mm-dd',
		});
	$("#tgl2").datepicker({
		dateFormat:'yy-mm-dd',
		});
	
  });
  </script>
<style>
.my-table{
	width:98%;
}
.my-table thead{
	background-color:#f7f7f7;
}
.my-table td{
	padding:4px 4px;
	border-bottom:1px #CCC solid;
}

.container-wrapper {
	margin:7% auto;
	position: relative;
	overflow: hidden;
}

/* CSS Tab styling is start here */

	/* Tab menu styling*/
	input.tab-menu-radio {
		display: none;
	}
	label.tab-menu {
		display: inline-block;
		float: left;
		padding:10px 30px;
		cursor: pointer;
		z-index: 99;
	}
	/* End Tab menu styling*/

	/* Tab content styling*/
	.tab-content {
		top:-3px;
		clear: both;
		width: 100%;
		position: relative;
		padding:20px;
		background-color: #f7f7f7;
		border-top:1px solid #999;
	}	
	/* End Tab content styling*/

	/* CSS tab core */
		.tab-menu-radio:checked + label {
			-webkit-transition:all 1s; /* Optional */
			-moz-transition:all 1s; /* Optional */
			transition:all 1s; /* Optional */
			background-color:#00006f;
			color: #fff;
			border-radius:4px 4px 0px 0px;
		}
		.tab-content .tab {
			height: 0;
			opacity: 0;
		}
		#tab-menu1:checked ~ .tab-content .tab-1,
		#tab-menu2:checked ~ .tab-content .tab-2,
		#tab-menu3:checked ~ .tab-content .tab-3 {
			-webkit-transition:opacity 1s; /* Optional */
			-moz-transition:opacity 1s; /* Optional */
			transition:opacity 1s; /* Optional */
			height: auto;
			opacity: 1;
		}
	/* End CSS tab core */

/* CSS Tab Styling is end here */
.box-action a{
	float:left;
	font-size:19px;
	margin-left:15px;
}
.box-action a .red{
	color:red;
}
.box-action a .blue{
	color:#00C;
}
.box-action a .green{
	color:#0F0;
}
</style>


<div class="col10 scrumb"><a href="home.php">Home</a> &raquo; order </div>
<div class="batas"></div>

	<div class="tab-container">

<div class="tab tab-1">
				<h1>List order</h1>
				<p>
                

<div class="row">
<form method="post" action="order/laporan_order.php" target="new">
<div class="col4 pull-right">
<div class="input-group">
<?php
$kurangtanggal = date("Y-m-d", mktime(0,0,0,date("m"),date("d")-7,date("Y")));
?>
<div class="col3"><input name="tgl1" type="text" id="tgl1" class="text" value="<?php echo $kurangtanggal ;?>" onchange="return sorting_order()" readonly="readonly"/></div>
<div class="col1"><p style="margin-left:16px; margin-top:15px;"> s/d </p> </div>
<div class="col3"><input name="tgl2" type="text" id="tgl2" class="text" value="<?php echo date('Y-m-d');?>" readonly="readonly" onchange="return sorting_order()" /></div>
<div class="col3"><button type="button" onclick="return sorting_order()" id="btn-sort" class="bt btn-small btn-blue" style="margin-left:15px; margin-top:4px; cursor:pointer"><i class="fa fa-search"></i> Sort</button></div>

<div class="col2">
<p style="margin-top:8px">Status order</p>
</div>

<div class="col5">
<select name="status" id="status" class="text" style="height:33px" onchange="sorting_order()">
<option value="all">Semua</option>
<option value="0">Pending</option>
<option value="1">Proses</option>
<option value="2">Selesai</option>
</select>
</div>

<div class="col3 pull-right"><button type="submit"  id="btn-sort" class="bt btn-small btn-lime" style="margin-right:1px; margin-top:4px; cursor:pointer"><i class="fa fa-print"></i>  Print</button></div>
</div>


</div>
</form>
</div>

<div id="table-box">
<table class="my-table">
  <thead>
  <tr>
    <td width="26">No</td>
    <td width="57" height="58"><div align="center">id order</div></td>
    <td width="47">Tgl</td>
    <td width="105"><div align="left">Nama</div></td>
    <td width="50"><div align="left">telpon</div></td>
    <td width="78"><div align="left">Total_order</div></td>
    <td width="46">Resi</td>
    <td width="64"><div align="left">Status</div></td>
    <td><div align="center">Aksi</div></td>
    </tr>
    </thead>
<?php
include"../config/koneksi.php";

$no=1;
$batas=15;
$halaman=isset($_GET['halaman'])?$_GET['halaman']:'';
if(empty($halaman))
{
$posisi=0;
$halaman=1;
}
else
{
$posisi=($halaman-1)*$batas;
}
$tampil="select*from tr_order a inner join detail_order b on a.id_order=b.id_order 
INNER JOIN pelanggan c on a.id_user=c.email_pelanggan
group by b.id_order LIMIT $posisi,$batas";
$hasil=mysql_query($tampil);
$jum=0;
$jum=mysql_num_rows($hasil);
while($row=mysql_fetch_array($hasil))
{
$status=$row['status_order'];
if($status=='0'){
	$status_order='<label class="label-red"><i class="fa fa-info"></i> Pending</label>';
} else if($status=='1'){
	$status_order='<label class="label-warning"><i class="fa fa-refresh"></i> Menuggu</label>';
} else if($status=='2'){
	$status_order='<label class="label-green"><i class="fa fa-check"></i> Order Selesai</label>';
}

$jum++;

 ?>
 <tr>
   <td><?php echo $no; ?></td>
      <td height="32"><div align="left"> <?php echo $row['id_order']; ?></div><div align="center"></div></td>
      <td><?php echo date('d-m-Y',strtotime($row['tgl_order'])); ?></td>
    <td><div align="left"><?php echo $row['nm_pelanggan']; ?></div></td>
    <td><?php echo $row['telpon_pelanggan']; ?></td>
    <td><div align="right"><?php echo number_format($row['total_order'],0,'.','.'); ?></div></td>
    <td><?php echo $row['no_resi']; ?></td>
    <td><?php echo $status_order; ?></td>
    <td width="34"><div class="box-action">
    <a href="home.php?page=detail_order&&id_order=<?php echo $row['id_order']; ?>"><i class="fa fa-edit blue"></i> </a> 
     
      <a style="display:none" onclick="return confirm('Yakin Hapus data ?')" href="order/hapus_order.php?id=<?php echo $row[''];?>"><i class="fa fa-times red"></i></a> 
    </div></td>
    </tr>
   <?php $no++; } ?>
</table>

  <p>
  <?php
	echo"<br>Halaman:";
	$tampil2="select*from tr_order a inner join detail_order b on a.id_order=b.id_order 
INNER JOIN pelanggan c on a.id_user=c.email_pelanggan
group by b.id_order";
	$hasil2=mysql_query($tampil2);
	$jmldata=mysql_num_rows($hasil2);
	$jmlhalaman=ceil($jmldata/$batas);
	for($i=1;$i<=$jmlhalaman;$i++)
	if($i!=$halaman)
	{
	echo"<a href=home.php?page=order&halaman=$i>$i</a>|";
	}
	else
	{
	echo"<b>$i</b>|";
	}
	?>  
</p> <center> Jumlah  order	:<?php echo $jmldata;?></center></p>

</div>
			</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $("#btn-sort").click(function(e) {
       $("#table-box").html();
    });
	
});

function sorting_order(){
//Mengambil value tgl 1 dan 2
	var tgl1 = $('#tgl1').val();
	var tgl2 = $('#tgl2').val();
	var status = $('#status').val();
	
	//Gunakan jquery AJAX
		$.ajax({
                type: "POST",
                url :'order/ajax_table.php',
                data: "tgl1="+tgl1+"&tgl2="+tgl2+"&status="+status,
                success: function(data){
					 $("#table-box").html(data);
                }
            });
}
</script>
