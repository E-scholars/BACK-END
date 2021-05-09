<?php
	include "database.php";
	session_start();
?>

<!DOCTYPE html>
<html >
	<head>
	<title>E-Scholars</title>
		<link rel = "icon" href ="img/logo.png" type = "image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>
	<body>
		<!-- <div class="navbar" style="text-align:center;height:13%;"><h1 style="color:#000;padding:2%;font-size:500%;background:#810000;">E-Scholars</h1></div> -->
			<?php include"slider.php";?>
			
			
			<!-- <h1 class="heading" style="margin:0;">E-Scholars</h1><br> -->
			
			<?php
				if(isset($_GET["mes"]))
				{
					echo "<div class='error'>{$_GET["mes"]}</div>";
				}
			?>
					
		<div>
			<div class="cont" style="margin:auto;" >
					<h2 style="color:#810000;">Education for a changing world</h2>
					<p style="font-weight:solid;">We are a community of learners. 
						We will do whatever it takes to learn.
						 We are building a strong foundation by believing we can,
						  working our plan, then FEELING the POWER of SUCCESS!
						<br><br>
						E-SCHOLARS uses the research based,
						 academically rigorous Core Knowledge Sequence 
						  to ensure that students meet and exceed the  
						  Core Curriculum. Core Knowledge is a solid, sequential,
						   and specific curriculum, based on the principles of 
						   establishing a national cultural literacy, or broad
						    common knowledge base.
						<br><br>
						Washington Academy uses the research based,
						 academically rigorous Core Knowledge Sequence 
						 (www.coreknowledge.org) to ensure that students
						  meet and exceed the Utah State Core Curriculum.
						   Core Knowledge is a solid, sequential, and 
						   specific curriculum, based on the principles of 
						   establishing a national cultural literacy, or 
						   broad common knowledge base.</p>
					
					
			</div>
		<div class="footer"style="background:#810000;">
			<footer><p style="font-size:200%;margin-top:1%">About Us </p></footer>
			<div style="margin-left:46%;margin-top:1%;margin-bottom:1%;">
				<img src="img/fb1.png" >
				<img src="img/in.png">
				<img src="img/utube.png">
				<img src="img/twitter.png">
			</div>
			
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