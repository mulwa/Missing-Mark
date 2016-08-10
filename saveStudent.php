<?php
include 'admin/serverSide/connection.php';
$regNo = $_POST['regNo'];
$surname= $_POST['surname'];
$firstname = $_POST['firstname'];
$courseCode = $_POST['courseCode'];
$mobileNo = $_POST['mobileNo'];
$email = $_POST['email'];
$password =$_POST['password'];

if(!empty($regNo)&& !empty($surname)&& ! empty($firstname) && !empty($courseCode) && !empty($mobileNo) && !empty($email) && !empty($password)){

	$checkregNo = mysql_query("SELECT * FROM student WHERE registrationNumber='$regNo'");
	if(mysql_num_rows($checkregNo)==0){
		$checkMail = mysql_query("SELECT * FROM student WHERE email='$email'");
		if(mysql_num_rows($checkMail)==0){

			$sql = mysql_query("INSERT INTO student (registrationNumber,surname,firstname,courseCode,mobile,email,password) VALUES ('$regNo','$surname','$firstname','$courseCode','$mobileNo','$email','$password')");
			if($sql){
				echo "Student has been Registered successfully";
			}else{
				echo "Student has not been saved".mysql_error();
			}

		}else{
			echo "Email already exists";
		}

	}else{
		echo "This Student has already been Registered";
	}

}else{
	echo "fill all required fields";
}



?>