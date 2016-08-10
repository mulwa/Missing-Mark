<?php
			require 'serverSide/connection.php';
			if(isset($_POST['update'])){
							
				echo $regNo = $_POST['regNo'];
			     $unit1 = $_POST['software'];
				  $unit2 = $_POST['web'];
				$unit3 = $_POST['oop'];
			 $unit4 = $_POST['econ'];
				 $unit5 = $_POST['stat'];
				 $unit6 = $_POST['db'];


// `id`, `regNo`, `softwareEng`, `webDevelopment`, `oop`, `economics`, `statistics`, `databaseManagement`SELECT * FROM `exam` WHERE 1

				$update = mysql_query("UPDATE exam SET softwareEng='$unit1', webDevelopment='$unit2', oop='$unit3',economics='$unit4', statistics='$unit5', databaseManagement='$unit6' WHERE regNo='$regNo'");
				if($update){
					$updateComplain= mysql_query(" UPDATE complain SET status='Solved' WHERE regNo='$regNo'");
					if($updateComplain){
						header('location:viewComplains.php');
						
					}else{
						echo "not updated ".mysql_error();
					}


				}else{
					echo "unable to update".mysql_error();
				}


				

			}
			?>