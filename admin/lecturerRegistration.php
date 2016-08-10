<?php require 'session.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OCM</title>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">	
	<link href="../css/style.css" rel="stylesheet" />	
	<!-- jQuery  -->
	<script src="../js/jquery-2.1.1.min.js"></script>	
	<script type="text/javascript">
		$(function(){
			$('form').submit(function(event){
				event.preventDefault();			

				var lectId = document.getElementById("lecId").value;
				var surname = document.getElementById("surname").value;
				var mobile = document.getElementById("mobileNO").value;
				var email = document.getElementById("email").value;
				var password = document.getElementById("password").value;
				var password2 = document.getElementById("password2").value;

				var dataString = 'id='+lectId+ '&surname='+surname+ '&mobile='+mobile+'&email='+email+'&password='+password;

				if(lectId==""){
					alert("please enter Lecturer id");
					return false;
				}
				if(surname==""){
					alert("please ente Lecturer surname");
					return false;
				}
				if(mobile==""){
					alert("please enter Lecturer mobile Number");
					return false;
				}
				if(password==""){
					alert("please enter password");
					return false;
				}
				if(password2==""){
					alert("please Confirm Your password");
					return false;
				}
				if(password != password2){
					alert("password mismatch");
					return false;
				}

				$.ajax({
					type: 'post',
					url: 'serverSide/saveLecturer.php',
					data : dataString,
					success : function(result){
						alert(result);
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
					<legend class="legend">Lecturer Registration</legend>
						<form>
							  <div class="form-group row">
							    <label  class="col-sm-2 form-control-label">Lecturer Id</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" id="lecId" placeholder="Lecturer id">
							    </div>
							  </div>
							  <div class="form-group row">
							    <label  class="col-sm-2 form-control-label">Surname</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" id="surname" placeholder="Surname">
							    </div>
							  </div>
							  <div class="form-group row">
							    <label  class="col-sm-2 form-control-label">Mobile Number</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" id="mobileNO" placeholder="Mobile Number or Telephone">
							    </div>
							  </div>							  
							  <div class="form-group row">
							    <label  class="col-sm-2 form-control-label">Email</label>
							    <div class="col-sm-10">
							      <input type="email" class="form-control" id="email" placeholder="Email Address">
							    </div>
							  </div>
							  <div class="form-group row">
							    <label  class="col-sm-2 form-control-label">Password</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" id="password" placeholder="password">
							    </div>
							  </div>
							  <div class="form-group row">
							    <label  class="col-sm-2 form-control-label">Confirm Password</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" id="password2" placeholder="Confirm your password">
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