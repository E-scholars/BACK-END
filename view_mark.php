<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";
		
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
				
					<h3>Mark Details</h3><br>
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="lbox1">	
					
						<label>Enter Student ID</label><br>
						<input type="text" class="input3" name="id"><br><br>
					</div>
				
					<button type="submit" class="btn" name="view"> View Details</button>
				
					</form>
					<br><br>
					<div class="Output">
					<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";	
						}
					
					?>
						<?php
							if(isset($_POST["view"]))
							{
								echo "<h3>Mark Details</h3><br>";
								$sql="select * from mark where ID='{$_POST["id"]}'";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
									echo'
									<table border="1px">
										<tr>
											<th>S.No</th>
											<th>ID</th>
											<th>Class</th>
											<th>Term</th>
											<th>Subject</th>
											<th>Mark</th>
											<th>Grade</th>
											<th>Delete</th>
										</tr>
									';
									$i=0;
									while($r=$re->fetch_assoc())
									{
										$i++;
										echo "
											<tr>
												<td>{$i}</td>
												<td>{$r["ID"]}</td>
												<td>{$r["CLASS"]}</td>
												<td>{$r["TERM"]}</td>
												<td>{$r["SUB"]}</td>
												<td>{$r["MARK"]}</td>
												<td style='text-align:center;'>{$r["GRADE"]}</td>
												<td><a href='mark_delete.php?id={$r["MID"]}'class='btnr'>Delete</a></td>

											</tr>
										
										
										
										
										";
									}
								}
								else
								{
									echo "No Record Found";
								}
								echo "</table>";
							}
						
						
						?>
					
					
					</div>
				</div>
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>