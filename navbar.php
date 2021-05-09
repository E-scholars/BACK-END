<div class="navbar">
		

			<ul class="list">
				<!-- <b style="color:white;float:left;line-height:50px;margin-left:15px;font-family:Cooper Black;">
				School Management System</b><br> -->
			<?php
				if(isset($_SESSION["AID"]))
				{
					echo'
				
						<li><a href="admin_home.php">Admin Home</a></li>
					<li><a href="change_pass.php">Settings</a></li>
					<li><a href="logout.php">Logout</a></li>
					';
				}
				elseif(isset($_SESSION["TID"]))
				{
					echo'
				
						<li><a href="teacher_home.php">Teacher Home</a></li>
				<li><a href="teacher_change_pass.php">Settings</a></li>
				<li><a href="logout.php">Logout</a></li>
					';
				}
				elseif(isset($_SESSION["ID"]))
				{
					echo'
				
						<li><a href="student_home.php">Student Home</a></li>
						<li><a href="student_change_pass.php">Settings</a></li>
						<li><a href="logout.php">Logout</a></li>
					';
				}
				elseif(isset($_SESSION["FID"]))
				{
					echo'
				
						<li><a href="fee_management_home.php">Fee/Salary Home</a></li>
						<li><a href="fee_salary_change_pass.php">Settings</a></li>
						<li><a href="logout.php">Logout</a></li>
					';
				}
				elseif(isset($_SESSION["CMID"]))
				{
					echo'
				
						<li><a href="class_management_home.php">Class Management Home</a></li>
						<li><a href="class_management_change_pass.php">Settings</a></li>
						<li><a href="logout.php">Logout</a></li>
					';
				}
				else{
					echo'
					
				<li><a href="admin_login.php">Admin</a></li>
				<li><a href="teacher_login.php">Teacher</a></li>
				<li><a href="student_home.php">Student</a></li>
				<li><a href="class_management_login.php">Class management</a></li>
				<li><a href="fee_management_login.php">Fee management</a></li>
				
				';
				}
			?>
				
			</ul>
			</div>
		<div>
		<div class="text" style="position:absolute;text-align:center;transform: translate(50%,90%);width:50%;">
			<h1 style="color:#fff;font-weight:solid;font-size:300%;background:rgb(88,00,00,.2);">
			Empowering students to create solutions for tomorrow’s challenges<h1>
			</div>	
			<img src="img/h1.jpg" class="sha" style="width:100%; max-height:70vh;">
		
		
		</div>
		