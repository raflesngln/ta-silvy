<div class="col10 scrumb"><a href="index.php">Home</a> &raquo; profil_admin</div>
<div class="batas"></div>

<div class="col10" style="box-shadow:2px 5px 9px #CCC; padding:40px 10px">

<?php
include('../config/koneksi.php');
$usr=$_SESSION['usr_admin'];
$nm=$_SESSION['nm_admin'];


$submit=isset($_POST['button'])?$_POST['button']:'';

$id=isset($_POST['id'])?$_POST['id']:'';
$nama=isset($_POST['nama'])?$_POST['nama']:'';
$us=isset($_POST['us'])?$_POST['us']:'';
$pas_lama=isset($_POST['pas_lama'])?$_POST['pas_lama']:'';
$pas_baru=isset($_POST['pas_baru'])?$_POST['pas_baru']:'';
$ulang=isset($_POST['ulang'])?$_POST['ulang']:'';
$email=isset($_POST['email'])?$_POST['email']:'';

$enkripsi_lama=md5($pas_lama);
$enkripsi_baru=md5($pas_baru);

//jika klik tombol atau username di post
if($us){
	
//jika pasword lama kosong maka pass ga di update/profil lain aja di update
if($pas_lama==''){
	$update=mysql_query("update admin set username='$us',nm_admin='$nama',email='$email' 
	where id_admin='$id'");
	$_SESSION['usr_admin']=$us;
	echo '
	<script>
	alert("Profil berhasil di update tanpa ubah Password lama");
	document.location="home.php?page=profil_admin";
	</script>
	';
	//jika pasword lama di isi maka cek dulu kecocokan di db
} else {
$cari=mysql_query("select*from admin where id_admin='$id' AND username='$usr' AND password='$enkripsi_lama'");
$jum=mysql_num_rows($cari);
	//jika pasword lama cocok dgn di db dan username
	if($jum >=1){
		//jika password baru sama dengan ulangi password
		if($pas_baru==$ulang && strlen($pas_baru) >1){
	$update=mysql_query("update admin set username='$us',nm_admin='$nama',email='$email',password='$enkripsi_baru' 
	where id_admin='$id'");
		
		echo '
		<script>
		alert("Profil dan Password baru berhasil di update ");
		document.location="home.php?page=profil_admin";
		history.back();
		</script>
		';	
		} else {
		echo '
		<script>
		alert("Password baru anda tidak cocok.ulangi password baru anda ");
		document.location="home.php?page=profil_admin";
		history.back();
		</script>
		';
	} } else {
		
		//jika pass lama dan usrname ga cocok dgn di db
    	echo '
	<script>
	alert("Password lama Anda masukkan salah");
	history.back();
	</script>
	';
		}
	}

}

$query="select*from admin where username='$usr'";
$get=mysql_query($query);
while($row=mysql_fetch_array($get))
{
	$nm_admin=$row['nm_admin'];
	$usr_admin=$row['username'];
	$ps_admin=$row['password'];

if($usr_admin==$usr)
{	
?>

<form action="home.php?page=profil_admin" method="post">
<h1 align="center"><i class="fa fa-file-archive-o"></i> Change My profil </h1>


<div class="input-group">
<div class="col3">Username</div>
<div class="col6"><input name="us" type="text" id="us" class="text" value="<?php echo $row['username'] ;?>" required />
  <label for="id"></label>
  <input type="hidden" name="id" id="id" value="<?php echo $row['id_admin'] ;?>">
</div>
</div>

<div class="input-group">
<div class="col3">Nama</div>
<div class="col6"><input name="nama" type="text" id="nama" class="text" value="<?php echo $row['nm_admin'] ;?>" required /></div>
</div>


<div class="input-group">
<div class="col3">Email</div>
<div class="col6"><input name="email" type="text" id="email" class="text" value="<?php echo $row['email'] ;?>" required /></div>
</div>


<div class="col10"><p class="green"><i class="fa fa-bullhorn"></i> Kosongkan dibawah jika tidak ubah password</p></div>

<div class="input-group">
<div class="col3">Password Lama</div>
<div class="col6"><input autocomplete="off" name="pas_lama" type="password" id="pas_lama" class="text" value="" /></div>
</div>

<div class="input-group">
<div class="col3">Password baru</div>
<div class="col6"><input autocomplete="off" name="pas_baru" type="password" id="pas_baru" class="text" value="" /></div>
</div>

<div class="input-group">
<div class="col3">Ulangi password baru</div>
<div class="col6"><input autocomplete="off" name="ulang" type="password" id="ulang" class="text" value="" /></div>
</div>


<div class="input-group">
  <div class="col10 text-center"><button name="btn" type="submit" class="btn btn-blue "><i class="fa fa-check"></i> Konfirmasi Daftar</button></div>
</div>

</form>

<?php } } ?>
</div>

