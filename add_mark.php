<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
		
	}	
	
	
	$sql="SELECT * FROM staff WHERE TID={$_SESSION["TID"]}";
		$res=$db->query($sql);

		if($res->num_rows>0)
		{
			$row=$res->fetch_assoc();
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
				
					<h3>Add Marks</h3><br>
					
					 <?php
						if(isset($_GET["err"]))
						{
							echo "<div class='error'>{$_GET["err"]}</div>";
						}
					?>
					<form  method="get" action="mark.php">
					<div class="lbox1">	
					
						<label>Enter Student ID</label><br>
						<input type="text" class="input3" name="id"><br><br>
					</select>
					
					</div>
			
					<button type="submit" class="btn" name="view"> View Details</button>
				
					</form>
			
				</div>
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>