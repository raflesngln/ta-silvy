<style>
#box-add{
	border:1px #CCC solid;
	padding:20px 20px;
	box-shadow:9px 9px 20px #CCC;
}
</style>
<?php
include"../config/koneksi.php";
?>
<div class="col10 scrumb"><a href="index.php">Home</a> &raquo; Tambah Produk</div>
<div class="batas"></div>

<form action="kategori/simpan_kategori.php" method="post"  enctype="multipart/form-data">

<div class="row" >
<div class="col8" id="box-add">

<h1><i class="fa fa-plus"></i> Tambah Produk</h1>

<div class="input-group">
<div class="col2">Nama</div>
<div class="col8"><input type="text" name="nama" id="nama" class="text" placeholder="nama" /></div>
</div>
<div class="input-group">
  <div class="col2">Ket</div>
<div class="col8">
  <textarea name="ket" class="text" id="ket" placeholder="keterangan"></textarea>
</div>
</div>
<div class="input-group">
  
  <div class="col10 text-center">
  <button class="btn btn-blue" type="submit"><i class="fa fa-save"></i> Simpan</button>
</div>
</div>



</div>
</div>

  
</form>


