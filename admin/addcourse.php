<?php require 'session.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OCM</title>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">	
	<link href="../css/style.css" rel="stylesheet" />	
	<script src="../js/jquery-2.1.1.min.js"></script> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>   
  </head> 
  	<script type="text/javascript"> 
  		 $(function () {
        $('form').on('submit', function (e) {

          e.preventDefault();
        	if(validate()){
        		var code = document.getElementById("courseCode").value;
	  			var name = document.getElementById("courseName").value;

	  			var dataString = 'courseName='+name+ '&courseCode='+code;
        		$.ajax({
	            type: 'post',
	            url: 'serverSide/saveCourse.php',
	            data: dataString,
	            success: function (result) {
	              alert(result);                             
	              
	               document.getElementById('courseName').value='';   
	               document.getElementById('courseCode').value='';               	
	              
	            }
          });


        	}


          

        });

      });


  	  	function validate(){
  	  		var code = document.getElementById("courseCode").value;
	  		var name = document.getElementById("courseName").value;
	  		if(courseCode==""){
	  			alert( "Please provide course Code!" );
	            document.getElementById.courseCode.focus() ;
	            return false;
	  			}
	  			if (name=="") {
	  			alert( "Please provide course Name!" );
	            document.getElementById.courseName.focus() ;
	            return false;
	  			}
	  			return( true );	
  	  	}  		
  	</script>
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
					<legend class="legend">ADD NEW COURSE</legend>
						<form id="form">
							  <div class="form-group row">
							    <label  class="col-sm-2 form-control-label">Course Code</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" id="courseCode" placeholder="Course Code">
							    </div>
							  </div>
							  <div class="form-group row">
							    <label  class="col-sm-2 form-control-label">Course Name</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" id="courseName" placeholder="Course Name">
							    </div>
							  </div>  
							  
							  <div class="form-group row">
							    <div class="col-sm-offset-2 col-sm-10">
							      <button type="submit"  class="btn btn-danger" id="submit">Save</button>
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
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="../js/jquery-2.1.1.min.js"></script>	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>	
	
  </body>
</html>