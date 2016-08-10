 <?php
session_start();
if(!isset($_SESSION['registration'])){	
	header('location:index.php');
} else{
	$regNo = $_SESSION['registration'];
} 
 require 'admin/serverSide/connection.php';  
    
 function getUnitName($unitCode){
 	$output='';
 	$sql= mysql_query("SELECT * FROM unit WHERE unitCode='$unitCode'");
 	if(mysql_num_rows($sql)!=0){
 		while ($row=mysql_fetch_array($sql)) {
 			$output=preg_replace('/\s+/', '',$row['unitName']);
 		}

 	}else{
 		$output='Unit not found';
 	}
 	echo $output;
 } 
 function getMarks($registrationNumber){
 	$checkRegNo = mysql_query("SELECT * FROM exam WHERE regNo='$registrationNumber'");
 	$results='';
// `softwareEng`, `webDevelopment`, `oop`, `economics`, `statistics`, `databaseManagement`
 	if(mysql_num_rows($checkRegNo)!=0){
 		echo "<h3>Examination Results for $registrationNumber</h3>";
 		echo "<table class='table table-bordered'>";
 		echo "<tr><th>Unit Name</th><th>Marks</th></tr>";

 		while ($row=mysql_fetch_array($checkRegNo)) {
 			echo "<tr><td>";
 			echo "Software Engeneering";
 			echo "</td><td>";
 			echo $row['softwareEng'];
 			echo "</td></tr><tr><td>";
 			echo "Web Development";
 			echo "</td><td>";
 			echo $row['webDevelopment'];
 			echo "</td></tr><tr><td>";
 			echo "Object Oriented Programming";
 			echo "</td><td>";
 			echo $row['oop'];
 			echo "</td></tr><tr><td>";
 			echo "Economics";
 			echo "</td><td>";
 			echo $row['economics'];
 			echo "</td></tr><tr><td>";
 			echo "Statistics";
 			echo "</td><td>";
 			echo $row['statistics'];
 			echo "</td></tr><tr><td>";
 			echo "Database Management";
 			echo "</td><td>";
 			echo $row['databaseManagement'];
 			echo "</td></tr>";


 		}
 		echo "<tr><td>";
 		?>
 		<form method="post" action="launchComplain.php">
 		<input type="hidden" name="regNo" value="<?php echo $registrationNumber;?>">
 		

 		<button name="complain" class="btn btn-warning">Launch Complain</button>
 		</form>
 		<?php
 		echo "</td></tr>";
 		echo "</table>";


 	}else{
 		echo "<h3>No examination Results found for $registrationNumber</h3>";
 	}
 } 
 ?> 
<!DOCTYPE html>
<html lang="en">
  <head>    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exam System</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">	
	<link href="css/style.css" rel="stylesheet" />
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins and ajax data submittion) -->
	<script src="js/jquery-2.1.1.min.js"></script>	
	<script type="text/javascript" src="js/inputmask.js"></script>	
	   
  </head>
  <body>  	
	<header>		
	<?php require 'includes/navigation.php';?>	
	</header>		
	<div class=" about container">
		<div class="row" id="wrapper">
			<div class="col-md-3  col-lg-3">
			<form action="checkExam.php" method="post">  

		    <div class="form-group row">
		    	<button type="submit" name="submit" id="btn" class="btn btn-danger">Check Exam Results</button>
		    </div>
		    </form>
			</div>		
			<div class="col-md-9  col-lg-9">
			<?php
				if(isset($_POST['submit'])){			
				
				// $regNo = $_POST['regNo'];
				$regNo = $_SESSION['registration'];

				getMarks($regNo);
				
				
					


				
				
				}

			?>
			

							
								
			</div>					
		</div>	<!-- overall row -->
	</div><!-- about overall container -->	
	<footer>
		<?php require 'includes/footer.php';?>
	</footer>		
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
		$(".phone").mask("0799-999-999");
		$(".date").mask("9999/99/99",{placeholder:"yyyy/mm/dd"});
		$(".id").mask("BIT-001-9999-2019");
	</script>	
	
  </body>
</html>