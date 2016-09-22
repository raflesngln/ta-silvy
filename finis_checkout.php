<?php
include('koneksi.php');
$email_sesi=$em=$_SESSION['em'];

$nama=$_POST['nama'];	
$email=$_POST['email'];	
$phone=$_POST['telpon'];	
$alamat=$_POST['alamat'];	
$propinsi=$_POST['propinsi'];	
$kota=$_POST['kota'];	
$pos=$_POST['pos'];	
$total_order=$_POST['total_order'];	
$biaya_ongkir=$_POST['biaya_ongkir'];
$kurir=$_POST['kurir'];



if($phone !='' || $nama !='' || $email !='' || $alamat !=''){
$query="select*from pelanggan where email_pelanggan='$email'";
$get=mysql_query($query);
while($row=mysql_fetch_array($get)){
	$em=$row['email_pelanggan'];
	
}
if($em==$email){  // jika email session cocok dengan email di db makas
	
//update data pelanggan jika di ubah dari input
$simpan=mysql_query("update pelanggan set nm_pelanggan='$nama',alamat_pelanggan='$alamat',propinsi='$propinsi',kota_pelanggan='$kota',kd_pos='$pos',telpon_pelanggan='$phone'
 where email_pelanggan='$email_sesi'");
 
//membuat generate nomor order
$tgl=date('Ymd');
$tgl_simpan=date('Y-m-d / H:i:s');
  $cari =mysql_query("select max(right(id_order,4)) as kd_max from tr_order");
		$jum=mysql_num_rows($cari);
        $kd = '';
        if($jum >=1)
        {
			while($data=mysql_fetch_array($cari)){
			   $tmp = ((int)$data['kd_max'])+1;
               $kd = sprintf("%04s", $tmp);
			}
        }
        else{
            $kd = "0001";
        }
        $invoice="INV-".$tgl.$kd;


//simpan data order atau header order
$simpan_order=mysql_query("insert into tr_order values('$invoice','$email_sesi','$biaya_ongkir','$kurir','$biaya_ongkir','$tgl_simpan','$total_order','','0')");

//mengambil data cart dan cocookkn dengan db dari sesion untuk simpan ke detail orders
foreach ($_SESSION['produk'] as $val) {
    $prod=$val;
	$pot=explode("/",$prod);
	$kdbeli=$pot[0];
	$qtybeli=$pot[1]; 
	
	$caridata=mysql_query("select*from produk where id_produk='$kdbeli'");
	while($data=mysql_fetch_array($caridata)){
	$harga=$data['harga_produk'];	
	$subtotal=$harga*$qtybeli;	
	
	$simpan_detail_order=mysql_query("insert into detail_order values('','$invoice','$kdbeli','$email_sesi','$harga','$qtybeli','$subtotal')");
	}
}


//hapus session cart
unset($_SESSION["produk"]);

	echo '
<div class="row">
<div class="col9"><h1 class="bg-succes"><i class="fa fa-check fa-2x"></i>  Terimakasi pesanan anda akan segera di proses. Mohon Lakukan Pembayaran dan konfirmasi pesanan pada menu pesanan anda.Anda bisa melihat pesanan anda di menu order anda'.strlen($cari).' </h1></div>

</div>
';

} 

else
{
	
echo '
<div class="row">
<div class="col9"><h1 class="bg-error"><i class="fa fa-times fa-2x"></i> Anda belum login .silahkan login atatu daftar</h1></div>

</div>
';
	
}


} else 

{
	
echo '
<div class="row">
<div class="col9"><h1 class="bg-error"><i class="fa fa-times fa-2x"></i>  Mohon Lengkapi data anda degan lengkap</h1></div>

</div>
';	
}

?>