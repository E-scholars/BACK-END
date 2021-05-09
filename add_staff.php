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
				
				<?php include"sidebar.php";?><br><br><br>
				
				<div class="content1">
					
						<h3 > Add Staff Details</h3><br>
						
					<?php
						if(isset($_POST["submit"]))
						{
							$target="staff/";
							$target_file=$target.basename($_FILES["img"]["name"]);
							
							if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file))
							{
								$sq="insert into staff(TNAME,TPASS,QUAL,PNO,MAIL,PADDR,IMG) values('{$_POST["sname"]}',1234,'{$_POST["qual"]}','{$_POST["pno"]}','{$_POST["mail"]}','{$_POST["addr"]}','{$target_file}')";
								
								if($db->query($sq))
								{
									echo "<div class='success'>Insert Success..</div>";
								}
								else
								{
									echo "<div class='error'>Insert Failed..</div>";
								}
							}
							
						}
					
					
					?>
						
					
					<form  enctype="multipart/form-data" role="form"  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					     <label>Staff Name</label><br>
					     		<input type="text" name="sname" required class="input">
					     <br><br>
					     <label>Qualification</label><br>
					    		 <input type="text" name="qual" required class="input">
					     <br><br>
						 <label>  Phone No</label><br>
								<input type="text" maxlength="10" required class="input3" name="pno"><br><br>
						<label>  E - Mail</label><br>
								<input type="email"  class="input3" required name="mail"><br><br>
						<label>  Address</label><br>
						<textarea rows="5" name="addr"></textarea><br><br>
						<label> Image</label><br>
								<input type="file"  class="input3" required name="img"><br><br>
					     <button type="submit" class="btn" name="submit">Add Staff Details</button>
					</form>
					
					
				
				
				</div>
				
				
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>