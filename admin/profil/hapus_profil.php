<?php
include"../../config/koneksi.php";
$folder='../../asset/images/';

$id=isset($_GET['id'])?$_GET['id']:'';


if(isset($id))
{
$cari=mysql_query("select*from profil where id_profil='$id'");
while($row=mysql_fetch_array($cari)){
 $nm_gambar=$row['gambar_profil'];	 
 //hapus seua gambar dari folder menuru id produk
 unlink('../../asset/images/'.$nm_gambar);
}

$hapus_gambar= mysql_query("delete from profil where id_profil='$id'");

echo'
<script type="text/javascript">
	alert("Data Terhapus");
	window.location.href = "../home.php?page=profil";
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

