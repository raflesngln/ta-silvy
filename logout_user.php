<?php
error_reporting(0);
session_start(); //start session
	
unset($_SESSION['em']);
unset($_SESSION['ps']);

header("Location: index.php");	



?>