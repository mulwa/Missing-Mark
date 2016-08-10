 <?php
session_start();
if(!isset($_SESSION['registration'])){	
	header('location:index.php');
} else{
	$regNo = $_SESSION['registration'];
} 
 require 'admin/serverSide/connection.php';    
 // `id`, `regNo`, `complainDescription`, `unit`, `datePosted`SELECT * FROM `complain` WHERE 1 
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
			</div>		
			<div class="col-md-9  col-lg-9">
				<?php
				$checkregno= mysql_query("SELECT * FROM complain WHERE regNo='$regNo'");

				if(mysql_num_rows($checkregno)>0){
					echo"<table class='table table-bordered table-striped'>";
					echo "<tr><th>Complain Discription</th><th>Units Affected</th><th>Status</th><th>Date launched</th></tr>";

					while ($row=mysql_fetch_array($checkregno)) {
						echo "<tr><td>";
						echo $row['complainDescription'];
						echo "</td><td>";
						echo $row['unit'];
						echo "</td><td>";
						echo $row['status'];
						echo "</td><td>";
						echo $row['datePosted'];
						echo "</td></tr>";


						
					}
					echo"</table>";






				}else{
					echo "You dont have any complain $regNo";
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