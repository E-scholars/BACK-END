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

				<h3 >View Doubts </h3><br>
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="lbox1">	
						<label>Subject</label><br>
					<select name="sub" required class="input3">
				
						<?php 
							 $sl="select distinct(SUB) FROM hclass where TID={$_SESSION["TID"]}";
								$r=$db->query($sl);
								if($r->num_rows>0)
									{
										echo"<option value=''>Select</option>";
										while($ro=$r->fetch_assoc())
										{
											echo "<option value={$ro["SUB"]}>{$ro["SUB"]}</option>";
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
							// 	$st="select HID hclass where TID={$_SESSION["TID"]} and SUB='{$_POST["sub"]}'";
							// 	$st=($db->query($st));
								
								echo "<h3>Doubt Details</h3><br>";
								$sql="select * from doubt where HID IN (select HID hclass where TID={$_SESSION["TID"]} and SUB='{$_POST["sub"]}') and status=0";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
									echo '
										<table border="1px">
										<tr>{$_POST["sub"]}</tr>
										<tr>
											<th>S.No</th>
                                            <th>Doubt No.</th>
											<th>By student ID</th>
											<th>Doubt</th>
											<th>Doubt file</th>
											<th>Answer</th>
										</tr>
									
									
									';
									$i=0;
									while($r=$re->fetch_assoc())
									{
										$i++;
										echo "
										<tr>
											<td>{$i}</td>
                                            <td>{$r["DTID"]}</td>
											<td>{$r["ID"]}</td>
											<td>{$r["ques"]}</td>
											<td><a href='{$r["ques_file"]}'><img src='img/pdf_icon.png' width=36px height=50px></a></td>
											<td>{$r["ans"]}</td>

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
					
						<h3 > Response Doubt</h3><br>
						
					<?php
						if(isset($_POST["submit"]))
						{	
							if($_POST["file"]!=NULL){
								$file =$_FILES['file']['name'];
								$file_loc = $_FILES['file']['tmp_name'];
								$folder="doubt/";
							
								move_uploaded_file($file_loc,$folder.$file);
								$n=$folder.$file;
								$s="update doubt set ans='{$_POST["ans"]}',status=1,ans_file='$n' where DID={$_POST["doubtno"]} and HID in ($s)";
								mysqli_query($db,$s); 
								$msg=mysqli_error($db);
								if($msg==""){
									echo "<div class='success'>Answer added Successfully..</div>";
								}
								else
								{	
									
									echo "<div class='error'>Answer add Failed..</div>";
								}
							}
							else{
								$sq="update doubt set ans='{$_POST["ans"]}',status=1 where DID={$_POST["doubtno"]} and HID in ($st)";

								if($db->query($sq))
								{	
									echo "<div class='success'>Answer added Successfully..</div>";
								}
								else
								{	
									
									echo "<div class='error'>Answer add Failed..</div>";
								}
							}
							
						}
						
					?>
					<form enctype="multipart/form-data" role="form" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
						
						<label>Doubt NO.</label><br>
						<input type="number" name="doubtno" class="input" required>
					     <br><br>
					     <label>Add Answer</label><br>
					     <input type="text" name="ans" required class="input">
					     <br><br>
						 <label>Add Attachment</label><br>
							<input type="file"  class="input3" name="file">
                        <br><br>
					     <button type="submit" class="btn" name="submit"> Add Doubt Response </button>
					</form>
					<br><br>
						
	 			
				</div>
						
				</div>
				
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>