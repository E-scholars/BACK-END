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
				<h3 >Add Doubt</h3><br><br>		
				<?php
						if(isset($_POST["submit"]))
						{   
                            if($_POST["file"]!=NULL){   
                                $file =$_FILES['file']['name'];
								$file_loc = $_FILES['file']['tmp_name'];
								$folder="doubt/";
							
								move_uploaded_file($file_loc,$folder.$file);
								$n=$folder.$file;                         						
							    $sq="insert into doubt(ID,HID,ques,ques_file) values({$_SESSION["ID"]},{},'{$_POST["ques"]}','$n')";
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

								$sq="insert into doubt(ID,HID,ques) values({$_SESSION["ID"]},{},'{$_POST["ques"]}')";

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
						<label>Subject</label>
                        <select name="sub" required class="input3">
				
                            <?php 
                                $sl="select distinct(SUB) FROM hclass where CLA in (select SCLASS from student where ID={$_SESSION["ID"]}) and SEC in (select SSEC from student where ID={$_SESSION["ID"]})";
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
						<label>Doubt</label><br>
					        <input type="text" name="ques" required class="input">
					     <br><br>
                         <label>Add Attachment</label><br>
							<input type="file"  class="input3" name="file">

					    <button type="submit" class="btn" name="submit">Post Doubt</button>
					</form>
					<br><br>
						
				
				</div>	
				<div class="content1">
				<h3 >Show Previous Doubts Response</h3><br><br>	
				<?php
						if(isset($_POST["view"]))
						{   
                            						
							$sql="select * from doubt where ID={$_SESSION["ID"]} and HID in (select HID from hclass where CLA in (select SCLASS from student where ID={$_SESSION["ID"]}) and SUB='{$_POST["sub"]})";
							$re=$db->query($sql);
							if($re->num_rows>0)
							{
								echo '
									<table border="1px">
									<tr>
										<th>S.No</th>
										<th>Doubt No.</th>
										<th>Doubt</th>
										<th>Doubt file</th>
                                        <th>Answer</th>
										<th>Answer file</th>
									</tr>
								
								
								';
								$i=0;
								while($r=$re->fetch_assoc())
								{
									$i++;
									echo "
									<tr>
										<td>{$i}</td>
										<td>{$r["DID"]}</td>
										<td>{$r["ques"]}</td>
                                        <td><a href='{$r["ques_file"]}'><img src='img/pdf_icon.png' width=36px height=50px></a></td>
										<td>{$r["ans"]}</td>
										<td><a href='{$r["ans_file"]}'><img src='img/pdf_icon.png' width=36px height=50px></a></td>
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
                    <form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					
						<label>Subject</label><br>
					    <select name="sub" required class="input4">
				
						<?php 
							    $sl="select distinct(SUB) FROM hclass where CLA in (select SCLASS from student where ID={$_SESSION["ID"]}) and SEC in (select SSEC from student where ID={$_SESSION["ID"]})";
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
                                    echo"<option value=''>No Doubts</option>";
                                }
						?>
					
                        </select>
                        <br><br>
						
				    
					<button type="submit" class="btn" name="view"> View Responses</button>
					</form>
               
				
				</div>	
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>