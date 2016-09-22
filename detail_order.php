
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
</style>

<div class="col10 scrumb"><a href="index.php">Home</a> &raquo; Detail Order</div>
<div class="batas"></div>

<?php
error_reporting(0);
include('config/koneksi.php');
$id_order=isset($_GET['id_order'])?$_GET['id_order']:'';

if(isset($id_order)){
	?>

<div class="col10">
<?php
$query=mysql_query("select * from detail_order a
		LEFT JOIN pelanggan b on a.id_user=b.email_pelanggan 
		where a.id_order='$id_order' LIMIT 1
		"); 

while($data=mysql_fetch_array($query)){

?>
<div class="input-group">
<div class="col2"><h1>Nomor Invoice</h1></div>
<div class="col8"><h1><?php echo $id_order;?></h1></div>
</div>



<?php } ?>
</div>

 <?php
$query="select* from detail_order a
        INNER JOIN tr_order b on a.id_order=b.id_order 
		LEFT JOIN produk c on a.id_produk=c.id_produk
		LEFT JOIN gambar_produk d on c.id_produk=d.id_produk 
		where a.id_order='$id_order' Group by d.id_produk
		";
$get=mysql_query($query);

while($row=mysql_fetch_array($get)){
$qty=$row['qty'];	
$sub=$row['sub'];
$harga=$row['harga_item'];
$status_order=$row['status_order'];

$total+=$sub;
$grandtotal+=$sub;
$ongkir=$row['id_ongkir'];
$pay=$grandtotal+$ongkir;
	?>	
    
<a class="list-produk" href="index.php?page=detail_produk&&idproduk=<?php echo $row['id_produk'] ;?>&&nm_produk=<?php echo $row['nm_produk'] ;?>">
<div class="row">
<div class="col1"><img class="img-cart" src="asset/produk/<?php echo $row['gambar_produk'];?>" /></div>
<div class="col1"><?php echo $row['id_produk'] ;?></div>
<div class="col4"><?php echo $row['nm_produk'];?><?php echo $row['id_ongkir'];?></div>
<div class="col1"><?php echo $qty;?></div>
<div class="col1"><?php echo number_format($harga,0,'.','.');?></div>
<div class="col1"><?php echo number_format($sub,0,'.','.');?></div>
<div class="col1"></div>

<div class="batas"></div>
</div>
</a>

<?php
}	

}?>
<div class="col5" style="padding-left:25%; margin-top:30px">
<div class="col10"><h4 class="text-right">Total Belanja  :<?php echo 'Rp   '.number_format($grandtotal,0,'.','.');?></h4></div>
<div class="col10"><h4 class="text-right">Ongkir  :<?php echo 'Rp   '.number_format($ongkir,0,'.','.');?></h4></div>
<div class="col10"><h4 class="text-right"><hr /></h4></div>


<div class="col10"><h3 class="text-right">Total Bayar   :<?php echo 'Rp   '.number_format($pay,0,'.','.');?></h3></div>


<div class="col4">
<?php
if($status_order <=0){
?>
<a href="index.php?page=konfirmasi_order&&id_order=<?php echo $id_order ;?>"><button class="btn-lime btn-block"> <i class="fa fa-check"></i> Konfirmasi Order &raquo;</button></a>
<?php } ?>
</div>
</div>
