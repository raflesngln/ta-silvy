<?php
include('koneksi.php');


$ps=$_POST['pas'];	
$pas=md5($ps);

$nama=$_POST['nama'];	
$email=$_POST['email'];	
$phone=$_POST['phone'];	
$alamat=$_POST['alamat'];	
$propinsi=$_POST['propinsi'];	
$kota=$_POST['kota'];	
$pos=$_POST['pos'];	

if($pas !='' || $nama !='' || $email !='' || $alamat !=''){
$query="select*from pelanggan where email_pelanggan='$email'";
$get=mysql_query($query);
while($row=mysql_fetch_array($get)){
	$em=$row['email_pelanggan'];
	
}
if($em==$email){
	
	echo '
<div class="row">
<div class="col9"><h1 class="bg-error"><i class="fa fa-times fa-2x"></i>  Email ini sudah terdaftar. Mohon login dengan email anda atau daftar baru </h1></div>

</div>
';

} 

else
{
	
$simpan=mysql_query("insert into pelanggan values('','$nama','$email','$pas','$alamat','$propinsi','$kota','$pos','$phone','','','')");


echo '
<div class="row">
<div class="col9"><h1 class="bg-succes"><i class="fa fa-check fa-2x"></i> Anda berhasil Daftar. Mohon untuk login dengan menu login di atas</h1></div>

</div>
';
	
}


} else 

{
	
echo '
<div class="row">
<div class="col9"><h1 class="bg-error"><i class="fa fa-times fa-2x"></i>  Mohon Lengkapi data anda degan lengkap</h1></div>

</div>
';	
}

?>