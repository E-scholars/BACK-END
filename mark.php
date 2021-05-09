<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";
		
	}	
	
	if(isset($_GET["id"]))
	{
		$sql="select * from student where ID='{$_GET["id"]}'";
		$res=$db->query($sql);
		if($res->num_rows<=0)
		{
			header("location:add_mark.php?err=Invalid Register no..");
		}
		else
		{
			$rows=$res->fetch_assoc();
			$class=$rows["SCLASS"];
			$regno=$_GET["id"];
		}
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
				<div class="content">
					
					<h3>Add Marks</h3><br>
					<?php
						if(isset($_POST["submit"]))
						{
							$sq="insert into mark(ID,SUB,MARK,TERM,CLASS) values ('{$_POST["id"]}','{$_POST["sub"]}','{$_POST["mark"]}','{$_POST["etype"]}','{$_POST["class"]}')";
							if($db->query($sq))
							{
								echo "<div class='success'>Insert Success</div>";
							}
							else
							{
								echo "<div class='error'>Insert Failed</div>";
							}
							
						}
					
					
					
					?>
					
					<form method="post" action="<?php echo $_SERVER["REQUEST_URI"];?>">
						<div class="lbox">
							<label> Student ID</label><br>
							<input type="text" style="background:#b1b1b1;" value="<?php echo $regno;?>" class="input3" name="id" readonly><br><br>
							
							<label>Class</label><br>
							<input type="text" style="background:#b1b1b1;"  value="<?php echo $class ?>" class="input3" name="class" readonly><br><br>
						
							<label> Select Term</label><br>
							<select name="etype" required class="input3">
								<option value="">Select</option>
								<option value="I-Term">I-Term</option>
								<option value="II-Term">II-Term</option>
								<option value="III-Term">III-Term</option>
							</select>
							<br><br>
						</div>
						<div class="rbox">
							
						<label>Subject</label><br>
						<input class="input3" name="sub"  type="text" required>	
						<br><br>
						<label >Mark :</label><br>
						<input class="input3" name="mark"  id="mark" type="mark" required>
						<br><br>
						<button type="submit"  class="btn" name="submit"> Add Mark Details</button>
					</form>							
						</div>
						
				</div>
				
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>