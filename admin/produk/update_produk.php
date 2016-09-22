<?php
include"../../config/koneksi.php";
$folder='../../asset/produk/';

$id=isset($_POST['id'])?$_POST['id']:'';
$btn=isset($_POST['button'])?$_POST['button']:'';
$harga=isset($_POST['harga'])?$_POST['harga']:'';
$nama=isset($_POST['nama'])?$_POST['nama']:'';
$kategori=isset($_POST['kategori'])?$_POST['kategori']:'';
$stok=isset($_POST['stok'])?$_POST['stok']:'';
$ket=isset($_POST['ket'])?$_POST['ket']:'';
$gambar_lama=isset($_POST['gambar_lama'])?$_POST['gambar_lama']:'';
$gambar=$_FILES['gambar']['name'];
$tgl_simpan=date('Y-m-d');

if(!empty($harga) && !empty($nama) && !empty($kategori) && !empty($ket))
{

$simpan= mysql_query("update produk set id_kategori='$kategori',nm_produk='$nama',harga_produk='$harga',stok_produk='$stok',ket_produk='$ket' where id_produk='$id'");

if($gambar==''){
	$simpan_gambar=	$gambar_lama;
} else {
	$simpan_gambar=	$gambar;
	unlink('../../asset/produk/'.$gambar);
	move_uploaded_file($_FILES['gambar']['tmp_name'], $folder.$_FILES['gambar']['name']);
}
$simpan_gambar= mysql_query("INSERT INTO gambar_produk VALUES('','$id','$simpan_gambar','$simpan_gambar','$tgl_simpan')");

echo'
<script type="text/javascript">
	alert("Data Tersimpan");
	window.location.href = "../home.php?page=produk";
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

