<?php
include"../../config/koneksi.php";
$folder='../../asset/produk/';

$id=isset($_POST['id'])?$_POST['id']:'';
$nama=isset($_POST['nama'])?$_POST['nama']:'';
$ket=isset($_POST['ket'])?$_POST['ket']:'';


if(!empty($nama) && !empty($ket))
{
$simpan= mysql_query("update kota set nm_kota='$nama',ket_kota='$ket' where id_kota='$id'");

echo'
<script type="text/javascript">
	alert("Data Tersimpan");
	window.location.href = "../home.php?page=kota";
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

