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
			
				<div class="content">
				<h3 >View New Teachers Account Requests</h3><br>
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="lbox1">	
						<label>Request ID</label><br>
					<select name="nsid" required class="input3">
				
						<?php 
							 $sl="SELECT NSID FROM new_staff";
							$r=$db->query($sl);
								if($r->num_rows>0)
									{
										echo"<option value=''>Select</option>";
										while($ro=$r->fetch_assoc())
										{
											echo "<option value='{$ro["NSID"]}'>{$ro["NSID"]}</option>";
										}
									}
						?>
					
					</select>
					<br><br>
						
				</div>
					<button type="submit" class="btn" name="view"> View Details</button>
				
                <div class="content">
                    <?php
                        if(isset($_GET["mes"]))
                        {
                            echo"<div class='error'>{$_GET["mes"]}</div>";	
                        }
                    ?>
                </div>
					</form>
					<br>
					<div class="Output">
						<?php
							if(isset($_POST["view"]))
							{
								echo "<h3>Teacher Details</h3><br>";
								$sql="select * from new_staff where NSID={$_POST["nsid"]}";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
									echo "
										<table border='1px'>
									
										<tr>
											<th>Request ID No.</th>
											<th>Teacher Name</th>
											<th>Qualification</th>
											<th>Phone No.</th>
											<th>E-Mail ID</th>
											<th>Address</th>
											<th>Image</th>
                                            <th> Add Request/ Already Done</th>
										</tr>
									
									
									";
									
									while($r=$re->fetch_assoc())
									{
										echo "
										<tr>
											<td>{$r["NSID"]}</td>
											<td>{$r["TNAME"]}</td>
											<td>{$r["QUAL"]}</td>
											<td>{$r["PNO"]}</td>
											<td>{$r["MAIL"]}</td>
											<td>{$r["PADDR"]}</td>
											<td><img src='{$r["IMG"]}' height='70' width='70'></td>
											<td><a href='add_staff.php' class='btnb'style='display:block;margin:auto;text-align:center;'>Add</a>
                                            <a href='delete_new_staff_request.php?id={$r["NSID"]}' class='btnr'style='display:block;margin:auto;text-align:center;'>Delete</a></td>
										
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
				</div>
				
				
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>