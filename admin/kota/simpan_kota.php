<?php
include"../../config/koneksi.php";

$btn=isset($_POST['button'])?$_POST['button']:'';
$nama=isset($_POST['nama'])?$_POST['nama']:'';

$ket=isset($_POST['ket'])?$_POST['ket']:'';

if(!empty($nama) && !empty($ket))
{
$simpan= mysql_query("INSERT INTO kota VALUES('','$nama','$ket')");
?>
<script type="text/javascript">
	alert("Data Tersimpan");
	window.location.href = "../home.php?page=kota";
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

