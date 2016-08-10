<?php
include 'connection.php';
 $unitCode = $_POST['code'];
 $unitname = $_POST['name'];
 $courseName =$_POST['course'];
 $year = $_POST['year'];

 if(!empty($unitCode)&& !empty($unitname) && !empty($courseName) && !empty($year)){
 	$checkIfUnitCode = mysql_query("SELECT * FROM unit WHERE unitCode ='$unitCode'");
 	if(mysql_num_rows($checkIfUnitCode)==0){
 		$checkUnitName = mysql_query("SELECT * FROM unit WHERE unitName ='$unitname'");
 		if (mysql_num_rows($checkUnitName)==0) {

 			$insertQuery = mysql_query("INSERT INTO unit (unitCode, unitName, courseCode, year) VALUES('$unitCode','$unitname','25','$year')");
 			if ($insertQuery) {
 				echo "Unit Details has been Saved";
 			}else{
 				echo "Unit Details Has Not Been Saved".mysql_error();
 			}

 			
 		}else{
 			echo "Unit Name Already Exists";
 		}

 	}else{
 		echo "Unit Code Already Exists";
 	}

 }else{
 	echo "Please enter all the Fields";
 }
?>