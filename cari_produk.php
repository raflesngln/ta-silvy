<style>
.box-img IMG{
	height:200px;
	width:100%;
	transition: 1s ease-out;
	background-size: cover;

}
.box-img IMG:hover{
	height:200px;
	width:130%;
	margin-left:-22%;
	cursor:pointer;
}

.box-img p{
	text-align:justify;
}
.box-items{
	padding:3px 3px;
	height:400px;
	position:relative;
	text-align:center;
	box-shadow:5px 4px 5px #CCC;
	transition:ease-in 0.4s;
	overflow: hidden;
}
.box-items:hover{
	box-shadow:5px 4px 18px #999;
}
.box-items .btn{
	width:75%;
	height:35px;
	margin-left:13%;
	bottom:2px;
	top:90%;
	z-index:1005;
	position:absolute;
}
</style>
<div class="row">

<?php
$nm_produk=$_POST['txtcari'];
?>

<div class="col10 scrumb"><a href="index.php">Home</a> &raquo; Pencarian Produk</div>
<div class="batas"></div>
<h1 class="judul">Pencarian Produk </h1>

<div class="batas"></div>


<?php
include('config/koneksi.php');

$query="Select * from produk a
 INNER JOIN gambar_produk b on a.id_produk=b.id_produk
 where a.nm_produk like '%$nm_produk%' GROUP BY b.id_produk";
$get=mysql_query($query);
$jum=mysql_num_rows($get);

if($jum >= 1){
echo '<p style="margin-bottom:9px">Ditemukan <label class="label-green">'.$jum.' </label> Produk dengan Pencarian kata <label class="label-warning">'. $nm_produk.'</label> </p>';
} else {
	echo '<p style="margin-bottom:9px"><label class="label-red">Tidak Ditemukan Produk dengan</label> Pencarian kata <label class="label-warning">'. $nm_produk.'</label> </p>';
}

while($row=mysql_fetch_array($get)){
?>

<div class="col2">
<div class="row">
<div class="col9 box-items">
	<div class="box-img">
        <img src="asset/produk/<?php echo $row['gambar_produk'];?>" />
        <h2 class="text-center blue"><?php echo $row['nm_produk'];?></h2>
        <h3 class="red"><?php echo 'Rp. '.number_format($row['harga_produk'],0,'.','.');?></h3>
             <h3 class="green text-center"><?php echo 'stok : '.number_format($row['stok_produk'],0,'.','.');?></h3>
        <p><?php echo substr($row['ket_produk'],0,130);?></p>
        
        <p><a href="index.php?page=detail_produk&&idproduk=<?php echo $row['id_produk'] ;?>&&nm_produk=<?php echo $row['nm_produk'] ;?>"><button class="btn btn-ungu btn-block"><i class="fa fa-shopping-cart"></i> Beli produk ini</button></a></p>
	</div>
</div>
</div>
</div>
<?php } ?>






</div>