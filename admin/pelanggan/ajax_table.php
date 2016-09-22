<table class="my-table">
  <thead>
  <tr>
    <td width="109" height="58"><div align="center">No</div></td>
    <td width="142">Nama</td>
    <td width="332">Email</td>
    <td width="332">ALamat</td>
    <td width="332">Propisni</td>
    <td width="332">Kota</td>
    <td width="332">kd Pos</td>
    <td><div align="center">Aksi</div></td>
    </tr>
    </thead>
<?php
include"../../config/koneksi.php";
$txtcari=$_POST['txtcari'];

$no=1;
$batas=55;
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
$tampil="select*from pelanggan a left join kota b on a.kota_pelanggan=b.id_kota 
where a.nm_pelanggan LIKE '$txtcari%' OR b.nm_kota LIKE '$txtcari%' OR a.email_pelanggan LIKE '$txtcari%'
 order by a.nm_pelanggan LIMIT $posisi,$batas";
$hasil=mysql_query($tampil);
$jum=0;
$jum=mysql_num_rows($hasil);
while($row=mysql_fetch_array($hasil))
{



$jum++;

 ?>
 <tr>
      <td height="32"><div align="left"> <?php echo $no; ?></div><div align="center"></div></td>
      <td><?php echo $row['nm_pelanggan']; ?></td>
      <td><?php echo $row['email_pelanggan']; ?></td>
      <td><?php echo $row['alamat_pelanggan']; ?></td>
      <td><?php echo $row['propinsi']; ?></td>
      <td><?php echo $row['nm_kota']; ?></td>
    <td><div align="left"><?php echo $row['kd_pos']; ?></div></td>
    <td width="79"><div class="box-action">
      <a style="display:none" href="home.php?page=edit_kategori&&id=<?php echo $row['id_kategori']; ?>"><i class="fa fa-edit blue"></i> </a> 
      
      <a onclick="return confirm('Yakin Hapus data ?')" href="pelanggan/hapus_pelanggan.php?id=<?php echo $row['id_pelanggan'];?>"><i class="fa fa-times red"></i></a> 
    </div></td>
    </tr>
   <?php $no++; } ?>
</table>