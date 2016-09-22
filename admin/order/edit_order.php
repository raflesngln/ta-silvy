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
$cari=mysql_query("select*from produk a inner join kategori_produk b on a.id_kategori=b.id_kategori
left join gambar_produk c on a.id_produk=c.id_produk
 where a.id_produk='$id' GROUP BY c.id_produk");
while($data=mysql_fetch_array($cari)){
	
?>
<div class="col10 scrumb"><a href="index.php">Home</a> &raquo; Edit Produk</div>
<div class="batas"></div>

<form action="produk/update_produk.php" method="post"  enctype="multipart/form-data">

<div class="row" >
<div class="col8" id="box-add">

<h1><i class="fa fa-plus"></i> Edit Produk</h1>

<div class="input-group">
<div class="col2">Nama</div>
<div class="col8"><input type="text" name="nama" id="nama" class="text" placeholder="nama" value="<?php echo $data['nm_produk'];?>" />
  <input type="hidden" name="id" id="id" value="<?php echo $data['id_produk'];?>" />
  <input type="hidden" name="gambar_lama" id="gambar_lama" value="<?php echo $data['gambar_produk'];?>" />
</div>
</div>

<div class="input-group">
<div class="col2">Kategori</div>
<div class="col8">
<select name="kategori" id="kategori" class="text">
<option value="<?php echo $data['id_kategori'];?>"><?php echo $data['nm_kategori'];?></option>
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
<div class="col8"><input type="text" name="stok" id="stok" class="text" placeholder="stok" value="<?php echo $data['stok_produk'];?>"/></div>
</div>

<div class="input-group">
<div class="col2">Harga</div>
<div class="col8"><input type="text" name="harga" id="harga" class="text" placeholder="harga" value="<?php echo $data['harga_produk'];?>" /></div>
</div>

<div class="input-group">
<div class="col2">Gambar</div>
<div class="col8">
  <textarea name="ket" class="text" id="ket" placeholder="keterangan"><?php echo $data['ket_produk'];?></textarea>
</div>
</div>

<div class="input-group">
<div class="col2">Ket</div>
<div class="col8">
  <label for="gambar"></label>
  <input type="file" name="gambar" id="gambar">
</div>
</div>


<div class="input-group">
<div class="col2">gbr</div>
<div class="col8">
<img src="../asset/produk/<?php echo $data['gambar_produk'];?>" height="100" width="150" />

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


