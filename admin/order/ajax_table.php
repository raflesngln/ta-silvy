<table class="my-table">
  <thead>
  <tr>
    <td width="29">No</td>
    <td width="150" height="58"><div align="center">id order</div></td>
    <td width="169">Tgl</td>
    <td width="321"><div align="left">Nama</div></td>
    <td width="218"><div align="left">telpon</div></td>
    <td width="102"><div align="left">Total_order</div></td>
    <td width="96">Resi</td>
    <td width="96"><div align="left">Status</div></td>
    <td><div align="center">Aksi</div></td>
    </tr>
    </thead>
<?php

include"../../config/koneksi.php";

$tgl1=$_POST['tgl1'];
$tgl2=$_POST['tgl2'];
$status=$_POST['status'];
if($status=='all'){
	$status_order='';	
} else {
	$status_order="AND a.status_order='$status'";	
}

$no=1;
$batas=30;
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
$tampil="select*from tr_order a inner join detail_order b on a.id_order=b.id_order 
INNER JOIN pelanggan c on a.id_user=c.email_pelanggan WHERE LEFT(a.tgl_order,10) BETWEEN '$tgl1' AND '$tgl2' $status_order 
group by b.id_order LIMIT $posisi,$batas";
$hasil=mysql_query($tampil);
$jum=0;
$jum=mysql_num_rows($hasil);
while($row=mysql_fetch_array($hasil))
{
$status=$row['status_order'];
if($status=='0'){
	$status_order='<label class="label-red">Pending</label>';
} else if($status=='1'){
	$status_order='<label class="label-warning">Menuggu</label>';
} else if($status=='2'){
	$status_order='<label class="label-green">Order Selesai</label>';
}

$jum++;

 ?>
 <tr>
   <td><?php echo $no; ?></td>
      <td height="32"><div align="left"> <?php echo $row['id_order']; ?></div><div align="center"></div></td>
      <td><?php echo date('d-m-Y',strtotime($row['tgl_order'])); ?></td>
    <td><div align="left"><?php echo $row['nm_pelanggan']; ?></div></td>
    <td><?php echo $row['telpon_pelanggan']; ?></td>
    <td><div align="right"><?php echo number_format($row['total_order'],0,'.','.'); ?></div></td>
    <td><?php echo $row['no_resi']; ?></td>
    <td><?php echo $status_order; ?></td>
    <td width="86"><div class="box-action">
    <a href="home.php?page=detail_order&&id_order=<?php echo $row['id_order']; ?>"><i class="fa fa-edit blue"></i> </a> 
     
      <a style="display:none" onclick="return confirm('Yakin Hapus data ?')" href="order/hapus_order.php?id=<?php echo $row[''];?>"><i class="fa fa-times red"></i></a> 
    </div></td>
    </tr>
   <?php $no++; } ?>
</table>

  <p>
    
