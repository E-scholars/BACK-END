<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";
		
	}
   
	$sql="select * from work_submission where CWID={$_GET["cwid"]}";
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
				<div class="content">

					<h3 > Students Submitted work</h3><br>

                    <?php
					if(isset($_POST["submit"])){
							$s="update work_submission set Mark={$_POST["mark"]}";
                            $t=$db->query($s);
                            if($t){
                                echo "<div class='success'>Update Success..</div>";
							}
							else
							{		
								echo "<div class='error'>Update Failed..</div>";
							}

                    }

                     if($res->num_rows>0)
                     {                          
                            echo "
                                <table border='1px'>

                                <tr>
                                    <th colspan='2'>Class Work ID</th>
                                    <th colspan='2'>{$_GET["cwid"]}</th>
                                <tr>      
                                <tr>
                                    <th>S.No</th>
                                    <th>Student ID</th>
                                    <th>Submitted work file</th>
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
                                    <td style='text-align:center;'>{$row["ID"]}</td>
									<td><a href='{$row["work_file"]}'style='display:block;text-align:center;'><img src='img/pdf_icon.png' width=36px height=50px></a></td>
                                    <td>{$row["Mark"]}
                                        <form method='post' action='{$_SERVER["PHP_SELF"]}?cwid={$_GET["cwid"]}' style='margin:0;'>
                                            <input type='number'  class='input5' name='mark' style='margin:0;text-align:center;'required placeholder='Marks'>
                                        <button type='submit' class='btnb' name='submit'style='display:block;margin:0;float:right;'>Update</button></form>
                                    </td>

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

			<?php include"footer.php";?>
			
	</body>
</html>