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
	<body style="width:100%;">
		<?php include"navbar.php";?><br>
		<h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>

			<div id="section">
			
				<div class="content">
				<h3 >View Admission Requests</h3><br>
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="lbox1">	
						<label>Admission Request ID</label><br>
					<select name="adid" required class="input3">
				
						<?php 
							 $sl="SELECT ADID FROM admission";
							$r=$db->query($sl);
								if($r->num_rows>0)
									{
										echo"<option value=''>Select</option>";
										while($ro=$r->fetch_assoc())
										{
											echo "<option value='{$ro["ADID"]}'>{$ro["ADID"]}</option>";
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
								echo "<h3>Student Details</h3><br>";
								$sql="select * from admission where ADID={$_POST["adid"]}";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
									echo "
										<table border='1px'>
									
										<tr>
											<th>Request ID No.</th>
											<th>Name</th>
											<th>Father Name</th>
											<th>DOB</th>
											<th>Gender</th>
											<th>Phone No.</th>
											<th>E-Mail ID</th>
											<th>Address</th>
                                            <th>Class Applied For</th>
											<th>Attached Documents</th>
                                            <th>Request Accepted/Rejected</th>
										</tr>
									
									
									";
									
									while($r=$re->fetch_assoc())
									{
										echo "
										<tr>
											<td>{$r["ADID"]}</td>
											<td>{$r["NAME"]}</td>
											<td>{$r["FNAME"]}</td>
											<td>{$r["DOB"]}</td>
											<td>{$r["GEN"]}</td>
											<td>{$r["PHO"]}</td>
											<td>{$r["MAIL"]}</td>
											<td>{$r["ADDR"]}</td>
											<td>{$r["SCLASS"]}</td>
											<td><a href='{$r["SDOC"]}'><img src='img/pdf_icon.png' style='display:block;margin:auto;' width=36px height=50px></a></td>
											<td><a href='add_stud.php' class='btnb'style='display:block;margin:auto;text-align:center;'>Accept</a>
                                            <a href='delete_admission_request.php?id={$r["ADID"]}' class='btnr'style='display:block;margin:auto;text-align:center;'>Reject/Delete</a></td>
										
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