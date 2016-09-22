<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator page</title>
<link href="../asset/css/my_style.css" rel="stylesheet" />
<link href="../asset/css/my_css.css" rel="stylesheet" />

<link href="../asset/fontawesome/css/font-awesome.min.css" rel="stylesheet" />

<link rel="stylesheet" href="../asset/css/flexslider.css" type="text/css" media="screen">
<script type="text/javascript" src="../asset/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="../asset/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="../asset/js/my_javascript.js"></script>

 <!-- SWEET ALERT-->
  <link rel="stylesheet" href="sweetalert/example/example.css">
  <script src="../asset/sweetalert/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../asset/sweetalert/dist/sweetalert.css">
 
<script src="../asset/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
    tinymce.init({
        selector: "textarea",
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
    </script>
    
    
<script>
$(window).load(function() {
    $('.flexslider').flexslider({
		animation:"slide"
	});
});

</script>
<style>
*{
	padding:0px;
	margin:0px;
}
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
#admin-home h1{
	font-size:x-large;
	margin-bottom:20px;
}
#admin-home{
	margin: 0px auto;
	height:100%;
}
.menu-side{
	background-color:#F7F7F7;
	padding-bottom:400px;
	margin-left:-8px;
}
.menu-side li{
	padding:5px 10px;
	margin-left:9px;
	border-bottom:1px #999 solid;
	list-style:none;
}
.menu-side li a{
	font-size:large;
	text-decoration:none;
}
.menu-side .header-side{
	background-color:#2c3e50;
	list-style:none;
	color:#FFF;
	margin:6px 6px;
}
#header-admin{
	background-color:#2c3e50;
	color:#FFF;
	padding:20px 5px;
}
#conten-admin{
	padding-left:10px;
	box-sizing:border-box;
}
#foot-admin{
	background-color:#2c3e50;
	color:#FFF;
	padding:20px 5px;
	text-align:center;
	margin-bottom:-19px;
}
.setting_user{
	color:#FFF;
	font-size:large;
	position:relative;
}
.setting{
position:absolute;
background-color:#000;
padding-right:40px;
padding-left:10px;
padding-top:5px;
padding-bottom:10px;
box-sizing:border-box;
top:20px;
z-index:1004;
}

.setting ul li{
	list-style:none;
	margin-top:4px;
	margin-top:5px;
}
.setting ul li a{
	text-decoration:none;
	color:#FFF;
}
.setting ul li a:hover{
	text-decoration:underline;
	color:#00F;
}
</style>

</head>

<body>
<?php
$usr=$_SESSION['usr_admin'];
if($usr==''){
 echo '
 <script>
 window.location.href = "index.php";
 </script>
 ';	
} else {
?>
<div class="page" id="home">
<div class="row">

<div class="col10" id="header-admin">
<div class="input-group">
<div class="col3"><h1><i class="fa fa-users"></i> Menu Administrator</h1></div>

<div class="col7 pull-right">
<?php

if($usr !=''){
	echo '<div class="pull-right"><a class="setting_user text-right" href="#">Hello ' . $usr.'  <i class="fa fa-caret-down"></i>  </a>
	<div class="setting" style="display:none">
	<ul>
	<li class="text-left"><a href="logout.php">Log Out</a></li>
	<li class="text-left"><a href="home.php?page=profil_admin">Profil</a></li>
	</ul>
	</div>
	</div>
	
	';
} 
?>


</div>


</div>
</div>

<div class="col10" id="admin-home">

<div class="col2">
<ul class="menu-side">
<h3 style="margin-left:20px;"><a href="home.php">Dashboard</a></h3>

<li class="header-side">Master data</li>
<li><a href="home.php?page=produk">Produk</a>
<li><a href="home.php?page=kategori">Kategori Produk</a>
<li><a href="home.php?page=pelanggan">Pelanggan</a>
<li><a href="home.php?page=ongkir">Ongkir</a>
<li><a href="home.php?page=kota">Kota</a>
<li><a href="home.php?page=kurir">Kurir</a>
<li><a href="home.php?page=bank">Akun Bank</a>

<li class="header-side">Transaksi</li>
<li><a href="home.php?page=order">Orders / Pesanan</a>

<li class="header-side">Setting Web</li>
<li><a href="home.php?page=profil">Profil / tentang Kami</a>
<li><a href="home.php?page=cara_belanja">Cara Belanja</a>
<li><a href="home.php?page=banner">Banner</a>
<li><a href="home.php?page=kontak">Kontak </a>
</ul>
</div>



<div class="col8" id="conten-admin">
<?php
$page=isset($_GET['page'])?$_GET['page']:'';

if($page=="produk")
{
	include ('produk/produk.php');
} 
else if($page=="tambah_produk")
{
	include ('produk/tambah_produk.php');
} 
else if($page=="edit_produk")
{
	include ('produk/edit_produk.php');
}
else if($page=="kategori")
{
	include ('kategori/kategori.php');
}
else if($page=="tambah_kategori")
{
	include ('kategori/tambah_kategori.php');
} 
else if($page=="edit_kategori")
{
	include ('kategori/edit_kategori.php');
}
else if($page=="pelanggan")
{
	include ('pelanggan/pelanggan.php');
}
else if($page=="tambah_pelanggan")
{
	include ('admin/tambah_pelanggan.php');
} 
else if($page=="edit_pelanggan")
{
	include ('pelanggan/edit_pelanggan.php');
}
else if($page=="kontak")
{
	include ('kontak/kontak.php');
}
else if($page=="tambah_kontak")
{
	include ('kontak/tambah_kontak.php');
} 
else if($page=="edit_kontak")
{
	include ('kontak/edit_kontak.php');
}
else if($page=="bank")
{
	include ('bank/bank.php');
}
else if($page=="tambah_bank")
{
	include ('bank/tambah_bank.php');
} 
else if($page=="edit_bank")
{
	include ('bank/edit_bank.php');
}
else if($page=="profil")
{
	include ('profil/profil.php');
}
else if($page=="tambah_profil")
{
	include ('profil/tambah_profil.php');
} 
else if($page=="edit_profil")
{
	include ('profil/edit_profil.php');
}
else if($page=="banner")
{
	include ('banner/banner.php');
}
else if($page=="tambah_banner")
{
	include ('banner/tambah_banner.php');
} 
else if($page=="edit_banner")
{
	include ('banner/edit_banner.php');
}
else if($page=="cara_belanja")
{
	include ('cara_belanja/cara_belanja.php');
}
else if($page=="tambah_cara_belanja")
{
	include ('cara_belanja/tambah_cara_belanja.php');
} 
else if($page=="edit_cara_belanja")
{
	include ('cara_belanja/edit_cara_belanja.php');
}
else if($page=="kota")
{
	include ('kota/kota.php');
}
else if($page=="tambah_kota")
{
	include ('kota/tambah_kota.php');
} 
else if($page=="edit_kota")
{
	include ('kota/edit_kota.php');
}

else if($page=="order")
{
	include ('order/order.php');
}
else if($page=="detail_order")
{
	include ('order/detail_order.php');
} 
else if($page=="konfirmasi_order")
{
	include ('order/konfirmasi_order.php');
}
else if($page=="konfirmasi_bayar")
{
	include ('order/konfirmasi_bayar.php');
}
else if($page=="kurir")
{
	include ('kurir/kurir.php');
}
else if($page=="tambah_kurir")
{
	include ('kurir/tambah_kurir.php');
} 
else if($page=="edit_kurir")
{
	include ('kurir/edit_kurir.php');
}

else if($page=="ongkir")
{
	include ('ongkir/ongkir.php');
}
else if($page=="tambah_ongkir")
{
	include ('ongkir/tambah_ongkir.php');
} 
else if($page=="edit_ongkir")
{
	include ('ongkir/edit_ongkir.php');
}
else if($page=="profil_admin")
{
	include ('profil_admin/profil_admin.php');
}

else{
	include ('welcome.php');
}
?>
</div>


</div>
		
	</script>
    
  <div class="batas"></div>
<footer id="foot-admin">
<h1>Develop & Designed by Silvy &reg; 2016</h1>
</footer>

<?php } ?>

<script>
$(document).ready(function() {
	
$(".setting_user").click(function() {
    $(".setting").toggle();
});

});

</script>
</body>
</html>