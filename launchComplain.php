<?php
if(isset($_POST['complain'])){
  $regNo = $_POST['regNo'];
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
	<script type="text/javascript">
		$(function(){
			$('form').on('submit', function (e) {
				e.preventDefault();
				var regNo = document.getElementById("regNo").value;				
				var complain = document.getElementById("complaindescription").value; 
				var units = document.getElementById("units").value; 

				var dataString = 'regNo='+regNo+'&complain='+complain+'&units='+units;
				 

				$.ajax({
	            type: 'post',
	            url: 'saveComplain.php',
	            data: dataString,
	            success: function (result) {
	              alert(result); 
	              document.getElementById('units').value='';   
	              document.getElementById('complaindescription').value='';                             	
	              
	            }
          });
			});
		});
	</script>
	
	
  </head>
  <body>  	
	<header>		
	<?php require 'includes/topiclessNav.php';?>	
	</header>		
	<div class=" about container">
		<div class="row" id="wrapper">
		<a href="checkExam.php"><button class="btn btn-primary">Back</button></a>
			<div class="col-md-9  col-lg-9">
			<h3>You are Launching complain has <?php echo $regNo;?></h3>
			<form action="launchComplain.php" method="post">
			<div class="form-group row">
				 <input type="text" class="form-control" id="regNo" readonly value="<?php if(isset($regNo)){ echo $regNo;}?>">
			</div>			
			<div class="form-group row">
		      <textarea id="complaindescription" rows="4" cols="100" placeholder="Describe your complain in details "></textarea>
		    </div>
		    <div class="form-group row">
				 <input type="text" class="form-control" id="units" placeholder="Enter the unit Name" >
			</div>

		    <div class="form-group row">
		    	<button type="submit" name="submit" class="btn btn-danger">Submit Complain</button>
		    </div>
		    </form>
			</div>		
			<div class="col-md-3  col-lg-3">

							
								
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