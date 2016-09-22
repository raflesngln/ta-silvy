<?php
include"../../config/koneksi.php";

$nama=isset($_POST['nama'])?$_POST['nama']:'';
$gambar=$_FILES['gambar']['name'];

if(!empty($nama))
{
$gambar=$_FILES['gambar']['name'];

$simpan= mysql_query("INSERT INTO kurir VALUES('','$nama','$gambar')");

$folder='../../asset/images/';
unlink('../../asset/images/'.$gambar);
move_uploaded_file($_FILES['gambar']['tmp_name'], $folder.$_FILES['gambar']['name']);

?>
<script type="text/javascript">
	alert("Data Tersimpan");
	window.location.href = "../home.php?page=kurir";
	</script>
<?php }

else
{ ?>
	<script type="text/javascript">
	alert('Form tidak boleh kosong,Harus lengkap');
	window.history.back();
	</script>
<?php }

?>

