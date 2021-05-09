<?php
	include "database.php";
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
	<title>E-Scholars</title>
		<link rel = "icon" href ="img/logo.png" type = "image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>
	<body style="height:100%; margin-bottom:0;">
		<?php include"slider.php";?>
		
		
		<div class="login">
			<h1 class="heading" style="margin:2%;">Apply for New Account</h1>
			<div class="log" style="margin:auto;">
			<?php
				if(isset($_POST["enroll"]))
				{   
                    if(($_POST["role"])=='teacher'){
						echo "<script>window.open('apply_new_teacher.php','_self');</script>";

                    }
                    elseif(($_POST["role"])=='student'){
						echo "<script>window.open('apply_new_student.php','_self');</script>";
                    }	
                }			
			?>
		
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<label >Select Role</label><br>
                    <select name="role" required class="input2">
                                    <option value=''>Select</option>
                                    <option value='teacher'>Teacher</option>
                                    <option value='student'>Student</option>
                    </select>
					
					<button type="submit" class="btn" name="enroll">Next</button>
				</form>
			</div>
		</div>
		<div class="footer"style="margin:0;background:#810000">
			<footer><p>Copyright &copy; E-scholars </p></footer>
		</div>
		<script src="js/jquery.js"></script>
		 <script>
		$(document).ready(function(){
			$(".error").fadeTo(1000, 100).slideUp(1000, function(){
					$(".error").slideUp(1000);
			});
			
			$(".success").fadeTo(1000, 100).slideUp(1000, function(){
					$(".success").slideUp(1000);
			});
		});
	</script>
		
	
		
	</body>
</html>