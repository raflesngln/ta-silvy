<table class="my-table">
  <thead>
  <tr>
    <td width="59" height="58"><div align="center">No</div></td>
    <td width="370">Nama Kurir</td>
    <td width="110">Nama Kota</td>
    <td width="110">Jenis Tarif</td>
    <td width="110">Harga Tarif</td>
    <td><div align="center">Aksi</div></td>
    </tr>
    </thead>
<?php
include"../../config/koneksi.php";
$txtcari=$_POST['txtcari'];

$no=1;
$batas=50;
$halaman=isset($_GET['halaman'])?$_GET['halaman']:'';
if(empty($halaman))
{
$posisi=0;
$halaman=1;
}
else
{
$posisi=($halaman-1)*$batas;
}
$tampil="select*from ongkir a 
LEFT JOIN kurir b on a.id_kurir=b.id_kurir
LEFT JOIN kota c on a.id_kota=c.id_kota 
WHERE b.nm_kurir like '$txtcari%' OR c.nm_kota like '$txtcari%' OR a.nm_tarif like '$txtcari%' 
order by a.nm_tarif LIMIT $posisi,$batas";
$hasil=mysql_query($tampil);
$jum=0;
$jum=mysql_num_rows($hasil);
while($row=mysql_fetch_array($hasil))
{



$jum++;

 ?>
 <tr>
      <td height="32"><div align="left"> <?php echo $no ?></div><div align="center"></div></td>
    <td><div align="left"><?php echo $row['nm_kurir']; ?></div></td>
    <td><?php echo $row['nm_kota']; ?></td>
    <td><?php echo $row['nm_tarif']; ?></td>
    <td>
      <div align="right"><?php echo number_format($row['harga_tarif'],0,'.','.'); ?></div></td>
    <td width="98"><div class="box-action">
      <a href="home.php?page=edit_ongkir&&id=<?php echo $row['id_ongkir']; ?>"><i class="fa fa-edit blue"></i> </a> 
      
      <a onclick="return confirm('Yakin Hapus data ?')" href="ongkir/hapus_ongkir.php?id=<?php echo $row['id_ongkir'];?>"><i class="fa fa-times red"></i></a> 
    </div></td>
    </tr>
   <?php $no++; } ?>
</table>