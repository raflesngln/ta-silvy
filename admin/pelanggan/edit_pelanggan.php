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
$cari=mysql_query("select*from kategori_produk where id_kategori='$id' order by nm_kategori");
while($data=mysql_fetch_array($cari)){
	
?>
<div class="col10 scrumb"><a href="index.php">Home</a> &raquo; Edit Katerghori</div>
<div class="batas"></div>

<form action="kategori/update_kategori.php" method="post"  enctype="multipart/form-data">

<div class="row" >
<div class="col8" id="box-add">

<h1><i class="fa fa-plus"></i> Edit Kategori</h1>

<div class="input-group">
<div class="col2">Nama</div>
<div class="col8"><input type="text" name="nama" id="nama" class="text" placeholder="nama" value="<?php echo $data['nm_kategori'];?>" />
  <input type="hidden" name="id" id="id" value="<?php echo $data['id_kategori'];?>" />
</div>
</div>
<div class="input-group">
  <div class="col2">Gambar</div>
<div class="col8">
  <textarea name="ket" class="text" id="ket" placeholder="keterangan"><?php echo $data['ket_kategori'];?></textarea>
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


