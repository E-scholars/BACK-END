<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["ID"]))
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
		<h2 class="text">Welcome <?php echo $_SESSION["NAME"]; ?></h2><br><hr><br>

			<div id="section">
				<?php include"sidebar.php";?><br>
				<div class="content1">

				<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<button type="submit" class="btn" name="view"> View Details</button>
				</form>
					<br>
					<div class="Output">
						<?php
							if(isset($_POST["view"]))
							{
								echo "<h3>Fee Slip</h3><br>";
								$sql="select * from fee where ID={$_SESSION["ID"]}";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
									echo '
										<table border="1px">
										<tr>
											<th>Student ID</th>
											<th>Student Name</th>
											<th>Total Fee</th>
											<th>Paid</th>
											<th>Fine</th>
											<th>Balance</th>
											
										</tr>
									
									
									';
									while($r=$re->fetch_assoc())
									{

										echo "
										<tr>
											<td>{$_SESSION["ID"]}</td>
											<td>{$_SESSION["NAME"]}</td>
											<td>{$r["total_fee"]}</td>
											<td>{$r["paid"]}</td>
											<td>{$r["fine"]}</td>
											<td>{$r["balance"]}</td>	
																										
										</tr>
										";
										
									}
								}
							else
							{
								echo "No record Found";
							}
								echo "</table>";
							}
						?>
					<a href='https://www.onlinesbi.com/'><button class='btn'>Pay Fee</button></a>
					
					</div>
					
					
						
				</div>
				
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>