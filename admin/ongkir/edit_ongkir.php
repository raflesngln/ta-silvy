<style>
#box-add{
	border:1px #CCC solid;
	padding:20px 20px;
	box-shadow:9px 9px 20px #CCC;
}
</style>
<?php
include"../config/koneksi.php";
$id=$_GET['id'];
$cari=mysql_query("select*from ongkir a 
INNER JOIN kurir b on a.id_kurir=b.id_kurir
INNER JOIN kota c on a.id_kota=c.id_kota where a.id_ongkir='$id'
order by a.nm_tarif");
while($data=mysql_fetch_array($cari)){
	
?>
<div class="col10 scrumb"><a href="index.php">Home</a> &raquo; Edit ongkir</div>
<div class="batas"></div>

<form action="ongkir/update_ongkir.php" method="post"  enctype="multipart/form-data">

<div class="row" >
<div class="col10" id="box-add">

<h1><i class="fa fa-plus"></i> Edit ongkir</h1>



<div class="input-group">
<div class="col2">Kurir</div>
<div class="col8">
  <select name="kurir" id="kurir" class="text">
    <option value="<?php echo $data['id_kurir'];?>"><?php echo $data['nm_kurir'];?></option>
  <?php
  $tampil=mysql_query("select*from kurir order by nm_kurir");
  while($row=mysql_fetch_array($tampil)){
  ?>
  <option value="<?php echo $row['id_kurir'];?>"><?php echo $row['nm_kurir'];?></option>
   <?php } ?>
  </select>
 
  <input type="hidden" name="id" id="id" value="<?php echo $data['id_ongkir'];?>" />
</div>
</div>

<div class="input-group">
<div class="col2">Kota</div>
<div class="col8">
  <select name="kota" id="kota" class="text">
    <option value="<?php echo $data['id_kota'];?>"><?php echo $data['nm_kota'];?></option>
  <?php
  $tampil2=mysql_query("select*from kota order by nm_kota");
  while($row2=mysql_fetch_array($tampil2)){
  ?>
  <option value="<?php echo $row2['id_kota'];?>"><?php echo $row2['nm_kota'];?></option>
   <?php } ?>
  </select>
 
</div>
</div>

<div class="input-group">
<div class="col2">Jenis Paket</div>
<div class="col8">
  <select name="jenis" id="jenis" class="text">
    <option value="Reguler">Reguler</option>
	<option value="Yes">Yes</option>
  </select>
 
</div>
</div>

<div class="input-group">
<div class="col2">Harga Tarif</div>
<div class="col8"><input type="text" name="harga" id="harga" class="text" placeholder="nama" value="<?php echo $data['harga_tarif'];?>" />
</div>
</div>


<div class="input-group">
  
  <div class="col10 text-center">
  <button class="btn btn-blue" type="submit"><i class="fa fa-save"></i> Update</button>
</div>
</div>



</div>
</div>

  <?php } ?>
</form>


