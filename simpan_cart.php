<?php
session_start();
error_reporting(0);
include('config/koneksi.php');



$kode=$_POST['idproduk'];
$qty=$_POST['qty'];
$kode_session=$kode.'/'.$qty;

foreach ($_SESSION['produk'] as $isi) {
	$prod=$isi;
	$pot=explode("/",$prod);
	$kd=$pot[0];
	$prodqty=$pot[1];
}
 
if($kd !=$kode)
	{
	 $_SESSION['produk'][$kode_session] = $kode_session;
	} else {
		unset($_SESSION["produk"][$kd.'/'.$prodqty]);
		$_SESSION['produk'][$kode_session] = $kode_session;
}
?>
<script>
document.location='index.php';
</script>