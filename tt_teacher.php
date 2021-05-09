<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
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
		<h2 class="text">Welcome <?php echo $_SESSION["TNAME"]; ?></h2><br><hr><br>

			<div style="display:flex;width:95vw;">
				<?php include"sidebar.php";?><br>
				<div class="content1">

					<br>
					<div class="Output">
						<?php
							if(isset($_POST["open"])){
								$s="insert into attendance(HID,form_status) values({$_POST["hid"]},1)";
								if($db->query($s)){
										$ke="select CLA,SEC from hclass where HID={$_POST["hid"]}" ;
										$ke=$db->query($ke);
										if($ke->num_rows>0){
											$k=$ke->fetch_assoc();
											$n="select ID from student where SCLASS='{$k["CLA"]}' and SSEC='{$k["SEC"]}'";
											$n=$db->query($n);
											if($n->num_rows>0){
												while($r=$n->fetch_assoc()){
													$s="insert into attendance(HID,form_status,ID) values({$_POST["hid"]},1,{$r["ID"]})";
													$db->query($s);
												}
												echo "<div class='success'>Form Opened..</div>";
											}
										}
								}
							}
							elseif(isset($_POST["close"])){
								$s="delete from attendance where HID={$_POST["hid"]} and form_status=1 and ID=0";
								if($db->query($s)){
									echo "<div class='success'>Form Closed..</div>";
								}
							}

																	
								echo "<h3>Classes Schedule</h3><br>";
								$sql="select * from hclass where TID={$_SESSION["TID"]}";
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
											<th>View/Add Classwork</th>
											<th>Take Attendance</th>
											<th>View Attendance</th>

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
											<td><a href='classwork_teach.php?id={$r["HID"]}' class='btnb'>Classwork</a></td>
											<td>
											<form method='post' action='{$_SERVER["PHP_SELF"]}'>
												<input type='hidden' value='{$r["HID"]}' name='hid' readonly>
												<button type='submit' class='btnb'style='display:block;margin:auto;' name='open'>Open</button>
												<button type='submit' class='btnr'style='display:block;margin:auto;' name='close'>Close</button>
											</form></td>	
											<td><a href='view_attendance.php?id={$r["HID"]}' class='btnb'style='text_align:center;display:block;padding:auto;' >View</a></td>		
										</tr>
										";
										
									}
							 	}							
								echo "</table>";
							
						
                            
						?>
					
					</div>
					
					
						
				</div>
				
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>