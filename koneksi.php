<?php
$db_host            = "localhost"; //MySql hostname
$db_username        = "root"; //Mysql username
$db_password        = ""; //MySql database password
$db_name            = "kerajinan_ta"; //MySql nama database


$konek=mysql_connect($db_host,$db_username,$db_password) or die("Koneksi Gagal !" . mysql_error());

$db=mysql_select_db($db_name);





?>