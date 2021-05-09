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
				<?php include"sidebar.php";?><br>
				<div class="content1">

				<h3 >View Queries </h3><br>
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="lbox1">	
						<label>Query</label><br>
					<select name="query_no" required class="input3">
				
						<?php 
							 $sl="select * FROM queries where status=0 and query_to='admin'";
							$r=$db->query($sl);
								if($r->num_rows>0)
									{
										echo"<option value=''>Select</option>";
										while($ro=$r->fetch_assoc())
										{
											echo "<option value={$ro["query_no"]}>{$ro["query_no"]}</option>";
										}
									}
                                else{
                                    echo"<option value=''>No query</option>";
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
								echo "<h3>Queries Details</h3><br>";
								$sql="select * from queries where query_no={$_POST["query_no"]}";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
									echo '
										<table border="1px">
										<tr>
											<th>S.No</th>
                                            <th>Query No.</th>
											<th>Asked by</th>
											<th>ID</th>
											<th>Query</th>
											<th>Response</th>
										</tr>
									
									
									';
									$i=0;
									while($r=$re->fetch_assoc())
									{
										$i++;
										echo "
										<tr>
											<td>{$i}</td>
                                            <td>{$r["query_no"]}</td>
											<td>{$r["role"]}</td>
											<td>{$r["ID"]}</td>
											<td>{$r["query"]}</td>
											<td>{$r["response"]}</td>

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
					
						<h3 > Response Query</h3><br>
						
					<?php
						if(isset($_POST["submit"]))
						{
							$sq="update queries set response='{$_POST["respo"]}',status=1 where ((query_no={$_POST["queryno"]} and query_to='admin')) ";

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
						 <label>Query NO.</label><br>
					      <input type="number" name="queryno" style="background:#b1b1b1;" value='<?php echo $_POST["query_no"]?>' class="input" readonly>
					     <br><br>
					     <label>Query Response</label><br>
					     <input type="text" name="respo" required class="input">
					     <br><br>
					     <button type="submit" class="btn" name="submit">Response </button>
					</form>
					<br><br>
						
				
				</div>
						
				</div>
				
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>