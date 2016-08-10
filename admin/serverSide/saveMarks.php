<?php
include 'connection.php';
if(isset($_POST['save'])){
	$unitcode = $_POST['unitcode'];
	$coursecode = $_POST['coursecode'];
	$regno = $_POST['regno'];
	$marks = $_POST['marks'];
	$unitname = $_POST['unitname'];
	$year = $_POST['year'];

	if($year=='4.1'){

		$tableName='yearFourOne';

	}else if($year=='4.2'){
		$tableName='yearFourOne';

	}

	echo $tableName;
	
	
	

	// $tableName=$coursecode."ExamMark";
	// $tableName="unit";
	$tableColumn =preg_replace('/\s+/', '', $unitname);	

	
	 
	if(mysql_num_rows(mysql_query("SHOW TABLES LIKE '".$tableName."'"))==1){
		 echo "Table exists";

	} else{
		echo "Table does not exist";
		$creatTable = "CREATE TABLE $tableName (\n"
						. "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,\n"
					    . "regNo VARCHAR(30),\n"
					    . "courseCode VARCHAR(30),\n"					    
					    . "year float\n"					   
					    . ")";
		if(mysql_query($creatTable)){
			echo "table created".mysql_error();

		}else{
			echo "table not created".mysql_error();
			die();
		}

	}

	$result = mysql_query("SHOW COLUMNS FROM $tableName LIKE '$tableColumn'");
	$exists = (mysql_num_rows($result));
	if($exists) {
	  echo "exists";
	}else{
		 $addColumn = mysql_query("ALTER TABLE $tableName ADD $tableColumn int(2) NOT NULL");
		 if($addColumn){
		 	echo "column added";

		 }else{
		 	echo "column not added".mysql_error();
		 	die();
		 }
	}

	for($i=0; $i < count($_POST) - 1; $i++){		
		$checkUserMarks = mysql_query("SELECT regNo FROM $tableName WHERE regNo='$regno[$i]'");
		if(mysql_num_rows($checkUserMarks)==0){
			$sqlInsert = mysql_query("INSERT INTO $tableName(regNo,courseCode,year,$tableColumn)
							 VALUES('$regno[$i]','$coursecode','$year','$marks[$i]')");		

		}else{
			$sqlUpdate = mysql_query("UPDATE $tableName SET $tableColumn='$marks[$i]' WHERE regNo='$regno[$i]'");
		}		
	}
	if($sqlInsert){
		echo "Marks saved";
		die();
	}else{
		echo "Marks not Inserted".mysql_error();
		die();
	}
	if($sqlUpdate){
		echo "updated";
	}else{
		echo "Not update".mysql_error();
		die();
	}

	
	

}

?>