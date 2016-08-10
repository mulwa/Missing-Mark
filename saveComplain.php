<?php
include 'admin/serverSide/connection.php';
$regNo = $_POST['regNo'];
$complain = $_POST['complain'];
$units = $_POST['units'];
$datePosted = date('y-m-d');
// `regNo`, `complainDescription`, `unit`, `datePosted`SELECT * FROM `complain` WHERE 1
$checkComplain = mysql_query("SELECT * FROM complain WHERE  regNo='$regNo' AND status='Pending'");

if(mysql_num_rows($checkComplain)==0){
	$insert=mysql_query("INSERT INTO complain (regNo,complainDescription,unit,datePosted)VALUES('$regNo','$complain','$units','$datePosted')");
	if($insert){
		echo "You have Successfully submited your compain";
		
	}else{
		echo "Complain not saved".mysql_error();
	}

}else{
	echo "YOU HAVE AREADY LAUNCHED COMPAIN";
}

?>