<?php
	include"database.php";
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
	<title>E-Scholars</title>
		<link rel = "icon" href ="img/logo.png" type = "image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>
	
	<body>
			<?php include"slider.php";?><br>
			
			<br><br><br>
				
			<h1 style="text-align:center;">Welcome Teacher</h1><br><hr><br>

			
			<div style="transform:translate(10%,0);width:90%;">		
				
				
					
						<h3 > Add Your Details</h3><br>
						
					<?php
						if(isset($_POST["submit"]))
						{
							$target="new_staff/";
							$target_file=$target.basename($_FILES["img"]["name"]);
							
							if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file))
							{
								$sq="insert into new_staff(NSID,TNAME,QUAL,PNO,MAIL,PADDR,IMG) values({$_POST["nsid"]},'{$_POST["tname"]}','{$_POST["qual"]}','{$_POST["pno"]}','{$_POST["mail"]}','{$_POST["addr"]}','{$target_file}')";
								
								if($db->query($sq))
								{
									echo "<div class='success'>Request Success..</div>";
								}
								else
								{
									echo "<div class='error'>Request Failed..</div>";
								}
							}
							
						}
					
					
					?>
						
					
				<form  enctype="multipart/form-data" role="form"  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
				<div class="lbox" style="width:45%;">
                <label>Request ID</label><br>
						<?php
							$no="101";
							$sql="select * from new_staff order by NSID desc limit 1";
							$res=$db->query($sql);
							if($res->num_rows>0)
							{
								$row1=$res->fetch_assoc();
								$no=$row1["NSID"];
								$no++;
							}						
						?>
					<input type="number" class="input3" name="nsid" style="background:#b1b1b1;" value="<?php echo $no;?>" readonly  ><br><br>

                         <label>Name</label><br>
					     		<input type="text" name="tname" required class="input3">
					     <br><br>
					     <label>Qualification</label><br>
					    		 <input type="text" name="qual" required class="input3">
					     <br><br>
						 <label>  Phone No</label><br>
								<input type="text" maxlength="10" required class="input3" name="pno"><br><br>
                </div>
				
				<div class="rbox" style="width:45%;">
						<label>  E - Mail</label><br>
								<input type="email"  class="input3" required name="mail"><br><br>
                
						<label>  Address</label><br>
						<textarea rows="5" name="addr" ></textarea><br><br>
						<label> Image</label><br>
								<input type="file"  class="input3" required name="img">
					     <button type="submit" class="btn" name="submit">Add Staff Details</button>


                </div>
					</form>
					
					
				
				
			</div>
	
		<div class="footer"style="margin:0;background:#810000">
			<footer><p>-</p></footer>
		</div>
	</body>
</html>