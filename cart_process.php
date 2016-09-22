
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

<div class="col10 scrumb"><a href="index.php">Home</a> &raquo; Detail Cart</div>
<div class="batas"></div>

<?php
error_reporting(0);
include('config/koneksi.php');




//unset($_SESSION["produk"][$kode_session]);

echo '<div class="col10 cart-box"><h1>My Cart</h1></div>';

$num_rows = 0;
$num_rows=count($_SESSION['produk']);	
foreach ($_SESSION['produk'] as $val) {
    $prod=$val;
	$pot=explode("/",$prod);
	$kdbeli=$pot[0];
	$qtybeli=$pot[1]; 
	
$query="select* from produk a
        INNER JOIN gambar_produk b on a.id_produk=b.id_produk 
		where a.id_produk='$kdbeli' Group by b.id_produk
		";
$get=mysql_query($query);

while($row=mysql_fetch_array($get)){
$sub=$row['harga_produk']*$qtybeli;	
$total+=$sub;
$grandtotal+=$sub;
	?>	
    
<a class="list-produk" href="index.php?page=detail_produk&&idproduk=<?php echo $row['id_produk'] ;?>&&nm_produk=<?php echo $row['nm_produk'] ;?>">
<div class="row">
<div class="col1"><img class="img-cart" src="asset/produk/<?php echo $row['gambar_produk'];?>" /></div>
<div class="col1"><?php echo $kdbeli;?></div>
<div class="col4"><?php echo $row['nm_produk'];?></div>
<div class="col1"><?php echo $qtybeli;?></div>
<div class="col1"><?php echo number_format($row['harga_produk'],0,'.','.');?></div>
<div class="col1"><?php echo number_format($sub,0,'.','.');?></div>
<div class="col1"><a href="index.php?page=hapus_cart&&id=<?php echo $kdbeli.'/'.$qtybeli;?>"><i class="fa fa-times red" id="hapus"></i></a></div>

<div class="batas"></div>
</div>
</a>

<?php
}	

}?>
<div class="col5" style="padding-left:25%; margin-top:30px">
<div class="col10"><h3 class="text-right">Total Belanja  :<?php echo 'Rp   '.number_format($grandtotal,0,'.','.');?>
  <input type="hidden" name="jumlah_belanja" id="jumlah_belanja" value="<?php echo $grandtotal;?>" />
</h3>
</div>

<div class="col4">
<a href="index.php"><button class="btn-blue btn-block">&laquo; Belanja lagi</button></a>
</div>
<div class="col4">
<a href="index.php?page=checkout" id="cek"><button class="btn-lime btn-block"> Check Out  &raquo;</button></a>
</div>
</div>

<script>
$(document).ready(function() {
    $("#cek").click(function(){
		var jumlah_belanja=$("#jumlah_belanja").val();
		
		if(jumlah_belanja <=0){
		alert('Cart masih Kosong,Silahkan Belanja dulu!');	
		return false;
		}
		
	});
});
</script>
