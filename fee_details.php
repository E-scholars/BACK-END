<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["FID"]))
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
		<h2 class="text">Welcome <?php echo $_SESSION["FNAME"]; ?></h2><br><hr><br>

			<div id="section" >
				<?php include"sidebar.php";?><br>
				<div class="content1">

				<h3 >View Student Details</h3><br>
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="lbox1">	
						<label>Class</label><br>
					<select name="cla" required class="input3">
						<option value="">Select</option>
						<option value="I">I</option>
						<option value="II">II</option>
						<option value="III">III</option>
						<option value="IV">IV</option>
						<option value="V">V</option>
						<option value="VI">VI</option>
						<option value="VII">VII</option>
						<option value="VIII">VIII</option>
						<option value="IX">IX</option>
						<option value="X">X</option>
					</select><br><br>
						
				</div>
				<div class="rbox">
					<label>Section</label><br>
						<select name="sec" required class="input3">
				
						<option value="">Select</option>
						<option value="-">-</option>
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="C">C</option>
					
					</select><br><br>
				</div>
					<button type="submit" class="btn" name="view"> View Details</button>
				
						
					</form>
					<br>
				
					<div class="Output" >
						<?php
							if(isset($_POST["view"]))
							{
								echo "<h3>Student Details</h3><br>";
								$sql="select * from student where SCLASS='{$_POST["cla"]}' and SSEC='{$_POST["sec"]}'";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
									echo '
										<table border="1px">
										<tr>
											<th>S.No</th>
											<th>Student ID</th>
											<th>Name</th>
									
											<th>Phone</th>
											<th>Mail</th>
											<th>Total Fee</th>
											<th>Paid</th>
											<th>Fine</th>
											<th>Balance</th>
										</tr>
									
									
									';
									$i=0;
									while($r=$re->fetch_assoc())
									{
										$f="select * from fee where ID={$r["ID"]}";
										$p=$db->query($f)->fetch_assoc();
										$i++;
										echo "
										<tr>
											<td>{$i}</td>
											<td>{$r["ID"]}</td>
											<td>{$r["NAME"]}</td>
											<td>{$r["PHO"]}</td>
											<td>{$r["MAIL"]}</td>
											<td>{$p["total_fee"]}</td>
											<td>{$p["paid"]}</td>
											<td>{$p["fine"]}</td>
											<td>{$p["balance"]}</td>	

																				
										
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
					
					</div>
					
					<div class="content1">
					
						<h3 > Update Fee Info</h3><br>
						
					<?php
						if(isset($_POST["submit"]))
						{
							$sq="update fee set total_fee={$_POST["totalfee"]},paid={$_POST["paid"]},fine={$_POST["fine"]} where ID={$_POST["studentid"]}";
							if($db->query($sq))
							{	
								$b="update fee set balance={$_POST["totalfee"]}-{$_POST["paid"]}+{$_POST["fine"]} where ID={$_POST["studentid"]}";
								$db->query($b);

								echo "<div class='success'>Insert Success..</div>";
							}
							else
							{
								echo "<div class='error'>Insert Failed..</div>";
							}
							
						}
						
					?>
					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
						<label>Student ID</label><br>
					     <input type="number" name="studentid" required class="input">
					     <br><br>
					     <label>Total Fee</label><br>
					     <input type="number" name="totalfee" required class="input">
					     <br><br>
					     <label>Paid Amount</label><br>
					     <input type="number" name="paid" required class="input">
					     <br><br>
					     <label>Fine</label><br>
					     <input type="number" name="fine" required class="input">
					     <br><br>
					     <button type="submit" class="btn" name="submit">Update Fee Details</button>
					</form>
					<br><br>
						
				
				</div>
						
				</div>
				
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>