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
				<?php
				require 'serverSide/connection.php';
				// `id`, `regNo`, `complainDescription`, `unit`, `datePosted`SELECT * FROM `complain` WHERE 1

				$sql= mysql_query("SELECT * FROM complain WHERE status='Pending'");
				if(mysql_num_rows($sql)!=0){
					echo "<table class='table table-bordered'>";
					echo "<tr><th>Registration No</th><th>Complain Description</th><th>Units Affected</th><th>Date Reported</th><th>Action</th></tr>";
					while ($row=mysql_fetch_array($sql)) {
						$regNo = $row['regNo'];
						echo "<tr><td>";
						echo $row['regNo'];
						echo "</td><td>";
						echo $row['complainDescription'];
						echo "</td><td>";
						echo $row['unit'];
						echo "</td><td>";
						echo $row['datePosted'];
						echo "</td><td>";
						echo "<a href='updateMarks.php?regNo=$regNo'><button class='btn btn-danger' id='btnSolve'>Solved</button></a>";

					}
					echo "</table>";

				}else{
					echo "No Pending Complain";
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