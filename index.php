<!DOCTYPE html>
<html lang="en">
  <head>    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exam System</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">	
	<link href="css/style.css" rel="stylesheet" />
	<script src="js/jquery-2.1.1.min.js"></script>	
	<script type="text/javascript" src="js/inputmask.js"></script>	

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins and ajax data submittion) -->
	   
  </head>
  <body>  	
	<header>		
	<?php require 'includes/navigation.php';?>	
	</header>		
	<div class=" about container">
		<div class="row" id="wrapper">
		<!-- <div class="col-md-4 col-lg-4"></div>	 -->		
			<div class="col-md-8  col-lg-8">							
					<fieldset class="fieldset">					
					<legend class="legend">Login</legend>
						<form id="form" method="POST" action="index.php">
							  <div class="form-group row">
							    <label  class="col-sm-3 form-control-label">Registration No:</label>
							    <div class="col-sm-9">
							      <input type="text" class="form-control id" required="true" name="regNo" placeholder="Registration Number">
							    </div>
							  </div>
							  <div class="form-group row">
							    <label  class="col-sm-3 form-control-label">Password</label>
							    <div class="col-sm-9">
							      <input type="password" class="form-control" required="true" name="password" placeholder="Enter Password">
							    </div>
							  </div>					   
							  
							  <div class="form-group row">
							    <div class="col-sm-offset-3 col-sm-9">
							      <button type="submit" name="login" class="btn btn-danger">Login</button>
							    </div>
							  </div>
						</form>						
					</fieldset>	
					<?php
					include 'admin/serverSide/connection.php';					
					session_start();
					if(isset($_POST['login'])){
						echo "ok";
						$regNo = $_POST['regNo'];
						$password = $_POST['password'];

						$sql= mysql_query("SELECT * FROM student WHERE registrationNumber='$regNo' AND password='$password'");
						if(mysql_fetch_array($sql)>0){

							echo $_SESSION['registration']= $regNo;

							header('location:checkExam.php');

							// echo "You have successfuly loged in";



						}else{
							echo "Wrong Username and Password";
						}

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