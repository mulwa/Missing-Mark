<?php
require 'serverSide/connection.php';
if(isset($_GET['regNo'])){
	echo $regNo = $_GET['regNo'];

	// `id`, `regNo`, `complainDescription`, `unit`, `datePosted`, `status`SELECT * FROM `complain` WHERE 1

	$update= mysql_query(" UPDATE complain SET status='Solved' WHERE regNo='$regNo'");
	if($update){
		header('location:viewComplains.php');
	}else{
		echo "not updated ".mysql_error();
	}


}
?>