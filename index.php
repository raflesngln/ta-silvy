<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kerajinan tangan - Silvy</title>
<link href="asset/css/my_style.css" rel="stylesheet" />
<link href="asset/css/my_css.css" rel="stylesheet" />

<link href="asset/fontawesome/css/font-awesome.min.css" rel="stylesheet" />

<link rel="stylesheet" href="asset/css/flexslider.css" type="text/css" media="screen">
<script type="text/javascript" src="asset/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="asset/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="asset/js/my_javascript.js"></script>

<script>
$(window).load(function() {
    $('.flexslider').flexslider({
		animation:"slide"
	});
});

</script>
<style>
.topmenu li a,.topmenu h3,.topmenu i{
	color:#FFF;
}
.topmenu li{
	float:right;
	list-style:none;
	margin-left:20px;
	margin-bottom:4px;
	transition:all 0.5s;
}
.topmenu li a{
	text-decoration:none;
	transition:all 0.5s;
}
.topmenu li:hover,.topmenu li a:hover{
	background-color:transparent;
	color:#999;
}
.header sup{ color:#FFF;}
.col-search{
	top:25px;
}
#txt-cari{
	border:1px #1ed0d0 solid;
	width:30%;
	float:right;
	margin-right:-15px;
	transition:ease-in 0.2s;
}
#txt-cari:focus{
	width:100%;
}
#txt-cari:hover{
	width:100%;
}
</style>

</head>

<body>
<div class="page" id="home">
<?php
include('config/koneksi.php');
?>
<!-- header -->
<div class="header" id="header">
<div class="row">
<div class="col4" style="padding-top:10px">
<h2>Kerajinan Tangan Jaya</h2>
<p>High Quality Hand Made for your Collection</p>
</div>

<div class="col6 pull-right">
<div class="row">

<div class="col7 col-search">
<form method="post" action="index.php?page=cari_produk" id="form-search">
<div class="col8"><input required="required" name="txtcari" type="text" id="txt-cari" class="text" placeholder="Type your search"/></div>	
<div class="col2"><button class="btn btn-abu"><i class="fa fa-search"></i> Search</button></div>
</form>
</div>

<div class="col3">
<?php
$em=$_SESSION['em'];
if($em !=''){
	echo '<a class="menuuser" href="#">Hello ' . $em.'  <i class="fa fa-caret-down"></i>  </a>
	<div class="setting" style="display:none;position:relative;background-color:#09f">
	<ul style="position:absolute;background-color:#09f;padding:8px 50px 35px 40px;z-index:1002">
	
	<li class="text-left"><a href="index.php?page=order">Order</a></li>
	<li class="text-left"><a href="logout_user.php">Log Out</a></li>
	</ul>
	</div>
	
	';
} else 
{
?>
<ul class="topmenu">
    <li><a href="#" id="login"><i class="fa fa-location-arrow"></i>  Login</a></li>
    <li><a href="index.php?page=daftar" id=""><i class="fa fa-user-plus"></i> Daftar</a></li>
</ul>
<?php } ;?>

<div class="batas"></div>



<?php
$jum_item = 0;
$jum_item=count($_SESSION['produk'])-1;
$realitems=$jum_item <=0?'0':$jum_item;

?>
<a href="index.php?page=cart_prosess">
<h3 class="text-right" style="color:#FFF"><i class="fa fa-cart-plus"></i><small> My Cart</small> <sup style="color:#FFF">(<?php echo $realitems ;?>)</sup></h3>
</a>
</div>
</div>
</div>

</div>
</div>
<!-- end of header -->


<!-- are afor menu -->

<div class="col10" id="menu">
<nav>
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="#">Produk  &nbsp;&nbsp; <i class="fa fa-sort-down"></i></a>
			<ul>
            <?php
			$query="select *from kategori_produk order by nm_kategori";
			$get=mysql_query($query);
			while($row=mysql_fetch_array($get))
			{
			?>
	<li><a href="index.php?page=kategori_produk&&idkategori=<?php echo $row['id_kategori'];?>&&nm_kategori=<?php echo $row['nm_kategori'];?>"><?php echo $row['nm_kategori'];?></a></li>
             <?php } ?>
			</ul>
		</li>
		<li><a href="index.php?page=profil">Tentang kami</a></li>
		<li><a href="index.php?page=cara_belanja">Cara Belanja</a></li>
	</ul>
</nav>
</div>


<!-- end of for area menu -->

<div class="batas"></div>
<!-- slide animation -->
<div class="slider">
<?php
$page=isset($_GET['page'])?$_GET['page']:include ('slider.php');;
 
 ?>
</div>
<!--end of slide ani,mation -->

<!-- konten -->
<div class="content" id="content">
<?php
$page=isset($_GET['page'])?$_GET['page']:'';

if($page=="profil")
{
	include ('profil.php');
}
else if($page=="cara_belanja")
{
	include ('cara_belanja.php');	
} 
else if($page=="kategori_produk")
{
	include ('kategori_produk.php');
} 
else if($page=="cari_produk")
{
	include ('cari_produk.php');
} 
else if($page=="detail_produk")
{
	include ('detail_produk.php');
}
else if($page=="cart_prosess")
{
	include ('cart_process.php');
}
else if($page=="hapus_cart")
{
	include ('hapus_cart.php');
} 
else if($page=="checkout")
{
	include ('checkout.php');
} 
else if($page=="login")
{
	include ('login.php');
} 
else if($page=="cek_login")
{
	include ('cek_login.php');
}

else if($page=="daftar")
{
	include ('daftar.php');
} 
else if($page=="cek_daftar")
{
	include ('cek_daftar.php');
} 
else if($page=="finis_checkout")
{
	include ('finis_checkout.php');
} 
else if($page=="order")
{
	include ('order.php');
} 
else if($page=="detail_order")
{
	include ('detail_order.php');
}
else if($page=="konfirmasi_order")
{
	include ('konfirmasi_order.php');
}
else if($page=="konfirmasi_bayar")
{
	include ('konfirmasi_bayar.php');
} 

else{
	include ('produk.php');
}
?>
</div>
<!-- akhir konten -->

<br style="clear:both" />
<div class="row kontak" >
<h1 align="center">Kontak Kami</h1>
<?php
include 'koneksi.php';
$query=mysql_query("select*from kontak order by nm_kontak");
while($row=mysql_fetch_array($query)){
?>
<div class="col2" id="box-contact" style="text-align:center; margin-bottom:25px;padding-top:20px; padding-left:1px; border-radius:6px; padding-bottom:20px; margin-left:3%; border:1px #CCC solid">
<img src="asset/images/<?php echo $row['gambar_kontak'];?>" height="40" width="40" />
<p><?php echo $row['nm_kontak'];?></p>
<p><?php echo $row['ket_kontak'];?></p>
</div>
<?php } ?>
</div>

<br style="clear:both" />
<div class="row bank" >
<h1 align="center">Akun Bank Kami</h1>
<?php

$query=mysql_query("select*from bank order by nm_bank");
while($data=mysql_fetch_array($query)){
?>
<div class="col2" id="box-contact" style=" text-align:center; margin-bottom:25px;padding-top:20px; padding-left:1px; border-radius:6px; padding-bottom:20px; margin-left:3%; border:1px #CCC solid">
<img src="asset/images/<?php echo $data['gambar_bank'];?>" height="40" width="40" />
<p><?php echo $data['nm_bank'];?></p>
<p><?php echo $data['no_rekening'];?></p>
<p><?php echo 'A/n '.$data['nm_rekening'];?></p>
</div>
<?php } ?>
</div>

<br style="clear:both" />

<div class="footer" >
<p class="copy"><sup>&reg;</sup> Develope and Designed by Silvy. Juny  2016 <sup>th</sup></p>
</div>


</div>

<!-- FOR SHOW MODAL LOGIN AND REGISTER--->
<!-- for login -->
<div class="bg" id="bg-login"></div>
<div id="modal-login" class="modal-kotak">
    <div class="col10 text-right xclose">X</div>
		<div class="modal-header">
			<h3><i class="fa fa-key"></i> Login User</h3>
		</div>
        <div class="batas"></div>
        <form method="post" action="index.php?page=cek_login">
        <div class="modal-content">
        
            <div class="input-group">
                <div class="col10 label" >Email</div>
                <div class="col10">
                <input type="text" class="text" name="em" />
                </div>
            </div>
            <div class="input-group">
                <div class="col10 label">Password</div>
                <div class="col10">
                <input type="password" class="text"  name="pas" style=" margin-left:10px; width:95%"/>
                </div>
            </div>
        
        </div>
        <div class="batas"></div>
		<div class="modal-footer">
        <button class="btn-block" type="submit">Login</button>
		
		</div>
        </form>
	</div>
    
<!-- for register -->
<div class="bg" id="bg-daftar"></div>
<div id="modal-daftar" class="modal-kotak">
    <div class="col10 text-right xclose">X</div>
		<div class="modal-header">
			<h3>Daftar User</h3>
            
		</div>
        <form method="post" action="ashdashd.php">
        <div class="modal-content">
            <div class="input-group">
                <div class="col10 label" >Username</div>
                <div class="col10">
                <input type="text" class="text" />
                </div>
            </div>
            <div class="input-group">
                <div class="col10 label">Username</div>
                <div class="col10">
                <input type="text" class="text" />
                </div>
            </div>
        </div>
        <div class="batas"></div>
		<div class="modal-footer">
        <button class="btn-block" type="submit">Daftar</button>
            
		</div>
        </form>
	</div>
<!-- END OF MODAL -->

	<script type="text/javascript">
$(document).ready(function(){
	
//modal login
$('#login').click(function(){
	$('#modal-login , #bg-login').fadeIn("slow");
});
	
//register modal
$('#register').click(function(){
	$('#modal-daftar , #bg-daftar').fadeIn("slow");
});

//for close modal		
$('.btn-close,.xclose').click(function(){
				$('.modal-kotak , .bg').fadeOut("slow");
			});


//adding  cart
$(".formcarttt").submit(function(e){
		
			var formcart = $(this).serialize();
alert('adding');
			$.ajax({ //request ajax ke cart_process.php
				url: "cart_process.php",
				type: "POST",
				dataType:"json", 
				data: formcart
			}).done(function(data){ //Jika Ajax berhasil
			$("#cart-info").html(data.items); //total items di cart-info element
				button_content.html('BELI'); //
				alert("Item telah dimasukan ke keranjang belanja anda"); 
				if($(".shopping-cart-box").css("display") == "block"){
					$(".cart-box").trigger( "click" ); 
				}
			})
			e.preventDefault();
});

	//menampilkan item ke keranjang belanja
	$( ".cart-box").click(function(e) { 
		e.preventDefault(); 
		$(".shopping-cart-box").fadeIn(); 
		$("#shopping-cart-results").html('<img src="images/ajax-loader.gif">'); //menampilkan loading gambar
		$("#shopping-cart-results" ).load( "cart_process.php", {"load_cart":"1"}); //membuat permintaan ajax menggunakan dengan jQuery Load() & update
	});
	
	//keluar keranjang belanja
	$( ".close-shopping-cart-box").click(function(e){ //fungsi klik pengguna pada keranjang belanja
		e.preventDefault(); 
		$(".shopping-cart-box").fadeOut(); //keluar keranjang belanka
	});
	
	//Menghapus item dari keranjang
	$("#shopping-cart-results").on('click', 'a.remove-item', function(e) {
		e.preventDefault(); 
		var pcode = $(this).attr("data-code"); //mendapatkan get produk
		$(this).parent().fadeOut(); //menghapus elemen item dari kotak
		$.getJSON( "cart_process.php", {"remove_code":pcode} , function(data){ //mendapatkan Harga Barang dari Server
			$("#cart-info").html(data.items); //update Menjullahkan item pada cart-info
			$(".cart-box").trigger( "click" ); //trigger click on cart-box to untuk memperbarui daftar item
		});
	});

$(".menuuser").click(function() {
    $(".setting").toggle();
});

});
		
	</script>
</body>
</html>