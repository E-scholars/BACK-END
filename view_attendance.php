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
					
						<h3 > View Student Attendance</h3><br>
						
                    <?php
                            $sq="select * from hclass where HID={$_GET["id"]}";
                            $tp=$db->query($sq);
                            if($tp->num_rows>0){
                                $r=$tp->fetch_assoc();
                            }
                        ?>
						
                    <div class="content1">
                    <?php
                    echo "
					    <form role='form' method='post' action='{$_SERVER["PHP_SELF"]}?id={$_GET["id"]}'>";?>
                            <div class="lbox1">
                                <label>Class</label><br>
                                    <input type="text" name="class" style="background:#b1b1b1;" value='<?php echo $r["CLA"]?>' class="input3" readonly>
                                <br><br>
                                <label>Section</label><br>
                                    <input type="text" name="sec" style="background:#b1b1b1;" value='<?php echo $r["SEC"]?>' class="input3" readonly>
                                <br><br>
                            </div>
                            <div class="rbox1">
                                <label>Subject</label><br>
                                    <input type="text" name="sub" style="background:#b1b1b1;" value='<?php echo $r["SUB"]?>' class="input3" readonly>
                                <br><br>
                                <label>Date</label><br>
					            <select name="date" required class="input3">
                                <?php 
                                    $sl="select distinct(time) from attendance where HID={$_GET["id"]}";
                                    $r=$db->query($sl);
                                        if($r->num_rows>0)
                                            {
                                                echo"<option value=''>Select</option>";
                                                while($ro=$r->fetch_assoc())
                                                {
                                                     echo "<option value='{$ro["time"]}'>{$ro["time"]}</option>";
                                                }
                                            }
						        ?>
                                </select>
                                <button type="submit" class="btn" name="view">Show Attendance </button>
                            </div>
					    </form>
                       
                    </div>
                    <?php
						if(isset($_POST["view"]))
						{
							
							$s="select * from attendance where HID={$_GET["id"]} and time='{$_POST["date"]}'";
                            $res=$db->query($s);
                            if($res->num_rows>0)
                            {                          
                                   echo "
                                       <table border='1px'>
                                        <tr>Date:{$_POST["date"]}</tr>                         
                                       <tr>
                                           <th>S.No</th>
                                           <th>Student ID</th>
                                           <th>Present/Absent</th>
                                       </tr>
                                   ";
                              
                                   $i=0;
                                   while($row=$res->fetch_assoc())
                                   {
                                       $i++;
                                       echo "
                                       <tr>
                                           <td>{$i}</td>
                                           <td style='text-align:center;'>{$row["ID"]}</td>
                                           <td>{$row["present"]}</td>                                                 
                                       </tr>
                                       ";										
                                   }
                            }
                               else
                               {
                                   echo "No Classwork Found";
                               }
                               echo "</table>";
                        }                      
                           ?>
				</div>
			</div>	

			<?php include"footer.php";?>
			
	</body>
</html>