<?php
error_reporting(0);
session_start(); //start session
	
unset($_SESSION["usr_admin"]);
unset($_SESSION["nm_admin"]);

header("Location: index.php");	



?>