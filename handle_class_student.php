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
					
					
					

						<h3>View Classes</h3><br>
						<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
						<div class="lbox1">	
						
							<label>DAY</label><br>
							<select name="day" required class="input3">
					
								<?php 
									$sl="SELECT distinct(DAY) FROM hclass";
									$r=$db->query($sl);
										if($r->num_rows>0)
											{
												echo"<option value=''>Select</option>";
												while($ro=$r->fetch_assoc())
												{
													echo "<option value='{$ro["DAY"]}'>{$ro["DAY"]}</option>";
												}
											}
								?>
						
							</select>
						<button type="submit" class="btn" name="view"> View Details</button>
						</form>
					

					<table border="1px" >
						<tr>
							<th>S.No</th>
							<th>Day</th>
							<th>Time Slot</th>
							<th>Teacher</th>
							<th>Teacher ID</th>
						 	<th>Subject</th>
							<th>Mark Attendance</th>
						</tr>
						<?php
						if(isset($_POST["present"])){
							$ch="select * from attendance where HID={$_POST["hid"]} and form_status=1 and ID=0";
							$ch=$db->query($ch);
							if($ch->num_rows>0){
								$s="update attendance set present='Present' where HID={$_POST["hid"]} and form_status=1 and ID={$_SESSION["ID"]}";
								if($db->query($s)){
										echo "<div class='success'>Attendance Marked..</div>";
								}
							}
							else{
								echo "<div class='error'>Attendance Form Closed ..</div>";
							}
						}

                        echo "<h3><br>Classes Details</h3><br>";
                        if(isset($_POST["view"]))
                        {   
                            
							$s="select * FROM hclass WHERE SEC IN (SELECT SSEC from student WHERE ID='{$_SESSION["ID"]}') AND CLA IN (SELECT SCLASS FROM student WHERE ID='{$_SESSION["ID"]}' AND DAY='{$_POST["day"]}')";
							$res=$db->query($s);
							if($res->num_rows>0)
							{                                   
								$i=0;
								while($r=$res->fetch_assoc())
								{   
                                    $x="select TNAME from staff where TID={$r["TID"]}";
                                    $p=$db->query($x)->fetch_assoc();
									$i++;
									echo"
									<tr>
										<td>{$i}</td>
										<td>{$r["DAY"]}</td>
										<td>{$r["SLOT"]}</td>
										<td>{$p["TNAME"]}</td>
										<td>{$r["TID"]}</td>
										<td>{$r["SUB"]}</td>
										<td>
											<form method='post' action='{$_SERVER["PHP_SELF"]}'>
												<input type='hidden' value='{$r["HID"]}' name='hid' readonly>
												<button type='submit' class='btnb'style='display:block;margin:auto;' name='present'>Present</button>
											</form></td>	
									</tr>
                                    
									
									";
								}
							}
						
                        }
						
						?>
						
						</table>
					</div>
				</div>
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>