<?php
include"../../config/koneksi.php";

$kurir=isset($_POST['kurir'])?$_POST['kurir']:'';
$kota=isset($_POST['kota'])?$_POST['kota']:'';
$jenis=isset($_POST['jenis'])?$_POST['jenis']:'';
$harga=isset($_POST['harga'])?$_POST['harga']:'';

if(!empty($harga) && !empty($jenis)&& !empty($kurir)&& !empty($kota))
{
$simpan= mysql_query("INSERT INTO ongkir VALUES('','$kurir','$kota','$jenis','$harga')");
?>
<script type="text/javascript">
	alert("Data Tersimpan");
	window.location.href = "../home.php?page=ongkir";
	</script>
<?php }

else
{ ?>
	<script type="text/javascript">
	alert('Form tidak boleh kosong,Harus lengkap');
	window.history.back();
	</script>
<?php }
?>

