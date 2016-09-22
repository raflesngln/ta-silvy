<?php
include"../../config/koneksi.php";
$folder='../../asset/images/';

$id=isset($_POST['id'])?$_POST['id']:'';

$nama=isset($_POST['nama'])?$_POST['nama']:'';
$ket=isset($_POST['ket'])?$_POST['ket']:'';
$gambar_lama=isset($_POST['gambar_lama'])?$_POST['gambar_lama']:'';
$gambar=$_FILES['gambar']['name'];
$tgl_simpan=date('Y-m-d');

if(!empty($nama) && !empty($ket))
{

if($gambar==''){
	$simpan_gambar=	$gambar_lama;
} else {
	$simpan_gambar=	$gambar;
	unlink('../../asset/images/'.$gambar);
	unlink('../../asset/images/'.$gambar_lama);
	move_uploaded_file($_FILES['gambar']['tmp_name'], $folder.$_FILES['gambar']['name']);
}
$simpan= mysql_query("update cara_belanja set nm_cara_belanja='$nama',ket_cara_belanja='$ket',gambar_cara_belanja='$simpan_gambar' where id_cara_belanja='$id'");

echo'
<script type="text/javascript">
	alert("Data Tersimpan");
	window.location.href = "../home.php?page=cara_belanja";
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

