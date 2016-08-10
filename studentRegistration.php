<!DOCTYPE html>
<html lang="en">
  <head>    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exam System</title>
    <script src="js/jquery-2.1.1.min.js"></script>	
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">	
	<link href="css/style.css" rel="stylesheet" />
	<script type="text/javascript" src="js/inputmask.js"></script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins and ajax data submittion) -->
	
	<script type="text/javascript">
		$(function(){
			$('form').submit(function(event){
				//preent page relad				
				event.preventDefault();
				var regNo = document.getElementById("regNo").value;				
				var surname = document.getElementById("surname").value;
				var firstname = document.getElementById("firstname").value;
				var courseCode = document.getElementById("courseCode").value;
				var mobileNo = document.getElementById("mobileNo").value;
				var email = document.getElementById("email").value;
				var password = document.getElementById("password").value;
				var password2 = document.getElementById("password2").value;



				var dataString='regNo='+regNo+ '&surname='+surname+ '&firstname='+firstname+ '&courseCode='+courseCode+ '&mobileNo='+mobileNo+ '&email='+email+ '&password='+password;

				//validate inputs
				if(regNo==""){
					alert("Enter Your Registration Number");
					return false;
				}
				if (surname=="") {
					alert("Enter your surname");
					return false;
				}
				if(firstname==""){
					alert("enter your firstname Name");
					return false;
				}
				if(courseCode==""){
					alert("Select Course");
					return false;
				}
				if(email==""){
					alert("enter Email Address");
					return  false;
				}
				if(password==""){
					alert("please enter password");	
					return false;				
				}
				if(password2==""){
					alert("please Confirm your password");
					return false;
				}

				$.ajax({
					type: 'post',
					url: 'saveStudent.php',
					data: dataString,
					success:function(result){
						alert(result);

						document.getElementById("regNo").value='';
						document.getElementById("surname").value='';
						document.getElementById("firstname").value='';
						document.getElementById("courseCode").value='';
						document.getElementById("mobileNo").value='';
				        document.getElementById("email").value='';
				        document.getElementById("password").value='';
				        document.getElementById("password2").value='';



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
			<div class="col-md-2  col-lg-2">

			</div>		
			<div class="col-md-10  col-lg-10">
				<form id="form">
				  <div class="form-group row">
				    <label  class="col-sm-3 form-control-label">Registration Number</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control id" id="regNo" placeholder="Student Registration Number">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label  class="col-sm-3 form-control-label">Surname</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="surname" placeholder="Student Surname">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label  class="col-sm-3 form-control-label">Firstname</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="firstname" placeholder="Student Surname">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label  class="col-sm-3 form-control-label">Course Name</label>
				    <div class="col-sm-9">
				      <select class="form-control" id="courseCode">
					        <option selected="selected" value="">SELECT COURSE</option>
			      			<?php
				            require 'admin/serverSide/connection.php';
				            $query = mysql_query("SELECT courseCode,courseName FROM course");
				            while($row=mysql_fetch_array($query)){                         
				               echo "<option value='".$row['courseCode']."'/>".$row['courseName']."</option>";
				            }
				            ?>
				      </select>
				    </div>
				  </div> 
				  <div class="form-group row">
				    <label  class="col-sm-3 form-control-label">Mobile Number</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control phone" id="mobileNo" placeholder="Student Mobile Number">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label  class="col-sm-3 form-control-label">Email</label>
				    <div class="col-sm-9">
				      <input type="email" class="form-control" id="email" placeholder="Student Email Address">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label  class="col-sm-3 form-control-label">Password</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="password" placeholder="Set Your Password">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label  class="col-sm-3 form-control-label">Confirm Password</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="password2" placeholder="Confirm your Password">
				    </div>
				  </div>
				  
				  <div class="form-group row">
				    <div class="col-sm-offset-3 col-sm-10">
				      <button type="submit" class="btn btn-danger">Save</button>
				    </div>
				  </div>
			</form>							
			</div>					
		</div>	<!-- overall row -->
	</div><!-- about overall container -->	
	<footer>
		<?php require 'includes/footer.php';?>
	</footer>	 
	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript">
		$(".phone").mask("0799-999-999");
		$(".date").mask("9999/99/99",{placeholder:"yyyy/mm/dd"});
		$(".id").mask("BIT-001-9999-2019");
	</script>
    	
	
  </body>
</html>