<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["ID"]))
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
		<h2 class="text">Welcome <?php echo $_SESSION["NAME"]; ?></h2><br><hr><br>

			<div id="section">
				<?php include"sidebar.php";?><br>
				<div class="content1">

				<h3 >View Notices </h3><br>
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="lbox1">	
						<label>Notice Date</label><br>
					<select name="notice_date" required class="input3">
				
						<?php 
							 $sl="select distinct(notice_date) FROM notice where (notice_to='student' or notice_to='all')";
							$r=$db->query($sl);
								if($r->num_rows>0)
									{
										echo"<option value=''>Select</option>";
										while($ro=$r->fetch_assoc())
										{
											echo "<option value={$ro["notice_date"]}>{$ro["notice_date"]}</option>";
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
								echo "<h3>Notice Details</h3><br>";
								$sql="select * from notice where (notice_date='{$_POST["notice_date"]}' and (notice_to='student' or notice_to='all'))";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
									echo '
										<table border="1px">
										<tr>
											<th>S.No</th>
                                            <th>Notice No.</th>
                                            <th>Date</th>
											<th>Notice Subject</th>
											<th>Notice</th>
										</tr>
									
									
									';
									$i=0;
									while($r=$re->fetch_assoc())
									{
										$i++;
										echo "
										<tr>
											<td>{$i}</td>
                                            <td>{$r["notice_id"]}</td>
											<td>{$r["notice_date"]}</td>
											<td>{$r["notice_subject"]}</td>
											<td><a href='{$r["notice_file"]}'><img src='img/pdf_icon.png' width=36px height=50px></a></td>
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