<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["CMID"]))
	{
		echo"<script>window.open('class_management_login.php?mes=Access Denied...','_self');</script>";
		
	}
    $sql="select * from mark WHERE ID={$_GET["id"]}";
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
		<?php include"navbar.php";?><br><br><br>
		<h2 class="text">Welcome <?php echo $_SESSION["CMNAME"]; ?></h2><br><hr><br>

	
			<div id="section">
				<?php include"sidebar.php";?><br>
				<div class="content">
				
					<h3>Mark Details</h3><br>
					<form  method="get" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="lbox1">	
					
						<label>Student ID</label><br>
                        <input type="number" style="background:#b1b1b1;" value="<?php echo $_GET["id"];?>" class="input3" name="id" readonly><br><br>
					</div>
				
					</form>
					
					<div class="content">
					<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";	
						}
					
					?>
						<?php
                               
								echo "<h3>Mark Details</h3><br>";
								$sql="select * from mark where ID='{$_GET["id"]}'";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
									echo'
									<table border="1px">
										<tr>
											<th>S.No</th>
											<th>ID</th>
											<th>Class</th>
											<th>Term</th>
											<th>Subject</th>
											<th>Mark</th>
											<th>Attendance</th>
                                            <th>New Grade</th>
											<th>Final</th>
										</tr>
									';
									$i=0;
									while($r=$re->fetch_assoc())
									{
										$i++;
										echo "
											<tr>
                                            <form method='post'>
                                            <td>{$i}</td>
                                            <td><input type='hidden'name='id' value={$r["ID"]}>{$r["ID"]}</td> 
											<td><input type='hidden'name='class'readonly value={$r["CLASS"]}>{$r["CLASS"]}</td>
											<td><input type='hidden'name='term' readonly value='{$r["TERM"]}'>{$r["TERM"]}</td>
											<td><input type='hidden'name='sub' readonly value='{$r["SUB"]}'>{$r["SUB"]}</td>
											<td><input type='hidden'name='mark'readonly value='{$r["MARK"]}'>{$r["MARK"]}</td>
										";
											
										$t="select present from attendance where HID IN (select HID from hclass where CLA='{$r["CLASS"]}' and SUB='{$r["SUB"]}' and SEC IN (select SSEC from student where ID={$r["ID"]})) and ID={$r["ID"]}";
										$t=$db->query($t);
										$p="select present  from attendance where HID IN (select HID from hclass where CLA='{$r["CLASS"]}' and SUB='{$r["SUB"]}' and SEC IN (select SSEC from student where ID={$r["ID"]})) and ID={$r["ID"]} and present='Present'";
										$p=$db->query($p);
										if($t->num_rows>0)
										{	
											
											$pr=$p->num_rows;
											$to=$t->num_rows;
										
											echo"<input type='hidden'name='attendance'readonly value='{$pr}/{$to}'>
											<td>{$pr}/{$to}</td>";
										}
										else{
											echo"<input type='hidden'name='attendance'readonly value='-'>
											<td></td>";
										}
										echo"
                                            <td><input class='input4' style='margin:0;padding:0;' name='grade'></input></td>
                                            <td><button class='btnb' name='done'>Done</button></td></form>
											</tr>																	
										";
                                        
                                	}
								}
							?>
							<?php
                                if(isset($_POST["done"])){
                                        $s="update mark set GRADE='{$_POST["grade"]}' where ID={$_POST["id"]} and TERM='{$_POST["term"]}' and SUB='{$_POST["sub"]}'";
                                        $db->query($s);
                                        echo "
                                        <tr>
                                            <td></td>
                                            <td>{$_POST["id"]}</td>
                                            <td>{$_POST["class"]}</td>
                                            <td>{$_POST["term"]}</td>
                                            <td>{$_POST["sub"]}</td>
                                            <td>{$_POST["mark"]}</td>
											<td>{$_POST["attendance"]}</td>
                                            <td>{$_POST["grade"]}</td>
                                            <td>Updated</td>
                                        </tr>																	
                                        ";
    
                                    }
                                    
								echo "</table>";
                                
                                echo "
                                <a href='view_mark_cm.php?id={$_GET["id"]}'><button class='btn'>Go Back</button></a>
                                
                                ";

						?>
					
					
					</div>
				</div>
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>
<?php
	/*include "database.php";
	session_start();

        echo '
            <h3>Add/Update Grade</h3><br>
                <form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                <div class="lbox1">	
                
                    <label>Grade</label><br>
                    <input type="text" class="input3" required name="grade"><br><br>
                </div>
                <button type="submit" class="btn" name="add">Done</button>
            </form>
        ';

        if(isset($_POST["add"]))
        {
            $s="update mark set GRADE='{$_Post["grade"]}' where MID={$_GET["mid"]}";
            $db->query($s);
            echo "<script>window.open('view_mark_cm.php?mes=Grade Updated','_self');</script>";
        }
*/

?>