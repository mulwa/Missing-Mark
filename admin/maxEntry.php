<?php require 'session.php';?>
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

	<script type="text/javascript" src="../js/inputmask.js"></script>
	
    
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
					<legend class="legend">Max Entry Form</legend>
					 <form method="POST" action="maxEntry.php">
						 <div class="form-group row">
						    <label  class="col-sm-4 form-control-label">Registration Number</label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control id" name="regNo" placeholder="Student Registration Number" required="true">
						    </div>
						  </div>				 
						
					    <div class="form-group row">
						    <label  class="col-sm-4 form-control-label">Software Engeering</label>
						    <div class="col-sm-4">
						      <input type="number" class="form-control"  required="true" name="unit1">
						    </div>
						</div>
						<div class="form-group row">
						    <label  class="col-sm-4 form-control-label">Web Development</label>
						    <div class="col-sm-4">
						      <input type="number" class="form-control" id="unitName" required="true" name="unit2">
						    </div>
						</div>
						<div class="form-group row">
						    <label  class="col-sm-4 form-control-label">Object Oriented Programing</label>
						    <div class="col-sm-4">
						      <input type="number" class="form-control" required="true" name="unit3">
						    </div>
						</div>
						<div class="form-group row">
						    <label  class="col-sm-4 form-control-label">Economics</label>
						    <div class="col-sm-4">
						      <input type="number" class="form-control" required="true" name="unit4">
						    </div>
						</div>
						<div class="form-group row">
						    <label  class="col-sm-4 form-control-label">Statistics</label>
						    <div class="col-sm-4">
						      <input type="number" class="form-control" required="true" name="unit5">
						    </div>
						</div>
						<div class="form-group row">
						    <label  class="col-sm-4 form-control-label">Database Management</label>
						    <div class="col-sm-4">
						      <input type="number" class="form-control" required="true" name="unit6">
						    </div>
						</div>
						<div class="form-group row">
						    <div class="col-sm-offset-4 col-sm-10">
						      <button type="submit" name="save" class="btn btn-danger">Save</button>
						    </div>
					  	</div>					    
					    
					    </form>						
					</fieldset>								
			</div>
			<?php
			require 'serverSide/connection.php';
			if(isset($_POST['save'])){
				echo "ok";
				echo $regNo = $_POST['regNo'];

				$unit1 = $_POST['unit1'];
				$unit2 = $_POST['unit2'];
				$unit3 = $_POST['unit3'];
				$unit4 = $_POST['unit4'];
				$unit5 = $_POST['unit5'];
				$unit6 = $_POST['unit6'];

				$checkRegno= mysql_query("SELECT * from exam WHERE regNo='$regNo'");

// `id`, `regNo`, `softwareEng`, `webDevelopment`, `oop`, `economics`, `statistics`, `databaseManagement`
				if(mysql_num_rows($checkRegno)==0){
					$insert= mysql_query("INSERT INTO exam (regNo,softwareEng,webDevelopment,oop,economics,statistics,databaseManagement) VALUES('$regNo','$unit1','$unit2','$unit3','$unit4','$unit5','$unit6') ");
					if($insert){
						echo "MARKS SAVED SUCCESSFULY";
					}else{
						echo "Not Saved".mysql_error();
					}

				}else{
					echo "marks already Awarded";
				}

			}
			?>				
		</div>	<!-- overall row -->
	</div><!-- about overall container -->	
	<footer>
		<?php require 'includes/footer.php';?>
	</footer>	
	
    	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript">
		$(".phone").mask("0799-999-999");
		$(".date").mask("9999/99/99",{placeholder:"yyyy/mm/dd"});
		$(".id").mask("BIT-001-9999-2019");
	</script>
	
  </body>
</html>