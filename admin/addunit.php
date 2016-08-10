<!DOCTYPE html>
<html lang="en">
  <head>    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exam System</title>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">	
	<link href="../css/style.css" rel="stylesheet" />	

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins and ajax data submittion) -->
	<script src="../js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$('form').submit(function(event){
				event.preventDefault();				
				var unitCode = document.getElementById("unitCode").value;
				var unitName = document.getElementById("unitName").value;
				var courseName = document.getElementById("courseName").value;
				var year = document.getElementById("year").value;

				var dataString='code='+unitCode+ '&name='+unitName+ '&course='+courseName+ '&year='+year;

				if(unitCode==""){
					alert("please enter unit Code");
					return false;
				}
				if(unitName==""){
					alert("please enter Unit Name");
					return false;

				}
				if(courseName==""){
					alert("please enter the course Name");
					return false;
				}
				if(year==""){
					alert("please enter Year of Study");
					return false;
				}
					$.ajax({
			            type: 'post',
			            url: 'serverSide/saveUnit.php',
			            data: dataString,
			            success: function (result) {
			              alert(result);			              
			              	document.getElementById('unitName').value='';   
	              			document.getElementById('unitCode').value='';
	              			document.getElementById('courseName').value='';   
	               			document.getElementById('year').value='';  

			              
			            }
		           });

			});
		});
	</script>
    
  </head>
  <body>  	
	<header>		
	<?php require 'includes/navigation.php';?>	
	</header>		
	<div class=" about container">
		<div class="row" id="wrapper">
		<div class="col-md-3  col-lg-3">
			<?php require 'includes/sidemenu.php';?>
		</div>		
			<div class="col-md-9  col-lg-9">							
					<fieldset class="fieldset">					
					<legend class="legend">ADD NEW UNIT</legend>
						<form id="form">
							  <div class="form-group row">
							    <label  class="col-sm-2 form-control-label">Unit Code</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" id="unitCode" placeholder="Unit Code">
							    </div>
							  </div>
							  <div class="form-group row">
							    <label  class="col-sm-2 form-control-label">Unit Name</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" id="unitName" placeholder="Unit Name">
							    </div>
							  </div>
							  <div class="form-group row">
							    <label  class="col-sm-2 form-control-label">Course Name</label>
							    <div class="col-sm-10">
							      <select class="form-control" id="courseName">
							        <option selected="selected" value="">SELECT COURSE</option>
					      			<?php
						            require 'serverSide/connection.php';
						            $query = mysql_query("SELECT courseCode,courseName FROM course");
						            while($row=mysql_fetch_array($query)){                         
						               echo "<option value='".$row['courseCode']."'/>".$row['courseName']."</option>";
						            }
						            ?>
						      	  </select>
							    </div>
							  </div> 
							  <div class="form-group row">
							    <label  class="col-sm-2 form-control-label">Year</label>
							    <div class="col-sm-10">
							      <select class="form-control" id="year">
							      <option value="" selected="true">SELECT YEAR </option>	      	
							      	<option>4.1</option>
							      	<option>4.2</option>							      	
							      </select>
							    </div>
							  </div> 
							  
							  <div class="form-group row">
							    <div class="col-sm-offset-2 col-sm-10">
							      <button type="submit" class="btn btn-danger">Save</button>
							    </div>
							  </div>
						</form>
						
					</fieldset>			
			</div>				
		</div>	<!-- overall row -->
	</div><!-- about overall container -->	
	<footer>
		<?php require 'includes/footer.php';?>
	</footer>	
	
    	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>	
	
  </body>
</html>