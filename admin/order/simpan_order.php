<?php
include"../../config/koneksi.php";

$btn=isset($_POST['button'])?$_POST['button']:'';
$harga=isset($_POST['harga'])?$_POST['harga']:'';
$nama=isset($_POST['nama'])?$_POST['nama']:'';
$kategori=isset($_POST['kategori'])?$_POST['kategori']:'';
$stok=isset($_POST['stok'])?$_POST['stok']:'';
$ket=isset($_POST['ket'])?$_POST['ket']:'';
$gambar=$_FILES['gambar']['name'];
$tgl_simpan=date('Y-m-d');

if(isset($btn))
{
if(!empty($harga) && !empty($nama) && !empty($kategori) && !empty($ket) && !empty($gambar))
{
$gambar=$_FILES['gambar']['name'];

        $cari =mysql_query("select max(right(id_produk,4)) as kd_max from produk");
		$jum=mysql_num_rows($cari);
        $kd = '';
        if($jum >=1)
        {
			while($data=mysql_fetch_array($cari)){
			   $tmp = $data['kd_max']+1;
               $kd = sprintf("%04s", $tmp);
			}
        }
        else{
            $kd = "0001";
        }
        $kode_produk="PROD-".$kd;
	
$simpan= mysql_query("INSERT INTO produk VALUES('$kode_produk','$kategori','$nama','$harga','$stok','$ket','$tgl_simpan')");
$simpan_gambar= mysql_query("INSERT INTO gambar_produk VALUES('','$kode_produk','$gambar','$gambar','$tgl_simpan')");

$folder='../../asset/produk/';
unlink('../../asset/produk/'.$gambar);
move_uploaded_file($_FILES['gambar']['tmp_name'], $folder.$_FILES['gambar']['name']);

?>
<script type="text/javascript">
	alert("Data Tersimpan");
	window.location.href = "../home.php?page=produk";
	</script>
<?php }

else
{ ?>
	<script type="text/javascript">
	alert('Form tidak boleh kosong,Harus lengkap');
	window.history.back();
	</script>
<?php }
}
?>

