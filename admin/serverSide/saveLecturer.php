<?php
include 'connection.php';
 $lecId = $_POST['id'];
 $surname = $_POST['surname'];
 $mobile =$_POST['mobile'];
 $email = $_POST['email'];
 $password =$_POST['password'];

 if(!empty($lecId)&& !empty($surname)&& !empty($mobile) && !empty($password)){

 	$checkId = mysql_query("SELECT * FROM lecturer WHERE lecId='$lecId'");
 	if(mysql_num_rows($checkId)==0){
 		$checkSurnameEmail = mysql_query("SELECT * FROM lecturer WHERE lecName ='$surname' AND email='$email'");

 		if(mysql_num_rows($checkSurnameEmail)==0){

 			$insert = mysql_query("INSERT INTO lecturer (lecId, lecName, mobile,email, password)VALUES('$lecId','$surname','$mobile','$email','$password')");

 			if($insert){
 				echo "Details Saved Successfully";
 			}else{
 				echo "Details not saved".mysql_error();
 			}
 			
 		}else{
 			echo "This lecturer is Already in the system";

 		}

 	}else{
 		echo "This lecturer Id Already exists";
 	}

 }else{
 	echo "Please fill the the fields";
 }
?>