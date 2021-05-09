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
						
						
							<label>Subject</label><br>
							<select name="sub" required class="input3">
					
								<?php 
									$sl="select distinct(SUB) from hclass where SEC IN (SELECT SSEC from student WHERE ID='{$_SESSION["ID"]}') AND CLA IN (SELECT SCLASS FROM student WHERE ID='{$_SESSION["ID"]}')";
									$r=$db->query($sl);
										if($r->num_rows>0)
											{
												echo"<option value=''>Select</option>";
												while($ro=$r->fetch_assoc())
												{
													echo "<option value='{$ro["SUB"]}'>{$ro["SUB"]}</option>";
												}
											}
								?>
						
							</select>

						<button type="submit" class="btn" name="view"> View Details</button>
						</form>

                    <?php
						if(isset($_POST["submit"]))
						{
							$file =$_FILES['file']['name'];
							$file_loc = $_FILES['file']['tmp_name'];
						 	$folder="worksubmission/";
						 
							move_uploaded_file($file_loc,$folder.$file);
							$sql="insert into work_submission(CWID,ID,work_file) values ({$_POST["cwid"]},'{$_SESSION["ID"]}','$file')";
						 	mysqli_query($db,$sql); 
							$msg=mysqli_error($db);
							if($msg==""){
                                $s="update work_submission set submission_status='Submitted'";
                                $db->query($s);
								echo "<div class='success'>Upload Success..</div>";
                               
							}
							else
							{		
								echo "<div class='error'>Upload Failed..</div>";
							}
                        }
                    ?>      
					
                    <br><h3 >Class Work Assigned</h3><br>
						<?php
                        if(isset($_POST["view"]))
                        {   
                           
							$s="select HID from hclass where SEC IN (SELECT SSEC from student WHERE ID={$_SESSION["ID"]}) AND (CLA IN (SELECT SCLASS FROM student WHERE ID={$_SESSION["ID"]}) AND SUB='{$_POST["sub"]}')";
	                    	$r=($db->query($s))->fetch_assoc();
						
                            $sql="select * from class_work where HID={$r["HID"]}";
						 	$res=$db->query($sql);
                            
                           
                            if($res->num_rows>0)
                            {                          
                                    echo "
                                        <table border='1px'>
                                                                    
                                        <tr>
                                            <th>S.No</th>
                                            <th>Class Work ID</th>
                                            <th>Announcement</th>
                                            <th>Work</th>
                                            <th>Add Work</th>
                                            <th>Status</th>
                                            <th>Marks</th>
                                        </tr>
                                    ";
                            
                                    $i=0;
                                    while($row=$res->fetch_assoc())
                                    {
                                        $i++;
                                        echo "
                                        <tr>
                                            <td>{$i}</td>
                                            <td style='text-align:center;'>{$row["CWID"]}</td>
                                            <td>{$row["announcement"]}</td>
                                            <td><a href='{$row["file"]}'><img src='img/pdf_icon.png' width=36px height=50px></a></td>

                                            <td>
                                            <form enctype='multipart/form-data' role='form' method='post' action='{$_SERVER["PHP_SELF"]}'>
                                                 <input type='hidden' class='input3' value='{$row["CWID"]}' name='cwid' readonly>
                                                 <input type='file'  class='input3' name='file' style='display:block;margin:auto;text-align:center;'required>
                                            <button type='submit' class='btnb' name='submit'style='display:block;margin:auto;text-align:center;'>Submit</button></form>
                                        
                                            
                                        ";
                                            $temp="select submission_status,mark from work_submission where CWID={$row["CWID"]} and ID={$_SESSION["ID"]}";
                                            $x=$db->query($temp);
                                            if($x->num_rows>0){
                                                $x=$x->fetch_assoc();
                                                echo "<td>{$x["submission_status"]}</td>
                                                    <td>{$x["mark"]}</td>";


                                            }
                                            else{
                                                echo "<td>Not Submitted</td>
                                                    <td></td>";

                                            }
                                        echo'</tr>';
                                        										
                                    }
                                }
                                else
                                {
                                    echo "No Classwork Found";
                                }
                                echo "</table>
                                                    
                           
                                
                            ";
						
                        }
						
						?>
						
						</table>

                    
					
				</div>
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>