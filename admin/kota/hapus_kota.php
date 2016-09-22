<?php
include"../../config/koneksi.php";
$folder='../../asset/produk/';

$id=isset($_GET['id'])?$_GET['id']:'';


if(isset($id))
{

$hapus_gambar= mysql_query("delete from kota where id_kota='$id'");

echo'
<script type="text/javascript">
	alert("Data Terhapus");
	window.location.href = "../home.php?page=kota";
	</script>
	';
}
else
{ ?>
	<script type="text/javascript">
	alert('tidak boleh hapus,');
	window.history.back();
	</script>
<?php }
?>

