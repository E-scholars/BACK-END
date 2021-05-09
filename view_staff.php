<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
		
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
			<h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>

				
				<div id="section">
					<?php include"sidebar.php";?><br><br><br>
					
					
					<div class="content1">
					
						<h3 > View Staff Details</h3><br>
						<form id="frm" autocomplete="off">
							<input type="text" id="txt" class="input" placeholder="Enter Teacher's Name">
						</form>
						<br>
						<div id="box"></div>
						
					</div>	
				</div>
				
				
			<?php include"footer.php";?>
			
			<script>
				$(document).ready(function(){
					$("#txt").keyup(function(){
						var txt=$("#txt").val();
						if(txt!="")
						{
							$.post("search.php",{s:txt},function(data){
								$("#box").html(data);
							});
						}
						
					});
					
					
					
				});
			</script>
	</body>
</html>