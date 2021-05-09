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

			<div id="section">
				<?php include"sidebar.php";?><br>

				
                    
                <div class="content1">
				<h3 >Add Query</h3><br><br>	
				<?php
						if(isset($_POST["submit"]))
						{   
                            						
							$sq="insert into queries(ID,query_to,query,role) values({$_SESSION["TID"]},'{$_POST["query_to"]}','{$_POST["query"]}','teacher')";


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
                    <label>Query To</label>
                         <select name="query_to" required class="input3">
                                    <option value=''>Select</option>
                                    <option value='fee'>Fee/Salary Management</option>
                                    <option value='cm'>Class Management</option>
                                    <option value='admin'>Admin</option>
                        </select>
                    <br><br>
						<label>Query</label><br>
					        <input type="text" name="query" required class="input">
					     <br><br>
					    <button type="submit" class="btn" name="submit">POST </button>
					</form>
					<br><br>
				</div>

				<div class="content1">
				<h3 >Show Previous Queries Response</h3><br><br>	
				<?php
					if(isset($_POST["view"]))
					{
						echo "<h3>Queries Details</h3><br>";
						$sql="select * from queries where query_to='{$_POST["query_to"]}' and ID={$_SESSION["TID"]} and role='teacher'";
						$re=$db->query($sql);
						if($re->num_rows>0)
						{
							echo '
								<table border="1px">
								<tr>
									<th>S.No</th>
									<th>Query No.</th>
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
									<td>{$r["query"]}</td>
									<td>{$r["response"]}</td>

								</tr>
								";
								
							}
							echo "</table>";
						}
						
					else
					{
						echo "No record Found";
					}
						
					}
						
				?>
					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                    <label>Query Asked To</label>
                         <select name="query_to" required class="input3">
                                    <option value=''>Select</option>
                                    <option value='fee'>Fee/Salary Management</option>
                                    <option value='cm'>Class Management</option>
                                    <option value='admin'>Admin</option>
                        </select>
                    	
					    <button type="submit" class="btn" name="view">View Response </button>
					</form>
					<br><br>
				</div>
			</div>
				
	
				<?php include"footer.php";?>
	</body>
</html>