<div class="col10 scrumb"><a href="index.php">Home</a> &raquo; Cara Belanja</div>
<div class="batas"></div>

<div class="row">
<h1 class="text-center">Panduan Belanja</h1>
<div class="col2">
<?php
include 'config/koneksi.php';
$query=mysql_query("select*from cara_belanja order by nm_cara_belanja LIMIT 1");
while($row=mysql_fetch_array($query)){
?>
<img class="img-responsive" src="asset/images/<?php echo $row['gambar_cara_belanja'] ;?>" height="200x"; width="200px" />
<?php } ?>
</div>

<div class="col1">
</div>

<div class="col6">
<div class="row">
   
<?php
$no=1;
$tampil=mysql_query("select*from cara_belanja order by nm_cara_belanja");
while($data=mysql_fetch_array($tampil)){
?> 
     <div class="box-circle">
     <span class="circle"><?php echo $no ;?></span>
     <p><?php echo $data['ket_cara_belanja'] ;?></p>
     </div>

<?php $no++;} ?>

</div>

</div>

</div>