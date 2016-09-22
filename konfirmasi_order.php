



<div class="col10 scrumb"><a href="index.php">Home</a> &raquo; Konfirmasi bayar</div>
<div class="batas"></div>

<div class="row">

<div class="col10" style=" border:1px #CCC solid;box-shadow:5px 4px 15px #CCC; padding:20px 10px">
<form action="index.php?page=konfirmasi_bayar" method="post">
<h1 align="center"><i class="fa fa-file-archive-o"></i> Konfirmasi Bayar</h1>

  <?php
  include('config/koneksi.php');
  $id_order=$_GET['id_order'];
  $query=mysql_query("select*from tr_order where id_order='$id_order'");
  while($data=mysql_fetch_array($query)){
	  $total_order=$data['total_order'];
	  $ongkir=$data['harga_ongkir'];
	  $pay=$total_order+$ongkir;

  ?>

<div class="input-group">
<div class="col3">Invoice</div>
<div class="col6"><input name="invoice" type="text" id="invoice" class="text" value="<?php echo $data['id_order'] ;?>" readonly="readonly"/></div>
</div>


<div class="input-group">
<div class="col3">Total</div>
<div class="col6"><input name="total" type="text" id="total" class="text" value="<?php echo $pay ;?>" readonly="readonly"/></div>
</div>


<div class="input-group">
<div class="col3">Nomor Rekening Pelanggan</div>
<div class="col6"><input name="norek" type="text" id="norek" class="text" placeholder="no rek" required /></div>
</div>

<div class="input-group">
<div class="col3">Nama Bank Pelanggan</div>
<div class="col6">
  <label for="tuju"></label>
  <select name="bank" id="bank" class="text" required>
  <option value="bca">BCA</option>
  <option value="mandiri">Mandiri</option>
  <option value="bri">BRI</option>
  </select>
</div>
</div>

<div class="input-group">
<div class="col3">Transfer Atas Nama</div>
<div class="col6"><input name="an" type="text" id="an" class="text" placeholder="atas nama" required /></div>
</div>

<div class="input-group">
<div class="col3">Jumlah Transfer</div>
<div class="col6"><input name="jumlah" type="text" id="jumlah" class="text" placeholder="jumlah transfer" required/></div>
</div>



<div class="input-group">
<div class="col3"> ke Rekening Kami</div>
<div class="col6">
  <label for="tuju"></label>
  <select name="tuju" id="tuju" class="text" required>
  <option value="bca">BCA</option>
  <option value="mandiri">Mandiri</option>
  <option value="bri">BRI</option>
  </select>
</div>
</div>
<br>

<div class="col10"><p align="right"><?php echo ' Total  Rp '.number_format($data['total_order'],0,'.','.') ;?></p></div>
<div class="col10"><p align="right"><?php echo ' Ongkir  Rp '.number_format($ongkir,0,'.','.') ;?></p></div>
<div class="col10"><p align="right"><hr style="width:28%; float:right" /></p></div>
<div class="col10"><h1 align="right"><?php echo ' Total Bayar  Rp '.number_format($pay,0,'.','.') ;?></h1></div>

<div class="input-group">
<div class="col10 text-center"><button class="btn btn-blue "><i class="fa fa-check"></i> Konfirmasi Bayar</button></div>
</div>

<div class="input-group">
<div class="col10 text-center"></div>
</div>
<?php } ?>
</form>

</div>
		</div>
	
