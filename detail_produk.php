
<style>
.box-img IMG{
	height:250px;
	width:100%;
}
.box-img p{
	text-align:justify;
}
.judul{ font-size:x-large;
color:#03F;
}
.harga{ 
font-size:x-large;
color:#F00;
}
</style>

<div class="row">
<form class="formcart" id="formcart" action="simpan_cart.php" method="post">
<?php

$nm_produk=$_GET['nm_produk'];
?>

<div class="col10 scrumb"><a href="index.php">Home</a> &raquo; Detail Produk &raquo; <?php echo $nm_produk;?></div>
<div class="batas"></div>

<div class="batas"></div>


<?php
include('config/koneksi.php');

$idproduk=$_GET['idproduk'];
$query="Select * from produk a
 INNER JOIN gambar_produk b on a.id_produk=b.id_produk
 INNER JOIN kategori_produk c on a.id_kategori=c.id_kategori
 where a.id_produk='$idproduk' GROUP BY a.id_produk";
$get=mysql_query($query);
while($row=mysql_fetch_array($get)){
	
	$stok=$row['stok_produk'];
	if($stok <=0){
		$tombol='<disabled="disabled"';
	} else {
		$tombol='';
	}
?>

<div class="col2">
<div class="row">
<div class="col9">
	<div class="box-img">
        <img src="asset/produk/<?php echo $row['gambar_produk'];?>" />
        <h1>&nbsp;</h1>
        <h1>&nbsp;</h1>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        
	</div>
</div>
</div>
</div>


<div class="col7">
<div class="row">
<div class="col9">

<h1 class="judul"> <?php echo $nm_produk;?> </h1>
   
        <h1 class="harga"><?php echo 'Rp. '.number_format($row['harga_produk'],0,'.','.');?></h1>
        <div class="input-group">
        <div class="col2">Kategori</div>
        <div class="col8"><p>: <?php echo $row['nm_kategori'];?></p></div>
        </div>
        
         <div class="input-group">
        <div class="col2">Stok</div>
        <div class="col8"> <p>: <?php echo $row['stok_produk'];?></p></div>
        </div>
               
        <div class="input-group">
        <div class="col2">Deskripsi</div>
        <div class="col8"> <p>: <?php echo $row['ket_produk'];?></p></div>
        </div>
       
      
        
	<p class="text-left">
	  <input type="hidden" name="idproduk" id="idproduk" value="<?php echo $row['id_produk'];?>" />
      <input type="hidden" name="nama" id="nama" value="<?php echo $row['nm_produk'];?>" />
      <input type="hidden" name="harga" id="harga" value="<?php echo $row['harga_produk'];?>" />
	  <input type="hidden" name="stokproduk" id="stokproduk" value="<?php echo $row['stok_produk'];?>" />
	<div class="col10"><h3>Jumlah items beli</h3></div>
    <input name="qty" type="number" class="text" id="qty" style="width:22%; margin-right:2px" min="1" value="1" max="<?php echo $stok ;?>" /><button type="submit" class="tombol btn btn-ungu addcart" <?php echo $tombol ;?>><i class="fa fa-shopping-cart "></i> Beli</button>
    </p>
</div>
</div>
</div>
<?php } ?>


</form>

</div>


<script>
$(document).ready(function() {
	$(".addcarttttttt").click(function(e) {
        alert('hai');
    });
});
$(".tombol").click(function(e) {
    var stok=parseFloat($("#stokproduk").val());
	var qty=parseFloat($("#qty").val());
	
	if(stok <=0){
	alert('Mohon maaf stok lagi kosong !');	
	return false;
	} 
	else if(qty > stok)
	{
		alert('Pesanan anda melebihi stok produk');
		return false;
	} else {
	 alert('ditambahkan ke keranjang');	
	}
});
</script>