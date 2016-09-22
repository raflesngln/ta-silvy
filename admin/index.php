<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../asset/css/my_style.css" rel="stylesheet" />
<link href="../asset/css/my_css.css" rel="stylesheet" />

<link href="../asset/fontawesome/css/font-awesome.min.css" rel="stylesheet" />

<link rel="stylesheet" href="../asset/css/flexslider.css" type="text/css" media="screen">
<script type="text/javascript" src="../asset/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="../asset/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="../asset/js/my_javascript.js"></script>

<script>
$(window).load(function() {
    $('.flexslider').flexslider({
		animation:"slide"
	});
});

</script>
<style>
.topmenu li a,.topmenu h3,.topmenu i{
	color:#FFF;
}
.topmenu li{
	float:right;
	list-style:none;
	margin-left:20px;
	margin-bottom:4px;
	transition:all 0.5s;
}
.topmenu li a{
	text-decoration:none;
	transition:all 0.5s;
}
.topmenu li:hover,.topmenu li a:hover{
	background-color:transparent;
	color:#999;
}
.header sup{ color:#FFF;}
.col-search{
	top:25px;
}
#txt-cari{
	border:1px #1ed0d0 solid;
	width:30%;
	float:right;
	margin-right:-15px;
	transition:ease-in 0.2s;
}
#admin-home h1{
	font-size:x-large;
	margin-bottom:20px;
	
}
#admin-home{
margin: 0px auto;
    margin: 8% 25%;
    box-shadow: 2px 14px 29px #CCC;
    padding: 46px 15px;
    background: #f3f3f3;
}
</style>

</head>

<body>
<?php
include('../config/koneksi.php');

$usr=isset($_POST['usr'])?$_POST['usr']:'';	
$pas=isset($_POST['pas'])?$_POST['pas']:'';	

$pwd=md5($pas);

if($pas !='' || $usr !=''){
$query="select*from admin where username='$usr' AND password='$pwd'";
$get=mysql_query($query);
while($row=mysql_fetch_array($get)){
	$nm_admin=$row['nm_admin'];
	$usr_admin=$row['username'];
	$ps_admin=$row['password'];
}

if($usr_admin==$usr){

$_SESSION['usr_admin']=$usr_admin;
$_SESSION['nm_admin']=$nm_admin;

$pesan='
<p class="bg-succes"><i class="fa fa-check fa-2x"></i> Anda berhasil login. </p>
 
 <script>
 window.location.href = "home.php";
 </script>
';
 
?>



<?php
}
else
{
$pesan='
<p class="bg-error"><i class="fa fa-times fa-2x"></i>  Username dan password tidak cocok. Mohon login kembali </p>
';

	}

}

?>

<div class="page" id="home">
<div class="row">

<div class="col4" id="admin-home">
<form action="index.php" method="post">
<h1 align="center"><i class="fa fa-user"></i> Login Admin</h1>
<div class="input-group">
<div class="col3">Username</div>
<div class="col6"><input name="usr" type="text" id="usr" class="text" /></div>
</div>


<div class="input-group">
<div class="col3">Password</div>
<div class="col6"><input name="pas" type="password" id="pas" class="text" /></div>
</div>

<div class="input-group">
<div class="col9 text-center"><button class="btn btn-ungu"><i class="fa fa-key"></i>  Login Sekarang</button></div>
</div>

<div class="input-group">
<div class="col10"><?php echo isset($pesan)?$pesan:'';?></div>
</div>


</form>

</div>
		
	
</body>
</html>