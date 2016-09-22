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
$cari=mysql_query("select*from bank where id_bank='$id'");
while($data=mysql_fetch_array($cari)){
	
?>
<div class="col10 scrumb"><a href="index.php">Home</a> &raquo; Edit bank</div>
<div class="batas"></div>

<form action="bank/update_bank.php" method="post"  enctype="multipart/form-data">

<div class="row" >
<div class="col8" id="box-add">

<h1><i class="fa fa-plus"></i> Edit bank</h1>

<div class="input-group">
<div class="col2">Nama</div>
<div class="col8"><input type="text" name="nama" id="nama" class="text" placeholder="nama" value="<?php echo $data['nm_bank'];?>" />
  <input type="hidden" name="id" id="id" value="<?php echo $data['id_bank'];?>" />
  <input type="hidden" name="gambar_lama" id="gambar_lama" value="<?php echo $data['gambar_bank'];?>" />
</div>
</div>
<div class="input-group">
  <div class="col2">No Rek</div>
<div class="col8">
  <input name="rek" type="text" class="text" id="rek" placeholder="keterangan" value="<?php echo $data['no_rekening'];?>" />
</div>
</div>
<div class="input-group">
  <div class="col2">Nama Rek</div>
<div class="col8">
  <input name="ket" type="text" class="text" id="ket" placeholder="keterangan" value="<?php echo $data['nm_rekening'];?>" />
</div>
</div>



<div class="input-group">
<div class="col2">gambar</div>
<div class="col8">
  <label for="gambar"></label>
  <input type="file" name="gambar" id="gambar">
</div>
</div>


<div class="input-group">
<div class="col2">gbr</div>
<div class="col8">
<img src="../asset/images/<?php echo $data['gambar_bank'];?>" height="100" width="150" />

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


