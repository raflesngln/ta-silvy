<?php
include"../../config/koneksi.php";
$folder='../../asset/images/';

$id=isset($_GET['id'])?$_GET['id']:'';


if(isset($id))
{
$cari=mysql_query("select*from kurir where id_kurir='$id'");
while($row=mysql_fetch_array($cari)){
 $nm_gambar=$row['gambar_kurir'];	 
 //hapus seua gambar dari folder menuru id produk
 unlink('../../asset/images/'.$nm_gambar);
}

$hapus_gambar= mysql_query("delete from kurir where id_kurir='$id'");

echo'
<script type="text/javascript">
	alert("Data Terhapus");
	window.location.href = "../home.php?page=kurir";
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

