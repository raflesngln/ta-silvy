<?php
include"../../config/koneksi.php";
$folder='../../asset/produk/';

$id=isset($_GET['id'])?$_GET['id']:'';


if(isset($id))
{
$cari=mysql_query("select*from gambar_produk where id_produk='$id'");
while($row=mysql_fetch_array($cari)){
 $nm_gambar=$row['gambar_produk'];	 
 //hapus seua gambar dari folder menuru id produk
 unlink('../../asset/produk/'.$nm_gambar);
}

$hapus_gambar= mysql_query("delete from gambar_produk where id_produk='$id'");
$hapus_produk= mysql_query("delete from produk where id_produk='$id'");

echo'
<script type="text/javascript">
	alert("Data Terhapus");
	window.location.href = "../home.php?page=produk";
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

