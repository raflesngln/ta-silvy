<style>
.my-table{
	width:98%;
}
.my-table thead{
	background-color:#f7f7f7;
}
.my-table td{
	padding:4px 4px;
	border-bottom:1px #CCC solid;
}

.container-wrapper {
	margin:7% auto;
	position: relative;
	overflow: hidden;
}

/* CSS Tab styling is start here */

	/* Tab menu styling*/
	input.tab-menu-radio {
		display: none;
	}
	label.tab-menu {
		display: inline-block;
		float: left;
		padding:10px 30px;
		cursor: pointer;
		z-index: 99;
	}
	/* End Tab menu styling*/

	/* Tab content styling*/
	.tab-content {
		top:-3px;
		clear: both;
		width: 100%;
		position: relative;
		padding:20px;
		background-color: #f7f7f7;
		border-top:1px solid #999;
	}	
	/* End Tab content styling*/

	/* CSS tab core */
		.tab-menu-radio:checked + label {
			-webkit-transition:all 1s; /* Optional */
			-moz-transition:all 1s; /* Optional */
			transition:all 1s; /* Optional */
			background-color:#00006f;
			color: #fff;
			border-radius:4px 4px 0px 0px;
		}
		.tab-content .tab {
			height: 0;
			opacity: 0;
		}
		#tab-menu1:checked ~ .tab-content .tab-1,
		#tab-menu2:checked ~ .tab-content .tab-2,
		#tab-menu3:checked ~ .tab-content .tab-3 {
			-webkit-transition:opacity 1s; /* Optional */
			-moz-transition:opacity 1s; /* Optional */
			transition:opacity 1s; /* Optional */
			height: auto;
			opacity: 1;
		}
	/* End CSS tab core */

/* CSS Tab Styling is end here */
.box-action a{
	float:left;
	font-size:19px;
	margin-left:15px;
}
.box-action a .red{
	color:red;
}
.box-action a .blue{
	color:#00C;
}
.box-action a .green{
	color:#0F0;
}
</style>


<div class="col10 scrumb"><a href="home.php">Home</a> &raquo; Produk </div>
<div class="batas"></div>

	<div class="tab-container">

<div class="tab tab-1">
				<h1>List Produk</h1>
				<p>
                
<h1><a href="home.php?page=tambah_produk"><button class="btn btn-blue"><i class="fa fa-plus"></i> Tambah</button></a></h1>

<table class="my-table">
  <thead>
  <tr>
    <td width="85" height="58"><div align="center">id produk</div></td>
    <td width="191"><div align="center">Nama</div></td>
    <td width="97"><div align="center">Kategori</div></td>
    <td width="70"><div align="center">harga</div></td>
    <td width="62">stok</td>
    <td width="67"><div align="center">Ket</div></td>
    <td><div align="center">Aksi</div></td>
    </tr>
    </thead>
<?php
include"../config/koneksi.php";

$batas=15;
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
$tampil="select*from produk a inner join kategori_produk b on a.id_kategori=b.id_kategori group by a.id_produk LIMIT $posisi,$batas";
$hasil=mysql_query($tampil);
$jum=0;
$jum=mysql_num_rows($hasil);
while($row=mysql_fetch_array($hasil))
{



$jum++;

 ?>
 <tr>
      <td height="32"><div align="left"> <?php echo $row['id_produk']; ?></div><div align="center"></div></td>
    <td><div align="left"><?php echo $row['nm_produk']; ?></div></td>
    <td><?php echo $row['nm_kategori']; ?></td>
    <td><div align="right"><?php echo number_format($row['harga_produk'],0,'.','.'); ?></div></td>
    <td><div align="center"><?php echo $row['stok_produk']; ?></div></td>
    <td><div align="left"><?php echo substr($row['ket_produk'],0,100); ?></div></td>
    <td width="58"><div class="box-action">
    <a href="home.php?page=edit_produk&&id=<?php echo $row['id_produk']; ?>"><i class="fa fa-edit blue"></i> </a> 
     
      <a onclick="return confirm('Yakin Hapus data ?')" href="produk/hapus_produk.php?id=<?php echo $row['id_produk'];?>"><i class="fa fa-times red"></i></a> 
    </div></td>
    </tr>
   <?php } ?>
</table>
  <p>
  <?php
	echo"<br>Halaman:";
	$tampil2="select*from produk a inner join kategori_produk b on a.id_kategori=b.id_kategori group by a.id_produk";
	$hasil2=mysql_query($tampil2);
	$jmldata=mysql_num_rows($hasil2);
	$jmlhalaman=ceil($jmldata/$batas);
	for($i=1;$i<=$jmlhalaman;$i++)
	if($i!=$halaman)
	{
	echo"<a href=home.php?page=produk&halaman=$i>$i</a>|";
	}
	else
	{
	echo"<b>$i</b>|";
	}
	?>  
</p> <center> Jumlah  produk	:<?php echo $jmldata;?></center>
  <p><center></center></p>
                </p>
			</div>
</div>

