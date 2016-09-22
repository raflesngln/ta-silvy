<form action="home.php?page=konfirmasi_bayar" method="post" id="konfirm" name="konfirm">
<h1 align="center"><i class="fa fa-refresh"></i> Konfirmasi Order</h1>

  <?php
  include('../config/koneksi.php');
  $id_order=$_GET['id_order'];
  $query=mysql_query("select*from konfirmasi_bayar a inner join tr_order b on a.id_order=b.id_order where a.id_order='$id_order'");
  while($data=mysql_fetch_array($query)){
	  $status_order=$data['status_order'];
	  $total=$data['total_order'];
	  $harga_ongkir=$data['harga_ongkir'];
	  $bayar=$total+$harga_ongkir;
  ?>

<div class="input-group">
<div class="col3">Invoice</div>
<div class="col6"><input name="invoice" type="text" id="invoice" class="text" value="<?php echo $data['id_order'] ;?>" readonly />
  <input type="hidden" name="status_order_lama" id="status_order_lama" value="<?php echo $data['status_order'] ;?>" />
</div>
</div>


<div class="input-group">
<div class="col3">Total belanja</div>
<div class="col6"><input name="total" type="text" id="total" class="text" value="<?php echo $data['total_order'] ;?>" readonly/></div>
</div>

<div class="input-group">
<div class="col3">Jumlah Transfer</div>
<div class="col6"><input name="jumlah" type="text" id="jumlah" class="text" placeholder="jumlah transfer" value="<?php echo number_format($data['jumlah_transfer'],0,'.','.') ;?>" readonly/></div>
</div>
<div class="input-group">
<div class="col3">Nomor Rekening Transfer</div>
<div class="col6"><input name="norek" type="text" id="norek" class="text" placeholder="no rek" value="<?php echo $data['no_rekening'] ;?>" readonly /></div>
</div>

<div class="input-group">
<div class="col3">Transfer Atas Nama</div>
<div class="col6"><input name="an" type="text" id="an" class="text" placeholder="atas nama" value="<?php echo $data['atas_nama'] ;?>" readonly/></div>
</div>

<div class="input-group">
<div class="col3">Nama Bank Transfer</div>
<div class="col6"><input name="an" type="text" id="an" class="text" placeholder="atas nama" value="<?php echo $data['bank_transfer'] ;?>" readonly/></div>
</div>

<div class="input-group">
<div class="col3">Bank Tujuan (Bank Kami )</div>
<div class="col6"><input name="an" type="text" id="an" class="text" placeholder="atas nama" value="<?php echo $data['bank_tujuan'] ;?>" readonly/></div>
</div>

<div class="input-group">
  <div class="col3"> Status</div>
<div class="col6">
  <label for="status"></label>
  <select name="status" id="status" class="text" required>
  <option value="0">Pending</option>
  <option value="1">Menunggu</option>
  <option value="2">Lunas</option>
  </select>
</div>
</div>
<br>

<div class="col10"><h4 align="right"><?php echo ' Total belanja  Rp. '.number_format($total,0,'.','.') ;?></h4></div>

<div class="col10"><h4 align="right"><?php echo ' Ongkir  Rp. '.number_format($harga_ongkir,0,'.','.') ;?></h4></div>

<div class="col10" style="border-top:2px #CCC solid"><h1 align="right"><?php echo ' Total Bayar  Rp. '.number_format($bayar,0,'.','.') ;?></h1></div>

<div class="input-group">
<?php
if($status_order < 2){
?>
<div class="col10 text-center"><button class="btn btn-blue "><i class="fa fa-check"></i> Konfirmasi Bayar</button></div>
<?php } ?>
</div>

<div class="input-group">
<div class="col10 text-center"></div>
</div>
<?php } ?>
</form>

<script>
$(document).ready(function(e) {
    $("#konfirm").submit(function(e) {
		
	var kon=confirm('Yakin update data');
	if(kon !=true){
        alert('Konfirmasi dibatalkan');
		return false;
	}
    });
});

</script>