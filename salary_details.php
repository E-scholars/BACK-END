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

			<div id="section">
				<?php include"sidebar.php";?><br>
				<div class="content1">

				<h3 >View Teacher Details</h3><br>
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="lbox1">	
						<label>TID</label><br>
					<select name="tid" required class="input3">
				
						<?php 
							 $sl="SELECT TID FROM staff";
							$r=$db->query($sl);
								if($r->num_rows>0)
									{
										echo"<option value=''>Select</option>";
										while($ro=$r->fetch_assoc())
										{
											echo "<option value='{$ro["TID"]}'>{$ro["TID"]}</option>";
										}
									}
						?>
					
					</select>
					<br><br>
						
				</div>

					<button type="submit" class="btn" name="view"> View Details</button>
				
						
					</form>
					<br>
					<div class="Output">
						<?php
							if(isset($_POST["view"]))
							{
								echo "<h3>Teacher Details</h3><br>";
								$sql="select * from staff where TID={$_POST["tid"]}";
								$r=$db->query($sql)->fetch_assoc();

									echo '
										<table border="1px">
										<tr>
											<th>S.No</th>
                                            <th>Teacher ID</th>
											<th>Name</th>
											<th>Phone</th>
											<th>Mail</th>
											<th>Salary</th>
											<th>Month</th>
											<th>Credited</th>
										</tr>
									
									
									';
									
									$f="select * from salary where TID={$r["TID"]}";
									$t=$db->query($f);
									if($t->num_rows>0)
									{	
										$i=0;
										while($p=$t->fetch_assoc())
										{
											$i++;
											echo "
											<tr>
												<td>{$i}</td>
												<td>{$r["TID"]}</td>
												<td>{$r["TNAME"]}</td>
												<td>{$r["PNO"]}</td>
												<td>{$r["MAIL"]}</td>
												<td>{$p["salary"]}</td>
												<td>{$p["month"]}</td>
												<td>{$p["credit"]}</td>																			
											
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
					
						<h3 > Update Salary Info</h3><br>
						
					<?php
						if(isset($_POST["update"]))
						{
							$sq="update salary set salary={$_POST["salary"]},credit='{$_POST["credited"]}' where TID={$_POST["teacherid"]} and month='{$_POST["month"]}'";
							if($db->query($sq))
							{	
								echo "<div class='success'>Update Success..</div>";
							}
							else
							{
								echo "<div class='error'>Update Failed..</div>";
							}
						}
						elseif(isset($_POST["add"]))
						{
							$sq="insert into salary(TID,salary,month,credit) values({$_POST["teacherid"]},{$_POST["salary"]},'{$_POST["month"]}','{$_POST["credited"]}')";
							if($db->query($sq))
							{	
								echo "<div class='success'>Insert Success..</div>";
							}
							else
							{
								echo "<div class='error'>Insert Failed..</div>";
							}
							
						}
						
					?>
					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<label>Teacher ID</label><br>
					<?php
					if(isset($_POST["view"])){
						echo "<input type='number' class='input' name='teacherid' style='background:#b1b1b1;' value={$_POST["tid"]} readonly >";
					}
					else{ 
						echo '<input type="number" name="teacherid" required class="input">';
					}
					?>
					     <br><br>
					     <label>Salary</label><br>
					     <input type="number" name="salary" required class="input">
					     <br><br>
						 <label>Month</label><br>
					     <input type="text" name="month" required class="input">
					     <br><br>
					     <label>Credited</label><br>
					     <input type="text" name="credited" required class="input">
					     <br><br>
					     <button type="submit" class="btn" name="update">Update Salary Details</button>
					     <button type="submit" class="btn" name="add">Insert Salary Details</button>

					</form>
					<br><br>
						
				
				</div>
						
				</div>
				
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>