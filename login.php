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
<div class="page" id="home">
<div class="col10 scrumb"><a href="index.php">Home</a> &raquo; Login User</div>
<div class="batas"></div>

<div class="row">

<div class="col4" id="admin-home">
<form action="index.php?page=cek_login" method="post">
<h1 align="center"><i class="fa fa-user"></i> Login User</h1>
<div class="input-group">
<div class="col3">Email</div>
<div class="col6"><input name="em" type="text" id="em" class="text" /></div>
</div>


<div class="input-group">
<div class="col3">Password</div>
<div class="col6"><input name="pas" type="password" id="pas" class="text" /></div>
</div>

<div class="input-group text-center">
<div class="col10 text-center"><button class="btn btn-blue btn-block"><i class="fa fa-key"></i>  Login</button></div>
</div>

<div class="input-group">
<div class="col10 text-center">
<a href="index.php?page=daftar"><button type="button" class="btn btn-lime btn-block"><i class="fa fa-key"></i>  Daftar</button>
</a>
</div>
</div>


</div>

</div>
</form>

</div>
		
	</script>
</body>
</html>