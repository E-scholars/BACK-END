<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["CMID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied..','_self');</script>";
		
	}		
?>

<!DOCTYPE html>
<html>
	<head>
	<title>E-Scholars</title>
		<link rel = "icon" href ="img/logo.png" type = "image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>
	<body>
	
		<?php include"navbar.php";?><br>
		<h2 class="text">Welcome <?php echo $_SESSION["CMNAME"]; ?></h2><br><hr><br>
		
		
			
			<div style="width:90vw;margin:0 auto;display:flex;">
			
				<?php include"sidebar.php";?><br>
				
				<div class="content">
						<h3 > School Information</h3><br>
					<p class="para">
						School Management System is a is a complete school management software designed to automate a school's diverse operations from classes, exams to school events calendar. 
					</p>
					
					<p class="para">
						This school software has a powerful online community to bring parents, teachers and students on a common interactive platform. It is a paperless office automation solution for today's modern schools. The School Management System provides the facility to carry out all day to day activities of the school.
					</p>
				</div>
				
			</div>
	
		<?php include"footer.php";?>
	</body>
</html>