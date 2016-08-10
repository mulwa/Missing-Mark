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
			<form action="registerUnits.php" method="post">			
			<div class="form-group row">
			    <select class="form-control" name="courseCode">
			        <option selected="selected" value="">SELECT YOUR COURSE</option>
	      			<?php
		            require 'admin/serverSide/connection.php';
		            $query = mysql_query("SELECT courseCode,courseName FROM course");
		            while($row=mysql_fetch_array($query)){                         
		               echo "<option value='".$row['courseCode']."'/>".$row['courseName']."</option>";
		            }
		            ?>
		      </select>
			</div>
			<div class="form-group row">
		      <select class="form-control" name="year">
			      	<option value="" selected="true">SELECT YEAR </option>			      	
			      	<option value="4.1">4.1</option>
			      	<option value="4.2">4.2</option>							      	
		      </select>
		    </div>
		    <div class="form-group row">
		    	<button type="submit" name="submit" class="btn btn-danger">CHECK UNITS</button>
		    </div>
		    </form>
			</div>		
			<div class="col-md-9  col-lg-9">
			<?php
			if(isset($_POST['submit'])){				
				$courseCode = $_POST['courseCode'];
				$year = $_POST['year'];				
				if(!empty($courseCode)&& !empty($year)){				
						
				$sql = mysql_query("SELECT * FROM unit WHERE courseCode ='$courseCode' AND cast( year as decimal(5,2))='$year'");
					if(mysql_num_rows($sql)>0){
						echo "<table class='table table-striped table-bordered'>";
						echo "<tr><th>UNIT CODE</th><th>UNIT NAME</th></tr>";
						while ($row=mysql_fetch_array($sql)) {
							echo "<tr><td>";
							echo $row['unitCode'];
							echo "</td><td>";
							echo $row['unitName'];
							echo "</td></tr>";
							
						}
						echo "</table>";					
						
					}else{
						echo "NO units found with the given parameters";
					}

					
						echo "</table>";						
						


					}			

					




				}else{
					echo "Please select Your course and Year of Study";
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