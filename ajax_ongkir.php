<?php

include"config/koneksi.php";
$status=$_POST['status'];

$kurir=$_POST['kurir'];
$kota=$_POST['kota'];
$jenis=isset($_POST['jenis'])?$_POST['jenis']:'';

if($status=='pilih_paket'){	
$data=array();
$tampil=mysql_query("select*from ongkir WHERE id_kurir='$kurir' AND nm_tarif='$jenis' AND id_kota='$kota'");

	while($list=mysql_fetch_array($tampil)){
			$row = array(
            'harga_tarif' =>$list['harga_tarif'],
            'nm_tarif' =>$list['nm_tarif'],
			'nama'=>$kurir.'/'.$kota.'/'.$jenis,
			);
			$data[] = $row;	
			
}
echo json_encode($data);

} 
  elseif($status=='pilih_kurir'){
	$data=array();
	$tampil=mysql_query("select*from ongkir WHERE id_kurir='$kurir' AND id_kota='$kota'");
	
		while($list=mysql_fetch_array($tampil)){
				$row = array(
				'nm_tarif' =>$list['nm_tarif'],
				);
				$data[] = $row;	
				
	}
	echo json_encode($data);	
	
}


?>