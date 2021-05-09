<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";
		
	}
   
	$sql="select * from class_work where HID={$_GET["id"]}";
		$res=$db->query($sql);
    
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
				<?php include"sidebar.php";?><br><br><br>
				<div class="content1">
					
						<h3 > View Class Work</h3><br>
						
                        

                        <?php
						if(isset($_POST["submit"]))
						{
							$file =$_FILES['file']['name'];
							$file_loc = $_FILES['file']['tmp_name'];
						 	$folder="classwork/";
						 
							move_uploaded_file($file_loc,$folder.$file);
							$s="insert into class_work(HID,announcement,file) values ({$_GET["id"]},'{$_POST["announce"]}','$folder$file')";
						 	mysqli_query($db,$s); 
							$msg=mysqli_error($db);
							if($msg==""){
								echo "<div class='success'>Insert Success..</div>";
							}
							else
							{		
								echo "<div class='error'>Insert Failed..</div>";
							}
                        }
                        if(isset($_POST["delete"])){
                            $s="delete from class_work where CWID={$_POST["cwid"]}";
                            if($db->query($s)){
                                echo "<div class='error'>Data Deleted..</div>";
							}
							else
							{		
								echo "<div class='error'>Delete Failed..</div>";
							}
                        }
                    ?>
                    <?php
                            $sq="select * from hclass where HID={$_GET["id"]}";
                            $tp=$db->query($sq);
                            if($tp->num_rows>0){
                                $r=$tp->fetch_assoc();
                            }
                        ?>
						
                
                    <?php
                    echo "
					    <form enctype='multipart/form-data' role='form' method='post' action='{$_SERVER["PHP_SELF"]}?id={$_GET["id"]}'>";?>
                            <div class="lbox1">
                                <label>Class</label><br>
                                    <input type="text" name="class" style="background:#b1b1b1;" value='<?php echo $r["CLA"]?>' class="input3" readonly>
                                <br><br>
                                <label>Section</label><br>
                                    <input type="text" name="sec" style="background:#b1b1b1;" value='<?php echo $r["SEC"]?>' class="input3" readonly>
                                <br><br>
                                <label>Subject</label><br>
                                    <input type="text" name="sub" style="background:#b1b1b1;" value='<?php echo $r["SUB"]?>' class="input3" readonly>
                                <br><br>
                            </div>
                            <div class="rbox1">
                                <label>Add Announcement</label><br>
                                    <textarea rows="5" name="announce" required></textarea>
                                <br><br>
                                <label>Add Attachment</label><br>
                                    <input type="file"  class="input3" name="file" required>
                                
                                <button type="submit" class="btn" name="submit">Add Work </button>
                            </div>
					    </form>
                       
                 

                    <div class="content1">
					<h3 >Class Work Assigned</h3><br>

                    <?php
                     if($res->num_rows>0)
                     {                          
                            echo "
                                <table border='1px'>
                                                            
                                <tr>
                                    <th>S.No</th>
                                    <th>Class Work ID</th>
                                    <th>Announcement</th>
                                    <th>Work</th>
                                    <th>Delete</th>
                                    <th>View Students Submission</th>
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
					                 <form method='post' action='{$_SERVER["PHP_SELF"]}?id={$_GET["id"]}'>
                                        <input type='hidden' value='{$row["CWID"]}' name='cwid' readonly>
                                        <button type='submit' class='btnr'style='display:block;margin:auto;' name='delete'>Delete </button>
                                     </form></td>
                                    <td><a href='view_submission.php?cwid={$row["CWID"]}' class='btnb'style='display:block;text-align:center;'>View Submissions</a></td>

                                </tr>
                                ";										
                            }
                        }
                        else
                        {
                            echo "No Classwork Found";
                        }
                        echo "</table>";
                    						
                    ?>
					 	
                    </div>
				</div>
			</div>	

			<?php include"footer.php";?>
			
	</body>
</html>