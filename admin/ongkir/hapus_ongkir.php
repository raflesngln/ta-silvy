<?php
include"../../config/koneksi.php";


$id=isset($_GET['id'])?$_GET['id']:'';


if(isset($id))
{

$hapus_gambar= mysql_query("delete from ongkir where id_ongkir='$id'");

echo'
<script type="text/javascript">
	alert("Data Terhapus");
	window.location.href = "../home.php?page=ongkir";
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

