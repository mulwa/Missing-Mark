<?php
include 'connection.php';
$code = $_POST['courseCode'];
$name = $_POST['courseName'];

if(!empty($code)&& !empty($name)){
	$checkDuplicate = mysql_query("SELECT * FROM course WHERE courseName='$name'");
	 if(mysql_num_rows($checkDuplicate)==0){	 	
	 	$insertQuery= mysql_query("INSERT INTO course (courseCode, courseName) VALUES ('$code','$name')");
	 	if ($insertQuery) {
	 		echo "The New Course has been saved";
	 		
	 	}else{
	 		echo "not inserted".mysql_error();
	 	}
	 }else{
	 	echo " This Course already exists";
	 }

}else{
	echo "Please provide all details";
}
?>