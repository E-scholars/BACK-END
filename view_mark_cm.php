<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["CMID"]) && !isset($_SESSION["AID"]) )
	{
		echo"<script>window.open('class_management_login.php?mes=Access Denied...','_self');</script>";
		
	}
    // $sql="select * FROM mark WHERE ID={$_GET["id"]}";
	// 	$res=$db->query($sql);

	// 	if($res->num_rows>0)
	// 	{
	// 		$row=$res->fetch_assoc();
	// 	}
		
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
		<h3 class="text">Welcome <?php if(isset($_SESSION["CMID"])){echo $_SESSION["CMNAME"];}else{echo $_SESSION["ANAME"];} ?></h3><br><hr><br>
	
			<div id="section">
				<?php include"sidebar.php";?><br>
				
				<div class="content">
				
					<h3>Student Report</h3><br>
					<form  method="get" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="lbox1">	
					
						<label>Student ID</label><br>
                        <input type="number" style="background:#b1b1b1;" value="<?php echo $_GET["id"];?>" class="input3" name="id" readonly><br><br>
					</div>
				
					</form>
					
					<div class="content">
					<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";	
						}
					
					?>
						<?php
							
								echo "<h3>Report</h3><br>";
								$sql="select * from mark where ID='{$_GET["id"]}'";
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
											<th>Present/ Total</th>
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
												<td>{$r["ID"]}</td>
												<td>{$r["CLASS"]}</td>
												<td>{$r["TERM"]}</td>
												<td>{$r["SUB"]}</td>
												<td>{$r["MARK"]}</td>
											";
												$t="select present from attendance where HID IN (select HID from hclass where CLA='{$r["CLASS"]}' and SUB='{$r["SUB"]}' and SEC IN (select SSEC from student where ID={$r["ID"]})) and ID={$r["ID"]}";
												$t=$db->query($t);
												$p="select present from attendance where HID IN (select HID from hclass where CLA='{$r["CLASS"]}' and SUB='{$r["SUB"]}' and SEC IN (select SSEC from student where ID={$r["ID"]})) and ID={$r["ID"]} and present='Present'";
												$p=$db->query($p);
												if($t->num_rows>0)
												{	
													
													$pr=$p->num_rows;
													$to=$t->num_rows;
												
													echo"
													<td>{$pr}/{$to}</td>";
                                                }
												else{
													echo"
													<td></td>";
												}
												echo"
                                                <td style='text-align:center;'>{$r["GRADE"]}</td>
                                                
											</tr>							
										
										";
									}
								}
								else
								{
									echo "No Record Found<br><br>";
								}
								echo "</table>";
                                if(isset($_SESSION["CMID"]))
                                {
                                    echo "
                                    <a href='grade_update.php?id={$_GET["id"]}'><button class='btn'>Add/Update Grades</button></a>
                                    
                                    ";
                                }
						?>
					
					
					</div>
				</div>
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>