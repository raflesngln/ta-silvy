
<?php
include"../../config/koneksi.php";

$nama=isset($_POST['nama'])?$_POST['nama']:'';
$ket=isset($_POST['ket'])?$_POST['ket']:'';
$rek=isset($_POST['rek'])?$_POST['rek']:'';
$gambar=$_FILES['gambar']['name'];

if(!empty($nama) && !empty($ket)&& !empty($rek))
{
$gambar=$_FILES['gambar']['name'];

$simpan= mysql_query("INSERT INTO bank VALUES('','$nama','$rek','$ket','$gambar')");

$folder='../../asset/images/';
unlink('../../asset/images/'.$gambar);
move_uploaded_file($_FILES['gambar']['tmp_name'], $folder.$_FILES['gambar']['name']);

?>
<script type="text/javascript">
	alert("Data Tersimpan");
	window.location.href = "../home.php?page=bank";
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

