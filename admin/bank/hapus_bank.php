<?php
include"../../config/koneksi.php";
$folder='../../asset/images/';

$id=isset($_GET['id'])?$_GET['id']:'';


if(isset($id))
{
$cari=mysql_query("select*from bank where id_bank='$id'");
while($row=mysql_fetch_array($cari)){
 $nm_gambar=$row['gambar_bank'];	 
 //hapus seua gambar dari folder menuru id produk
 unlink('../../asset/images/'.$nm_gambar);
}

$hapus_gambar= mysql_query("delete from bank where id_bank='$id'");

echo'
<script type="text/javascript">
	alert("Data Terhapus");
	window.location.href = "../home.php?page=bank";
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

