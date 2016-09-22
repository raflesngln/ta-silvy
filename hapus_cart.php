<?php
error_reporting(0);
include('config/koneksi.php');
session_start(); //start session


$kode=$_GET['id'];
$kode_session=$kode;

 

unset($_SESSION["produk"][$kode]);

header("Location: index.php?page=cart_prosess");	



?>