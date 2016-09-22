<div class="col10 scrumb"><a href="index.php">Home</a> &raquo; Tentang Kami</div>
<div class="batas"></div>

<div class="row">
<div class="col8">
<h1 align="center">Tentang Kami</h1>
<?php
include 'koneksi.php';
$query=mysql_query("select*from profil order by nm_profil");
while($row=mysql_fetch_array($query)){
?>
<img src="asset/images/<?php echo $row['gambar_profil'] ;?>" style="height:200px; width:300px; float:left" />
<p><?php echo $row['ket_profil'] ;?></p>

<?php } ?>
</div>



</div>