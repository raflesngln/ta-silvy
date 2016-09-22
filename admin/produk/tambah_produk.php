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

<form action="produk/simpan_produk.php" method="post"  enctype="multipart/form-data">

<div class="row" >
<div class="col10" id="box-add">

<h1><i class="fa fa-plus"></i> Tambah Produk</h1>

<div class="input-group">
<div class="col2">Nama</div>
<div class="col8"><input type="text" name="nama" id="nama" class="text" placeholder="nama" /></div>
</div>

<div class="input-group">
<div class="col2">Kategori</div>
<div class="col8">
<select name="kategori" id="kategori" class="text">
<option value="">Select Kategoroi</option>
<?php
$query=mysql_query("select*from kategori_produk order by nm_kategori");
while($row=mysql_fetch_array($query)){
	
?>
<option value="<?php echo $row['id_kategori'];?>"><?php echo $row['nm_kategori'];?></option>
<?php } ?>
		
      </select>
      </div>
</div>

<div class="input-group">
<div class="col2">Stok</div>
<div class="col8"><input type="text" name="stok" id="stok" class="text" placeholder="stok"/></div>
</div>

<div class="input-group">
<div class="col2">Harga</div>
<div class="col8"><input type="text" name="harga" id="harga" class="text" placeholder="harga" /></div>
</div>

<div class="input-group">
<div class="col2">Keterangan</div>
<div class="col8">
  <textarea name="ket" rows="7" class="text" id="ket" placeholder="keterangan"></textarea>
</div>
</div>

<div class="input-group">
<div class="col2">Gambar</div>
<div class="col8">
  <label for="gambar"></label>
  <input type="file" name="gambar" id="gambar">
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


