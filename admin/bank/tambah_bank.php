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
<div class="col10 scrumb"><a href="index.php">Home</a> &raquo; Tambah Bank</div>
<div class="batas"></div>

<form action="bank/simpan_bank.php" method="post"  enctype="multipart/form-data">

<div class="row" >
<div class="col8" id="box-add">

<h1><i class="fa fa-plus"></i> Tambah bank</h1>

<div class="input-group">
<div class="col2">Nama BAnk</div>
<div class="col8"><input type="text" name="nama" id="nama" class="text" placeholder="nama bank" /></div>
</div>

<div class="input-group">
<div class="col2">No Rekeing</div>
<div class="col8"><input type="text" name="rek" id="rek" class="text" placeholder="norek" /></div>
</div>


<div class="input-group">
  <div class="col2">Nama Rekening</div>
<div class="col8">
  <input name="ket" type="text" class="text" id="ket" placeholder="nama rek" value="" />
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


