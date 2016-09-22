 <style>
 #tabel tr td{
	 border-bottom:1px #CCC solid;
	 border-right:1px #F2F2F2 solid;
	 }
 </style>
 
<?php
error_reporting(0);
    ob_start();
	ob_end_clean();
	include('../../config/koneksi.php');
     $tgl1=$_POST['tgl1'];
     $tgl2=$_POST['tgl2'];
	 $status=$_POST['status'];
		if($status=='all'){
			$status_order='';	
		} else {
			$status_order="AND a.status_order='$status'";	
		}
	
    //include(dirname(__FILE__).'/lap.php');
	?>
   <h3 align=center>Laporan Order</h3>
   <p style="color:#00F; font-size:large">Perode <?php echo ' : '.date('d M Y',strtotime($tgl1)).' s/d '. date('d M Y',strtotime($tgl2));?></p>
<table width="103%" border="" id="tabel">
  <tr style="background-color:#EFEFEF">
    <td width="104" height="39" F">Invoice</td>
    <td width="93">Tgl order</td>
    <td width="180">Nama</td>
    <td width="96">Resi</td>
    <td width="73">Status</td>
    <td width="101">Total Order</td>
  </tr>
  <?php

  $tampil=mysql_query("select*from tr_order a inner join detail_order b on a.id_order=b.id_order 
INNER JOIN pelanggan c on a.id_user=c.email_pelanggan WHERE LEFT(a.tgl_order,10) BETWEEN '$tgl1' AND '$tgl2' $status_order 
group by b.id_order");


  while($row=mysql_fetch_array($tampil))
  {
	  $total=$row['total_order'];
	  $grandtotal+=$row['total_order'];
	  $status=$row['status_order'];
	  if($status=='0'){
		  $status_order='<p>Pending</p>';
	  } else if($status=='1'){
		  $status_order='<p>Proses</p>';
	  } else if($status=='2'){
		$status_order='<p>Selesai</p>';
	  }
  ?>
  <tr>
    <td><?php echo $row['id_order'];?></td>
    <td><?php echo date('d-m-Y',strtotime($row['tgl_order']));?></td>
    <td><?php echo $row['nm_pelanggan'];?></td>
    <td><?php echo $row['no_resi'];?></td>
    <td><?php echo $status_order;?></td>
    <td align="right"><?php echo number_format( $row['total_order'],0,'.','.');?></td>
  </tr>
  <?php } ?>
  <tr>
    <td height="43" colspan="5">TOTAL</td>
    <td align="right"><?php echo number_format($grandtotal,0,'.','.');?></td>
  </tr>
</table>


  <!-- print to PDF --> 
   <?php
    $content = ob_get_clean();
    require_once(dirname(__FILE__).'/html2pdf/html2pdf.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->setTestTdInOnePage(false);
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('report.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>