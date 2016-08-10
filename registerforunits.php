<?php
if(isset($_POST['code'])&& isset($_POST['regNo'])&& isset($_POST['year'])){
	include 'admin/serverSide/connection.php';
	$courseCode = $_POST['code'];
	$regNo =$_POST['regNo'];
	$year = $_POST['year'];
	

	$insert = mysql_query("INSERT INTO class (regNo,courseCode,year)VALUES('$regNo','$courseCode','$year')");
	if($insert){
		echo "You have Registered Successfully";
	}else{
		echo "Not registered please try again later".mysql_error();

	}


}

?>