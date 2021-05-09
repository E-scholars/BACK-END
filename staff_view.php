<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
		
	}
	$sql="select * from staff where TID={$_GET["id"]}";
		$res=$db->query($sql);

		if($res->num_rows>0)
		{
			$row=$res->fetch_assoc();
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
					
						<h3 > View Staff Details</h3><br>
						
						<div class="ibox">
							<img src="<?php echo $row["IMG"]; ?>" height="230" width="230">
							
						</div>
						<div class="tsbox">
						<table border="1px">
						
							<tr><th>Teacher ID </th> <td> <?php echo $row["TID"]; ?></td></tr>
							<tr><th>Name </th> <td> <?php echo $row["TNAME"]; ?></td></tr>
							<tr><th>Qualification </th> <td> <?php echo $row["QUAL"]; ?></td></tr>
							<tr><th>Phone No </th> <td> <?php echo $row["PNO"]; ?></td></tr>
							<tr><th>E - Mail </th> <td> <?php echo $row["MAIL"]; ?></td></tr>
							<tr><th>Address </th> <td> <?php echo $row["PADDR"]; ?></td></tr>
							
						</table>
						</div>
						
				
					<?php
						if(isset($_POST["submit"]))
						{
							$target="staff/";
							$target_file=$target.basename($_FILES["img"]["name"]);
							
							if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file))
							{
								$sql="update staff set PNO='{$_POST["pno"]}',MAIL='{$_POST["mail"]}',PADDR='{$_POST["addr"]}',IMG='{$target_file}'where TID={$_GET["id"]}";
								$db->query($sql);
								echo "<div class='success'>Update Success</div>";
							}
						}				
					?>
					
				<div class="content">
					<h3>Update Profile</h3><br>
					<?php 
					echo "
					 <form  enctype='multipart/form-data' role='form'  method='post' action='{$_SERVER["PHP_SELF"]}?id={$_GET["id"]}'>";?>
					<div >
							<input type='hidden' name='id' value='<?php $_GET["id"]?>'>
								<label>  Phone No</label><br>
								<input type="text" maxlength="10" required class="input3" name="pno"><br><br>
								<label>  E - Mail</label><br>
								<input type="email"  class="input3" required name="mail"><br><br>
							</div>
							<div>
								<label>  Address</label><br>
								<textarea rows="5" name="addr"></textarea><br><br>
								<label> Image</label><br>
								<input type="file"  class="input3" required name="img"><br><br>
							</div>
						<button type="submit" class="btn" name="submit">Update Profile Details</button>
						
						</form>
					</div>
					</div>
				</div>	
			</div>
			<?php include"footer.php";?>
			
	</body>
</html>