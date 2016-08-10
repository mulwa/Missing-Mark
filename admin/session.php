<?php
session_start();
if(!isset($_SESSION['lecId'])){	
	header('location:index.php');
}
?>