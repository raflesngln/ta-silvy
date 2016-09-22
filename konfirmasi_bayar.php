<?php
include('config/koneksi.php');


$invoice=$_POST['invoice'];	
$total=$_POST['total'];	
$norek=$_POST['norek'];	
$an=$_POST['an'];	
$jumlah=$_POST['jumlah'];	
$bank=$_POST['bank'];	
$tuju=$_POST['tuju'];	
$tgl=date('Y-m-d H:i:s');

if($invoice !='' || $total !='' || $norek !='' || $an !=''|| $jumlah !=''|| $bank !=''){
$query="select*from tr_order where id_order='$invoice'";
$get=mysql_query($query);
while($row=mysql_fetch_array($get)){
	$id=$row['id_order'];
	$idpelanggan=$row['id_user'];
	
}
if($id==$invoice){
	
	$simpan=mysql_query("insert into konfirmasi_bayar values('','$id','$idpelanggan','','$bank','$tuju','$an','$norek','$jumlah','$tgl')");
	$update_order=mysql_query("update tr_order set status_order='1' where id_order='$id'");
	echo '
<div class="row">
<div class="col9"><h1 class="bg-succes"><i class="fa fa-check fa-2x"></i>'.$idpelanggan.'  Terimakasih sudah konfirmasi pembayaran</h1></div>

</div>
';

} 

else
{


echo '
<div class="row">
<div class="col9"><h1 class="bg-error"><i class="fa fa-times fa-2x"></i> Order tidak ditemukan</h1></div>

</div>
';
	
}


} else 

{
	
echo '
<div class="row">
<div class="col9"><h1 class="bg-error"><i class="fa fa-times fa-2x"></i>  Mohon Lengkapi data  dengan lengkap</h1></div>

</div>
';	
}

?>