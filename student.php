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
				<h3 >View Student Details</h3><br>
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="lbox1">	
						<label>Class</label><br>
					<select name="cla" required class="input3">
				
						<?php 
							 $sl="SELECT DISTINCT(SCLASS) FROM student";
							$r=$db->query($sl);
								if($r->num_rows>0)
									{
										echo"<option value=''>Select</option>";
										while($ro=$r->fetch_assoc())
										{
											echo "<option value='{$ro["SCLASS"]}'>{$ro["SCLASS"]}</option>";
										}
									}
						?>
					
					</select>
					<br><br>
						
				</div>
				<div class="rbox">
					<label>Section</label><br>
						<select name="sec" required class="input3">
				
						<?php 
							 $sql="SELECT DISTINCT(SSEC) FROM student";
							$re=$db->query($sql);
								if($re->num_rows>0)
									{
										echo"<option value=''>Select</option>";
										while($r=$re->fetch_assoc())
										{
											echo "<option value='{$r["SSEC"]}'>{$r["SSEC"]}</option>";
										}
									}
			 			?>
					
					</select><br><br>
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
								$sql="select * from student where SCLASS='{$_POST["cla"]}' and SSEC='{$_POST["sec"]}'";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
									echo "
										<table border='1px'>
										
										<tr>
											<th colspan='6'>CLASS</th>
											<td colspan='6'>{$_POST["cla"]}</td>
											
										<tr>
										<tr>
										<th colspan='6'>SECTION</th>
										<td colspan='6'>{$_POST["sec"]}</td>
										</tr>

									
										<tr>
											<th>S.No</th>
											<th>Student ID</th>
											<th>Name</th>
											<th>Father Name</th>
											<th>DOB</th>
											<th>Gender</th>
											<th>Phone</th>
											<th>Mail</th>
											<th>Address</th>
											<th>Image</th>
											<th>View Marks</th>
											<th>Delete</th>
										</tr>
									
									
									";
									$i=0;
									while($r=$re->fetch_assoc())
									{
										$i++;
										echo "
										<tr>
											<td>{$i}</td>
											<td>{$r["ID"]}</td>
											<td>{$r["NAME"]}</td>
											<td>{$r["FNAME"]}</td>
											<td>{$r["DOB"]}</td>
											<td>{$r["GEN"]}</td>
											<td>{$r["PHO"]}</td>
											<td>{$r["MAIL"]}</td>
											<td>{$r["ADDR"]}</td>
											<td><img src='{$r["SIMG"]}' height='70' width='70'></td>
											<td><a href='view_mark_cm.php?id={$r["ID"]}' class='btnb'>View</a></td>
											<td><a href='stud_delete.php?id={$r["ID"]}' class='btnr'>Delete</a></td>
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