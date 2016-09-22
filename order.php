
<style>
.cart-box{
	margin-top:30px;
}
.img-cart{
	height:50px;
	width:50px;
}
.list-produk{
	background-color:#CCC;
}
#list_order{
    background-color: #0f7f80;
    border: 1px #FFF solid;
    color: #FFF;
    padding: 1px 7px;
}
#list_order:hover{
    background-color:#0DD;
}
#list_order div{
	color:#FFF;
	margin-top:10px;
}
</style>

<div class="col10 scrumb"><a href="index.php">Home</a> &raquo; Data Order</div>
<div class="batas"></div>

<div class="input-group">
<div class="col2">No Order</div>
<div class="col2">Pelanggan</div>
<div class="col2">Tgl Order</div>
<div class="col1">Total Order</div>
<div class="col1">Diskon</div>
<div class="col1">Total Bayar</div>
<div class="col1">Status</div>
</div>
<?php
error_reporting(0);
include('config/koneksi.php');
$em=$_SESSION['em'];

$query=mysql_query("select* from tr_order
		where id_user='$em' Group by id_order
		");
$jum=mysql_num_rows($query);
while($row=mysql_fetch_array($query)){
$status=$row['status_order'];
$total_order=$row['total_order'];
$ongkir=$row['harga_ongkir'];
$tobar=$total_order+$ongkir;

if($status=='0'){
	$status_order='<label class="label-red">Pending</label>';
} else if($status=='1'){
	$status_order='<label class="label-warning">Tunggu Prosess</label>';
} else if($status=='2'){
	$status_order='<label class="label-green">Order Selesai</label>';
}

	?>

<div class="batas"></div>
    
<a class="proses list-produk" href="index.php?page=detail_order&&id_order=<?php echo $row['id_order'] ;?>">
<div class="row" id="list_order"">

<div class="col2"><?php echo $row['id_order'];?></div>
<div class="col2"><?php echo $row['id_user'];?></div>
<div class="col2"><span class="col4"><?php echo $row['tgl_order'];?></span></div>
<div class="col1"><?php echo number_format($row['total_order'],0,'.','.');?></div>
<div class="col1"><?php echo number_format($ongkir,0,'.','.');?></div>
<div class="col1"><?php echo number_format($tobar,0,'.','.');?></div>
<div class="col1"><?php echo $status_order;?>
  
</div>


<div class="batas"></div>
</div>
</a>


<?php
}	
if($jum <=0){
	
echo '
     <h1>Tidak ada order</h1>
';

}
?>



