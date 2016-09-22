
<style>
#admin-home h1{
	font-size:x-large;
	margin-bottom:20px;
	
}
#admin-home{
margin: 0px auto;
    margin: 8% 5%;
    box-shadow: 2px 14px 9px #CCC;
    padding: 46px 15px;
  
}
</style>

</head>

<body>
<div class="page" id="home">
<div class="col10 scrumb"><a href="index.php">Home</a> &raquo; Daftar User</div>
<div class="batas"></div>

<div class="row">

<div class="col9" id="admin-home">
<form action="index.php?page=cek_daftar" method="post">
<h1 align="center"><i class="fa fa-file-archive-o"></i> Daftar User</h1>



<div class="input-group">
<div class="col3">Nama</div>
<div class="col6"><input name="nama" type="text" id="nama" class="text" required /></div>
</div>


<div class="input-group">
<div class="col3">Email</div>
<div class="col6"><input placeholder="email" value="" autocomplete="off" name="email" type="email" id="email" class="text" /></div>
</div>


<div class="input-group">
<div class="col3">Password</div>
<div class="col6"><input autocomplete="off" name="pas" type="password" id="pas" class="text" value="" required/></div>
</div>



<div class="input-group">
<div class="col3">Phone</div>
<div class="col6"><input name="phone" type="text" id="phone" class="text" /></div>
</div>

<div class="input-group">
<div class="col3">Alamat lengkap</div>
<div class="col6">
  <textarea name="alamat" class="text" id="alamat"></textarea>
</div>
</div>

<div class="input-group">
<div class="col3">Propinsi</div>
<div class="col6">
  <input name="propinsi" type="text" id="propinsi" class="text" />
</div>
</div>

<div class="input-group">
<div class="col3">Kota</div>
<div class="col6">
  <select name="kota" class="text" id="kota" required>
  <option value="">Select</option>
  <?php
  include('config/koneksi.pphp');
  $query=mysql_query("select*from kota");
  while($data=mysql_fetch_array($query)){
  ?>
    <option value="<?php echo $data['id_kota'];?>"><?php echo $data['nm_kota'];?></option>
    <?php } ?>
</select>
</div>
</div>

<div class="input-group">
<div class="col3">kd pos</div>
<div class="col6"><input name="pos" type="text" id="pos" class="text" /></div>
</div>


<div class="input-group">
<div class="col10 text-center"><button class="btn btn-blue "><i class="fa fa-check"></i> Konfirmasi Daftar</button></div>
</div>

<div class="input-group">
<div class="col10 text-center">
Atau Login jika sudah punya akun  <a href="index.php?page=login">Login</a>
</div>
</div>


</div>

</div>
</form>

</div>
		
	</script>
