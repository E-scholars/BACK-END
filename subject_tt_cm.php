<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["CMID"]))
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
        <br><br>
				<h2 class="text">Welcome <?php echo $_SESSION["CMNAME"]; ?></h2><br><hr><br>

			<div id="section">
				<?php include"sidebar.php";?><br>


                <div class="content">               
                    <h3>View Classes</h3><br>
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="lbox1">	
					
						<label>Class</label><br>
						<select name="cla" required class="input2">
				
                            <?php 
                                $sl="SELECT distinct(CLA) FROM hclass";
                                $r=$db->query($sl);
                                    if($r->num_rows>0)
                                        {
                                            echo"<option value=''>Select</option>";
                                            while($ro=$r->fetch_assoc())
                                            {
                                                echo "<option value='{$ro["CLA"]}'>{$ro["CLA"]}</option>";
                                            }
                                        }
                            ?>
					
					    </select>
                    </div>
                    <div class="rbox1">
                        
                        <label>Section</label><br>
						<select name="sec" required class="input2">
				
                            <?php 
                                $sl="SELECT distinct(SEC) FROM hclass";
                                $r=$db->query($sl);
                                    if($r->num_rows>0)
                                        {
                                            echo"<option value=''>Select</option>";
                                            while($ro=$r->fetch_assoc())
                                            {
                                                echo "<option value='{$ro["SEC"]}'>{$ro["SEC"]}</option>";
                                            }
                                        }
                            ?>
					
					    </select>                        
                    </div>
                    <button type="submit" class="btn" name="view"> View Details</button><br><br>
                    </form>
                
                </div>
                <div class="Output">
                    <?php
                    if(isset($_GET["mes"]))
                    {
                        echo"<div class='error'>{$_GET["mes"]}</div>";	
                    }
                    ?>
                </div>
                </div>
                <div style="float:right;transform:translate(-8%,0);">
                    <?php
                    if(isset($_POST["view"]))
                    {
                        echo "<h3 style='margin-top:30px;'> Class Details</h3><br>";
                        $sql="select * from hclass where CLA='{$_POST["cla"]}' and SEC='{$_POST["sec"]}'";
                        $re=$db->query($sql);
                        
                            
                        
                        
                            echo'
                                <table border="1px" >
                                    <tr>
                                        <th>S.No</th>
                                        <th>Class Name</th>
                                        <th>Section</th>
                                        <th>Subject</th>
                                        <th>Day</th>
                                        <th>Slot</th>
                                        <th>Teacher ID</th>
                                        <th>Teacher Name</th>
                                        
                                        <th>Delete</th>
                                    </tr>
                            ';
                            
                                
                                        $i=0;
                                        while($r=$re->fetch_assoc())
                                        {   
                                            $t=$db->query("select TNAME from staff where TID={$r["TID"]}");
                                            $t=$t->fetch_assoc();
                                            $i++;
                                            echo "
                                                <tr>
                                                    <td>{$i}</td>
                                                    <td>{$r["CLA"]}</td>
                                                    <td>{$r["SEC"]}</td>
                                                    <td>{$r["SUB"]}</td>
                                                    <td>{$r["DAY"]}</td>
                                                    <td>{$r["SLOT"]}</td>
                                                    <td>{$r["TID"]}</td>
                                                    <td>{$t["TNAME"]}</td>
                                                    <td><a href='delete.php?id={$r["HID"]}' class='btnr'>Delete</a></td>
                                                </tr>
                                                ";									
                                        }								
                                      				
                        
                            echo "</table>";
                        
                    }
                    ?>
                </div>
            <div id="section"style="float:right; ">
            <div class="content" >
            <h3 > Add Class Details</h3><br>
					<?php
						if(isset($_POST["submit"]))
						{
							 $sql="insert into hclass(TID,CLA,SEC,SUB,DAY,SLOT) values({$_POST["tid"]},'{$_POST["cname"]}','{$_POST["sec"]}','{$_POST["sub"]}','{$_POST["day"]}','{$_POST["slot"]}')";
							if($db->query($sql))
							{
								echo "<div class='success'>Insert Success..</div>";
							}
							else
							{
								echo "<div class='error'>Insert failed..</div>";
							}							
						}
                        elseif(isset($_POST["update"]))
						{
							 $sql="update hclass set TID={$_POST["tid"]},DAY='{$_POST["day"]}',SLOT='{$_POST["slot"]}' where CLA='{$_POST["cname"]}'and SEC='{$_POST["sec"]}' and SUB='{$_POST["sub"]}'";
							if($db->query($sql))
							{
								echo "<div class='success'>Update Success..</div>";
							}
							else
							{
								echo "<div class='error'>Update failed..</div>";
							}							
						}
                        
                        
					
					?>
						
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                
                <div class="lbox">
                <?php
					if(isset($_POST["view"])){
                        
                        echo "<label>Class Name</label>";
						echo "<input type='text' class='input3' name='cname' style='background:#b1b1b1;' value='{$_POST["cla"]}'readonly ><br><br>";
                        echo "<label>Section </label><br>";
						echo "<input type='text' class='input3' name='sec' style='background:#b1b1b1;' value='{$_POST["sec"]}' readonly ><br><br>";

                        
					}
					else{ 
						echo '					
                            <label>Class Name</label><br>
                        <select name="cname"  required class="input3">
                                <option value="">Select</option>
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                                <option value="V">V</option>
                                <option value="VI">VI</option>
                                <option value="VII">VII</option>
                                <option value="VIII">VIII</option>
                                <option value="IX">IX</option>
                                <option value="X">X</option>
                            </select><br><br>
                     

                            <label>Section </label><br>
                            <select name="sec"  required class="input3">
                                <option value="">Select</option>
                                <option value="-">-</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>					
                            </select><br><br>
                            ';
                        }
                        ?>

                            <label>Subject</label><br>
                                <input type="text" name="sub" required class="input3">
                            <br><br>
                </div>
                <div class="rbox">

                            <label>Day </label><br>
                            <select name="day"  required class="input4">
                                <option value="">Select</option>
                                <option value="-">-</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>	
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>					
                            </select><br><br>
                
                    <label>Slot</label><br>
					     	<input type="time" name="slot" required class="input3">
					<br><br>

    			    <label>Teacher ID</label><br>
					    <select name="tid" required class="input4">
				
						<?php 
							 $sl="SELECT TID FROM staff";
							$r=$db->query($sl);
								if($r->num_rows>0)
									{
										echo"<option value=''>Select</option>";
										while($ro=$r->fetch_assoc())
										{
											echo "<option value='{$ro["TID"]}'>{$ro["TID"]}</option>";
										}
									}
						?>
                        </select>
                </div>
					<br><br>
                    
					<button type="submit" class="btn" name="submit">Add Class Details</button>
					<button type="submit" class="btn" name="update">Update Class Details</button>

				</form>
            
            </div>
                                </div>
	
				<?php include"footer.php";?>
	</body>
</html>