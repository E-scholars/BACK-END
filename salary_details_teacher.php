<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
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
		<?php include"navbar.php";?><br><br><br>
		<h2 class="text">Welcome <?php echo $_SESSION["TNAME"]; ?></h2><br><hr><br>

			<div id="section">
				<?php include"sidebar.php";?><br>
				<div class="content1">

					<br>
					
						<?php
								echo "<h3>Salary Info</h3><br>";
								$sql="select * from salary where TID={$_SESSION["TID"]}";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
									echo '
										<table border="1px">
										<tr>
											<th>Teacher ID</th>
											<th>Teacher Name</th>
											<th>Salary</th>
											<th>Month</th>
											<th>Status</th>
										</tr>
									
									
									';
									while($r=$re->fetch_assoc())
									{

										echo "
										<tr>
											<td>{$_SESSION["TID"]}</td>
											<td>{$_SESSION["TNAME"]}</td>
											<td>{$r["salary"]}</td>
											<td>{$r["month"]}</td>
											<td>{$r["credit"]}</td>																				
										
										</tr>
										";
										
									}
								}
							else
							{
								echo "No record Found";
							}
								echo "</table>";
							
						
						

						?>		
						
						
				</div>
				
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>