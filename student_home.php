<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["ID"]))
	{
		echo"<script>window.open('student_login.php?mes=Access Denied...','_self');</script>";
		
	}	
	
	
	$sql="SELECT * FROM student WHERE ID={$_SESSION["ID"]}";
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
		<h2 class="text">Welcome <?php echo $_SESSION["NAME"]; ?></h2><br><hr><br>

	
			<div id="section"style="width:90vw;margin:0 auto;display:flex;">
				<?php include"sidebar.php";?><br>
					
					<div class="rbox1"style="margin:auto;">
						<h3> Profile</h3><br>
						<table border="1px">
							<tr><td colspan="2"><img src="<?php echo $row["SIMG"] ?>" alt="upload Pending"></td></tr>
							<tr><th>Name </th> <td><?php echo $row["NAME"] ?> </td></tr>
							<tr><th>Phone No </th> <td> <?php echo $row["PHO"] ?> </td></tr>
							<tr><th>E - Mail </th> <td> <?php echo $row["MAIL"] ?> </td></tr>
							<tr><th>Address </th> <td> <?php echo $row["ADDR"] ?> </td></tr>
						</table>
					</div>
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>