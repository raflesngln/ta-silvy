<?php
include"../config/koneksi.php";

$status_order_lama=isset($_POST['status_order_lama'])?$_POST['status_order_lama']:'';
$invoice=isset($_POST['invoice'])?$_POST['invoice']:'';
$status=isset($_POST['status'])?$_POST['status']:'';


if(isset($invoice) && isset($status))
{

//cari setiap produk dalam order untuk di update stoknya 
$cari= mysql_query("select*from konfirmasi_bayar a
	inner join detail_order b on a.id_order=b.id_order
	inner join produk c on b.id_produk=c.id_produk
	where a.id_order='$invoice'
	");
if($cari && $status=='2'){
	while($row=mysql_fetch_array($cari)){
		$id_produk=$row['id_produk'];
		$qty_beli=$row['qty'];
		$stok=$row['stok_produk'];
		$hasil_kurang=$stok-$qty_beli;
		
		$kurangi_stok=mysql_query("update produk set stok_produk='$hasil_kurang' WHERE id_produk='$id_produk'");
		$update_status_order=mysql_query("update tr_order set Status_order='$status' WHERE id_order='$invoice'");
	}
	echo '<h3 class="label-green"><i class="fa fa-check"></i> Status pesanan Selesai.Pastikan Produk sudah diproses atau dikirim ke pelanggan </h3>';
} else {
	echo '<h1 class="label-red"><i class="fa fa-warning"></i> Pesanan Belum Selesai.Jika telah selesai Silahkan Pilih status order selesai untuk mengurangi stok otomaatis</h1>';
}
//$simpan_gambar= mysql_query("INSERT INTO gambar_produk VALUES('','$id','$simpan_gambar','$simpan_gambar','$tgl_simpan')");


}
else
{ ?>
<script type="text/javascript">
	alert('Form tidak boleh kosong,Harus lengkapxx');
	window.history.back();
	</script>
<?php }
?>
