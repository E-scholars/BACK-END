<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["CMID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
		
	}
	$sql="SELECT * FROM staff WHERE TID={$_GET["id"]}";
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
		<?php include"navbar.php";?><br>
		<h2 class="text">Welcome <?php echo $_SESSION["CMNAME"]; ?></h2><br><hr><br>

			<div id="section">
				<?php include"sidebar.php";?><br><br><br>
				<div class="content1">
					
						<h3 > View Staff Details</h3><br>
						
						<div class="ibox">
							<img src="<?php echo $row["IMG"]; ?>" height="230" width="230">
							
						</div>
						<div class="tsbox">
						<table border="1px">
							<tr><th>Teacher ID </th> <td> <?php echo $row["TID"]; ?></td></tr>
							<tr><th>Name </th> <td> <?php echo $row["TNAME"]; ?></td></tr>
							<tr><th>Qualification </th> <td> <?php echo $row["QUAL"]; ?></td></tr>
							<tr><th>Phone No </th> <td> <?php echo $row["PNO"]; ?></td></tr>
							<tr><th>E - Mail </th> <td> <?php echo $row["MAIL"]; ?></td></tr>
						</table>
                        <br><br>
                        

                    </div>
						
						<?php											
								echo "<h3>Classes Schedule</h3><br>";
								$sql="select * from hclass where TID={$_GET["id"]}";
								$re=$db->query($sql);
									echo '
										<table border="1px">
										<tr>
											<th>S.No</th>
											<th>Class</th>
											<th>Section</th>
											<th>Subject</th>
											<th>Day</th>
											<th>Slot</th>
										</tr>
									
									
									';
                                if($re->num_rows>0)
                                {
									$i=0;
									while($r=$re->fetch_assoc())
									{
										$i++;
										echo "
										<tr>
											<td>{$i}</td>
											<td>{$r["CLA"]}</td>
											<td>{$r["SEC"]}</td>											
											<td>{$r["SUB"]}</td>
											<td>{$r["DAY"]}</td>
											<td>{$r["SLOT"]}</td>
										</tr>
										";
										
									}
								}
															
								echo "</table>";
							
						
						
						?>
					
				</div>	
			</div>
			<?php include"footer.php";?>
			
	</body>
</html>