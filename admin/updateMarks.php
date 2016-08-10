<?php
require 'serverSide/connection.php';
?>
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

		<?php
		
		if(isset($_GET['regNo'])){
			echo $regNo = $_GET['regNo'];
		}

	$sql = mysql_query("SELECT * FROM exam WHERE regNo='$regNo'");

	$row = mysql_fetch_array($sql); 
		$softwareEng = $row['softwareEng'];
		$webDevelopment = $row['webDevelopment'];
		$oop = $row['oop'];
		$economics = $row['economics'];
		$statistics = $row['statistics'];
		$databaseManagement = $row['databaseManagement'];	

		?>		
			<div class="col-md-9  col-lg-9">							
					<fieldset class="fieldset">					
					<legend class="legend">Marks Update Form</legend>
					 <form method="POST" action="updateMarksSql.php">
						 <div class="form-group row">
						    <label  class="col-sm-4 form-control-label">Registration Number</label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control" readonly name="regNo" value="<?php echo $regNo;?>">
						    </div>
						  </div>				 
						
					    <div class="form-group row">
						    <label  class="col-sm-4 form-control-label">Software Engeering</label>
						    <div class="col-sm-4">
						      <input type="number" class="form-control" value="<?php echo $softwareEng;?>" name="software">
						    </div>
						</div>
						<div class="form-group row">
						    <label  class="col-sm-4 form-control-label">Web Development</label>
						    <div class="col-sm-4">
						      <input type="number" class="form-control" value="<?php echo $webDevelopment;?>" name="web">
						    </div>
						</div>
						<div class="form-group row">
						    <label  class="col-sm-4 form-control-label">Object Oriented Programing</label>
						    <div class="col-sm-4">
						      <input type="number" class="form-control" value="<?php echo $oop;?>" name="oop">
						    </div>
						</div>
						<div class="form-group row">
						    <label  class="col-sm-4 form-control-label">Economics</label>
						    <div class="col-sm-4">
						      <input type="number" class="form-control" value="<?php echo $economics;?>" name="econ">
						    </div>
						</div>
						<div class="form-group row">
						    <label  class="col-sm-4 form-control-label">Statistics</label>
						    <div class="col-sm-4">
						      <input type="number" class="form-control"  value="<?php echo $statistics;?>" name="stat">
						    </div>
						</div>
						<div class="form-group row">
						    <label  class="col-sm-4 form-control-label">Database Management</label>
						    <div class="col-sm-4">
						      <input type="number" class="form-control" value="<?php echo $databaseManagement;?>" name="db">
						    </div>
						</div>
						<div class="form-group row">
						    <div class="col-sm-offset-4 col-sm-10">
						      <button type="submit" name="update" class="btn btn-danger">Update</button>
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
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript">
		$(".phone").mask("0799-999-999");
		$(".date").mask("9999/99/99",{placeholder:"yyyy/mm/dd"});
		$(".id").mask("BIT-001-9999-2019");
	</script>
	
  </body>
</html>