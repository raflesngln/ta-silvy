<script src="asset/js/jquery-1.8.2.min.js"></script>

<style>
.cart-box{
	margin-top:30px;
}
.img-cart{
	height:50px;
	width:50px;
}
.list-produk{
	background-color:#CCC;
}
</style>

<div class="col10 scrumb"><a href="index.php">Home</a> &raquo; Konfirmasi alamat kirim </div>
<div class="batas"></div>

<?php

$em=$_SESSION['em'];
if(!isset($em)){
	
	echo '<script>window.location ="index.php?page=login"</script>';
	
} else {

error_reporting(0);
include('config/koneksi.php');



$kode=$_POST['idproduk'];
$qty=$_POST['qty'];
$kode_session=$kode.'/'.$qty;

foreach ($_SESSION['produk'] as $isi) {
	$prod=$isi;
	$pot=explode("/",$prod);
	$kd=$pot[0];
	$prodqty=$pot[1];
}
 
if($kd !=$kode)
	{
	 $_SESSION['produk'][$kode_session] = $kode_session;
	} else {
		unset($_SESSION["produk"][$kd.'/'.$prodqty]);
		$_SESSION['produk'][$kode_session] = $kode_session;
}
//unset($_SESSION["produk"][$kode_session]);

echo '<div class="col10 cart-box"><h1>My Cart</h1></div>';

$num_rows = 0;
$num_rows=count($_SESSION['produk']);	
foreach ($_SESSION['produk'] as $val) {
    $prod=$val;
	$pot=explode("/",$prod);
	$kdbeli=$pot[0];
	$qtybeli=$pot[1]; 
	
	
	 
$query="select* from produk a
        INNER JOIN gambar_produk b on a.id_produk=b.id_produk 
		where a.id_produk='$kdbeli' Group by b.id_produk
		";
$get=mysql_query($query);

while($row=mysql_fetch_array($get)){
	
$sub=$row['harga_produk']*$qtybeli;	
$total+=$sub;
$grandtotal+=$sub;
	?>	
    
<a class="list-produk" href="index.php?page=detail_produk&&idproduk=<?php echo $row['id_produk'] ;?>&&nm_produk=<?php echo $row['nm_produk'] ;?>">
<div class="row">
<div class="col1"><img class="img-cart" src="asset/produk/<?php echo $row['gambar_produk'];?>" /></div>
<div class="col1"><?php echo $kdbeli;?></div>
<div class="col4"><?php echo $row['nm_produk'];?></div>
<div class="col1"><?php echo $qtybeli;?></div>
<div class="col1"><?php echo number_format($row['harga_produk'],0,'.','.');?></div>
<div class="col1"><?php echo number_format($sub,0,'.','.');?></div>
<div class="col1"><a href="index.php?page=hapus_cart&&id=<?php echo $kdbeli.'/'.$qtybeli;?>"><i class="fa fa-times red" id="hapus"></i></a></div>

<div class="batas"></div>
</div>
</a>

<?php
}	

}?>
<div class="batas"></div>
<div class="col10"><h3 class="text-right">Total Belanja  :   <?php echo 'Rp   '.number_format($grandtotal,0,'.','.');?>
  <input type="hidden" name="totoal_belanja" id="totoal_belanja" value="<?php echo $grandtotal;?>" />
</h3>
</div>

<div class="batas"></div>

<?php
$email_sesi=$em=$_SESSION['em'];
$data_user=mysql_query("select*from pelanggan a LEFT join kota b on a.kota_pelanggan=b.id_kota where email_pelanggan='$email_sesi'");
while($data=mysql_fetch_array($data_user)){
?>

<form method="post" action="index.php?page=finis_checkout">
<div class="row">
<h1 class="judul">Data Pelanggan:</h1>

<div class="input-group">
<div class="col2">Nama </div>
<div class="col7"><input class="text" name="nama" value="<?php echo $data['nm_pelanggan'];?>" /></div>
</div>

<div class="input-group">
<div class="col2">Alamat Lengkap </div>
<div class="col7"><textarea name="alamat" class="text" cols="" rows=""><?php echo $data['alamat_pelanggan'];?></textarea></div>
</div>

<div class="input-group">
<div class="col2">Email </div>
<div class="col7"><input name="email" class="text" id="email" value="<?php echo $data['email_pelanggan'];?>"/></div>
</div>

<div class="input-group">
<div class="col2">Telpon </div>
<div class="col7"><input name="telpon" class="text" id="telpon" value="<?php echo $data['telpon_pelanggan'];?>" /></div>
</div>

<div class="input-group">
<div class="col2">Propinsi </div>
<div class="col7"><input name="propinsi" class="text" id="propinsi" value="<?php echo $data['propinsi'];?>"/></div>
</div>


<div class="input-group">
<div class="col2">Kota </div>
<div class="col7">
  
 <select name="kota" class="text" id="idkota" onchange="pilih_kurir()">
  <option value="<?php echo $data['id_kota'];?>"><?php echo $data['nm_kota'];?></option>
  <?php
  $kota=mysql_query("select*from kota");
  while($data2=mysql_fetch_array($kota)){
  ?>
    <option value="<?php echo $data2['id_kota'];?>"><?php echo $data2['nm_kota'];?></option>
    <?php } ?>
</select>

</div>
</div>

<div class="input-group">
<div class="col2">kode pos </div>
<div class="col7"><input class="text" name="pos" id="pos" value="<?php echo $data['kd_pos'];?>" /></div>
</div>

<div class="input-group">
<div class="col2">Total belanja </div>
<div class="col7"><input class="text" name="total_order" id="total_order" value="<?php echo $grandtotal;?>" /></div>
</div>

<div class="col10"><h1>Ongkos Kirim</h1></div>

<div class="input-group">
<div class="col2">Paket Kiriman </div>
<div class="col7">
  <select name="kurir" id="kurir" class="text" required onchange="pilih_kurir()">
    <option value="">Pilih Kurir</option>
  <?php
  $tampil=mysql_query("select*from kurir order by nm_kurir");
  while($data=mysql_fetch_array($tampil)){
  ?>
  <option value="<?php echo $data['id_kurir'];?>"><?php echo $data['nm_kurir'];?></option>
  <?php } ?>
</select>
</div>
</div>

<div class="input-group">
<div class="col2">Jenis Paket</div>
<div class="col7">
  <select name="jenis_paket" id="jenis_paket" class="text" required onchange=" return pilih_paket()">
    <option value="">--------</option>

</select>
</div>
</div>

<div class="input-group">
<div class="col2">Biaya Ongkir </div>
<div class="col7">
  <input name="biaya_ongkir" class="text" id="biaya_ongkir" required="required" readonly="readonly"/>
</div>
</div>

<div class="col10"><h1 id="label_bayar" class="pull-right" style="margin-right:5%">Total 
  <input type="hidden" name="totbar" id="totbar" />
</h1>
</div>

</div>
<?php } ?>

<div class="batas"></div>

<div class="col5" style="padding-left:25%; margin-top:30px">



<div class="col6">
<a href="index.php"><button class="btn-lime btn-block"><i class="fa fa-check"></i> Konfirmasi Belanja  &raquo;</button></a>
</div>
</div>

</form>

<?php } ?>


<script type="text/javascript">
$(document).ready(function() {

	
});

function toRp(angka){
  //var angka =document.getElementById("rp").value;
    var rev     = parseFloat(angka, 10).toString().split('').reverse().join('');
    var rev2    = '';
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += '.';
        }
    }
   // return 'Rp' + rev2.split('').reverse().join('') + ',00';
    return rev2.split('').reverse().join('');
}


function pilih_kurir(){
	var status ='pilih_kurir';
	var kota = $('#idkota').val();
	var kurir = $('#kurir').val();
	//Gunakan jquery AJAX
		$.ajax({
                url :'ajax_ongkir.php',
				dataType: "json",
				type: "POST",
		data: "kurir="+kurir+"&kota="+kota+"&status="+status,
                success: function(data){
			    $("#biaya_ongkir").val('');
				$("#jenis_paket").empty();
				$("#jenis_paket").append('<option value="">Pilih Jenis</option>');
					for(i = 0; i < data.length; i++){
				var text='<option value="'+ data[i]['nm_tarif']+'">'+data[i]['nm_tarif']+'</option>';
						$("#jenis_paket").append(text);
						console.log(data[i]['nm_tarif']);
					}
               }
            });
}
function pilih_paket(){
//Mengambil value tgl 1 dan 2
	var status ='pilih_paket';
	var kurir = $('#kurir').val();
	var kota = $('#idkota').val();
	var jenis = $('#jenis_paket').val();

	//Gunakan jquery AJAX
		$.ajax({
     url :'ajax_ongkir.php',
	dataType: "json",
	type: "POST",
	data: "kurir="+kurir+"&kota="+kota+"&jenis="+jenis+"&status="+status,
                success: function(data){
					for(i = 0; i < data.length; i++){
						$("#biaya_ongkir").val(data[i]['harga_tarif']);
					}
				var belanja=$("#totoal_belanja").val();
				var ongkir=$("#biaya_ongkir").val();
				var total_bayar=parseFloat(belanja) + parseFloat(ongkir);
				$("#label_bayar").html('Total Bayar Rp  '+toRp(total_bayar));
               }
            });
}

</script>
