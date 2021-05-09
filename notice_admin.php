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

				<h3 >Add Notice</h3>
                    
					
				<div class="content1">
											
				<?php
						if(isset($_POST["submit"]))
						{
							$file =$_FILES['file']['name'];
							$file_loc = $_FILES['file']['tmp_name'];
						 	$folder="notice/";
						 
							move_uploaded_file($file_loc,$folder.$file);
							$n=$folder.$file;
							$s="insert into notice(notice_file,notice_to,notice_subject) values ('$n','{$_POST["notice_to"]}','{$_POST["notice_sub"]}')";
							mysqli_query($db,$s); 
							$msg=mysqli_error($db);
							if($msg==""){
								echo "<div class='success'>Insert Success..</div>";
							}
							else
							{	
								
								echo "<div class='error'>Insert Failed..</div>";
							}
							
                            /*$target="notice/";

                            if(move_uploaded_file($_FILES['file']['tmp_name'],$target.$_FILES["file"]["name"]))
                            {
							        $sq="insert into notice(notice_to,notice_subject,notice_file) values('{$_POST["notice_to"]}','{$_POST["notice_sub"]}','{$target_file}')";

                            }*/
							// if($db->query($sql))
							// {	
							// 	echo "<div class='success'>Insert Success..</div>";
							// }
							// else
							// {
							// 	echo "<div class='error'>Insert Failed..</div>";
							// }
							
						}
						
					?>
					<form enctype="multipart/form-data" role="form" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                        
                        <label>Notice To</label><br>
                                <select name="notice_to" required class="input3">
                                    <option value=''>Select</option>
                                    <option value='fee'>Fee/Salary Management</option>
                                    <option value='cm'>Class Management</option>
                                    <option value='teacher'>Teachers</option>
                                    <option value='student'>Students</option>
                                    <option value='all'>All</option>
                                </select>
                                <br><br>
						<label>Notice Subject</label><br>
					        <input type="text" name="notice_sub" required class="input">
					     <br><br>
                        <label>Add Attachment</label><br>
							<input type="file"  class="input3" required name="file">
                        <br><br>
					    <button type="submit" class="btn" name="submit">ADD </button>
					</form>
					<br><br>
						
				
				</div>
						
				</div>
				
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>