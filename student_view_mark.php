<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["ID"]))
	{
		echo"<script>window.open('student_login.php?mes=Access Denied...','_self');</script>";
		
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
				
					<h3>Mark Details</h3><br>
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="lbox1">	
					
						<label>Enter Term</label><br>
						<select name="term" required class="input3">
				
						<?php 
							 $sl="SELECT distinct(TERM) FROM mark ";
							    $r=$db->query($sl);
								if($r->num_rows>0)
									{
										echo"<option value=''>Select</option>";
										while($ro=$r->fetch_assoc())
										{
											echo "<option value='{$ro["TERM"]}'>{$ro["TERM"]}</option>";
										}
									}
						?>
					
					    </select>
					</div>
				
					<button type="submit" class="btn" name="view"> View Details</button>
				
					</form>
					<br><br>
					<div class="Output">
						<?php
							if(isset($_POST["view"]))
							{
								echo "<h3>Mark Details</h3><br>";
								$sql="select * from mark where (ID='{$_SESSION["ID"]}' AND TERM='{$_POST["term"]}')";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
									echo'
									<table border="1px">
										<tr>
											<th>S.No</th>
											<th>Term</th>
											<th>Subject</th>
											<th>Mark</th>
											<th>Grade</th>
										</tr>
									';
									$i=0;
									while($r=$re->fetch_assoc())
									{
										$i++;
										echo "
											<tr>
												<td>{$i}</td>
												<td>{$r["TERM"]}</td>
												<td>{$r["SUB"]}</td>
												<td>{$r["MARK"]}</td>
												<td>{$r["GRADE"]}</td>
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