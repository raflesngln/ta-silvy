<?php
include('koneksi.php');


$ps=$_POST['pas'];	
$pas=md5($ps);

$email=$_POST['em'];	


if($pas !='' || $email !=''){
$query="select*from pelanggan where email_pelanggan='$email' AND password_pelanggan='$pas'";
$get=mysql_query($query);
while($row=mysql_fetch_array($get)){
	$em=$row['email_pelanggan'];
	$ps=$row['password_pelanggan'];
}
if($em==$email){

$_SESSION['em']=$email;
$_SESSION['ps']=$pas;


echo '
<div class="col10 scrumb"><a href="index.php">Home</a> &raquo; Konfirmasi Login</div>
<div class="batas"></div>

<div class="row">
<div class="col9"><h1 class="bg-succes"><i class="fa fa-check fa-2x"></i> Anda berhasil login. </h1></div>

<script>
window.location="index.php";
</script>
</div>
';

} 

else
{



	echo '
<div class="col10 scrumb"><a href="index.php">Home</a> &raquo; Konfirmasi Login</div>
<div class="batas"></div>

<div class="row">
<div class="col9"><h1 class="bg-error"><i class="fa fa-times fa-2x"></i>  Email dan password tidak cocok. Mohon login dengan email anda atau daftar baru </h1></div>

</div>
';

}


} else 

{
	
echo '
<div class="col10 scrumb"><a href="index.php">Home</a> &raquo; Konfirmasi Login</div>
<div class="batas"></div>

<div class="row">
<div class="col9"><h1 class="bg-error"><i class="fa fa-times fa-2x"></i>  Mohon Lengkapi data anda degan lengkap</h1></div>

</div>
';	
}

?>