<?php
include"../../config/koneksi.php";


$id=isset($_POST['id'])?$_POST['id']:'';
$kurir=isset($_POST['kurir'])?$_POST['kurir']:'';
$kota=isset($_POST['kota'])?$_POST['kota']:'';
$jenis=isset($_POST['jenis'])?$_POST['jenis']:'';
$harga=isset($_POST['harga'])?$_POST['harga']:'';

if(!empty($harga) && !empty($jenis)&& !empty($kurir)&& !empty($kota))
{
$simpan= mysql_query("update ongkir set id_kota='$kota',id_kurir='$kurir',nm_tarif='$jenis',harga_tarif='$harga' where id_ongkir='$id'");

echo'
<script type="text/javascript">
	alert("Data Tersimpan");
	window.location.href = "../home.php?page=ongkir";
	</script>
	';
}
else
{ ?>
	<script type="text/javascript">
	alert('Form tidak boleh kosong,Harus lengkap');
	window.history.back();
	</script>
<?php }
?>

