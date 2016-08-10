<?php
include 'admin/serverSide/connection.php';
 $code = $_POST['code'];
 $year = $_POST['year'];

 // `unitCode`, `unitName`, `courseCode`, `year`

 $output ='';
  $sql=mysql_query("SELECT * FROM unit WHERE courseCode='$code' AND cast(year as decimal(3,2))='$year'");
  
  if(mysql_num_rows($sql)!=0){
  	$output='<option value="">Select Unit</option>';
  	while ($row = mysql_fetch_array($sql)) {
  		 $output .= '<option value="'.$row["unitCode"].'">'.$row["unitName"].'</option>';
  	}

  }else{
  	$output = "No units ";
  	
  }
   echo $output; 


?>