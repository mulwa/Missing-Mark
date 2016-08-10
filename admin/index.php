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
					<legend class="legend">Login</legend>
						<form id="form" method="POST" action="index.php">
							  <div class="form-group row">
							    <label  class="col-sm-2 form-control-label">Lecturer Id</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" required="true" name="lecId" placeholder="Lecturer Id">
							    </div>
							  </div>
							  <div class="form-group row">
							    <label  class="col-sm-2 form-control-label">Password</label>
							    <div class="col-sm-10">
							      <input type="password" class="form-control" required="true" name="password" placeholder="Enter Password">
							    </div>
							  </div>					   
							  
							  <div class="form-group row">
							    <div class="col-sm-offset-2 col-sm-10">
							      <button type="submit" name="login" class="btn btn-danger">Login</button>
							    </div>
							  </div>
						</form>						
					</fieldset>	
					<?php
					require 'serverSide/connection.php';
					session_start();
					if(isset($_POST['login'])){
						echo "ok";
						$lecId = $_POST['lecId'];
						$password = $_POST['password'];

						$sql= mysql_query("SELECT * FROM lecturer WHERE lecId='$lecId' AND password='$password'");
						if(mysql_fetch_array($sql)>0){

							$_SESSION['lecId']= $lecId;

							echo "You have successfuly loged in";



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
    <script src="../js/bootstrap.min.js"></script>	
	
  </body>
</html>