<?php
include"../../config/koneksi.php";

$btn=isset($_POST['button'])?$_POST['button']:'';
$harga=isset($_POST['harga'])?$_POST['harga']:'';
$nama=isset($_POST['nama'])?$_POST['nama']:'';
$kategori=isset($_POST['kategori'])?$_POST['kategori']:'';
$stok=isset($_POST['stok'])?$_POST['stok']:'';
$ket=isset($_POST['ket'])?$_POST['ket']:'';
$gambar=$_FILES['gambar']['name'];
$tgl_simpan=date('Y-m-d');

$tampil="select*from tr_order a inner join detail_order b on a.id_order=b.id_order 
INNER JOIN pelanggan c on a.id_user=c.email_pelanggan
group by b.id_order LIMIT $posisi,$batas";
$hasil=mysql_query($tampil);
$jum=0;
$jum=mysql_num_rows($hasil);
while($row=mysql_fetch_array($hasil))
{
	
	
}
?>

