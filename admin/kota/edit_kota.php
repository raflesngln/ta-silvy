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
$cari=mysql_query("select*from kota where id_kota='$id' order by nm_kota");
while($data=mysql_fetch_array($cari)){
	
?>
<div class="col10 scrumb"><a href="index.php">Home</a> &raquo; Edit Kota</div>
<div class="batas"></div>

<form action="kota/update_kota.php" method="post"  enctype="multipart/form-data">

<div class="row" >
<div class="col10" id="box-add">

<h1><i class="fa fa-plus"></i> Edit kota</h1>

<div class="input-group">
<div class="col2">Nama</div>
<div class="col8"><input type="text" name="nama" id="nama" class="text" placeholder="nama" value="<?php echo $data['nm_kota'];?>" />
  <input type="hidden" name="id" id="id" value="<?php echo $data['id_kota'];?>" />
</div>
</div>
<div class="input-group">
  <div class="col2">Ket</div>
<div class="col8">
  <textarea name="ket" class="text" id="ket" placeholder="keterangan"><?php echo $data['ket_kota'];?></textarea>
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


