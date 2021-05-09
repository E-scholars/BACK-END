<div class="sidebar"><br>
<h3 class="text">Dashboard</h3><br><hr><br>
<ul class="s">
<?php
	if(isset($_SESSION["AID"]))
	{
		echo'
			<li class="li"><a href="admission_request.php">Admission Requests</a></li>
			<li class="li"><a href="new_teacher_request.php">New Teachers</a></li>
			<li class="li"><a href="view_staff.php">View Staff</a></li>
			<li class="li"><a href="student.php"> View Student</a></li>

			<li class="li"><a href="add_staff.php">Add Staff</a></li>
			<li class="li"><a href="add_stud.php">Add Student</a></li>
			<li class="li"><a href="notice_admin.php">Add Notice</a></li>
			<li class="li"><a href="query_admin.php">Queries</a></li>
			
			<li class="li"><a href="logout.php">Logout</a></li>
		
		';
	
	
	}
	elseif(isset($_SESSION["TID"])){
		echo'
			<li class="li"><a href="view_stud_teach.php"> View Student</a></li>
			<li class="li"><a href="tt_teacher.php">View Timetable/ Add Classwork/Attendance</a></li>


			<li class="li"><a href="tech_view_exam.php">View Exam</a></li>
			<li class="li"><a href="add_mark.php">Add Marks</a></li>
			<li class="li"><a href="view_mark.php">View Marks</a></li>
			<li class="li"><a href="notice_teacher.php">Notices</a></li>
			<li class="li"><a href="doubt_teacher.php">Doubts</a></li>
			<li class="li"><a href="salary_details_teacher.php">Salary Details</a></li>
			<li class="li"><a href="add_query_teacher.php">Add Query/View Query Response</a></li>
			
			<li class="li"><a href="logout.php">Logout</a></li>
		
		';
	}
	elseif(isset($_SESSION["ID"])){

		echo'
			<li class="li"><a href="classwork_student.php">View/Submit Classwork</a></li>
			<li class="li"><a href="doubt_student.php">Ask Doubt/View doubt Response</a></li>
			<li class="li"><a href="handle_class_student.php">Check Classes/Mark Attendence</a></li>
			<li class="li"><a href="student_view_exam.php">View Exam</a></li>
			<li class="li"><a href="student_view_mark.php">View Marks</a></li>
			<li class="li"><a href="notice_student.php">Notices</a></li>
			<li class="li"><a href="add_query_student.php">Add Query/ View Query Response</a></li>
			<li class="li"><a href="fee_details_student.php">Fee Details/ Pay Fee</a></li>


			<li class="li"><a href="logout.php">Logout</a></li>

		
		';
	}
	elseif(isset($_SESSION["FID"]))
	{
		echo'
			<li class="li"><a href="notice_fm.php">Notices</a></li>
			<li class="li"><a href="fee_details.php"> Fee Management</a></li>
			<li class="li"><a href="salary_details.php"> Salary Management</a></li>
			
			<li class="li"><a href="query_fee_management.php"> Queries</a></li>
			
			<li class="li"><a href="logout.php">Logout</a></li>
		
		';
	}
	if(isset($_SESSION["CMID"]))
	{
		echo'
			<li class="li"><a href="view_staff_cm.php">View Staff</a></li>
			<li class="li"><a href="view_student_cm.php"> View Student</a></li>
			<li class="li"><a href="subject_tt_cm.php"> Subject Alloted/ Class Schedule</a></li>
			<li class="li"><a href="query_cm.php"> Queries</a></li>
			
			<li class="li"><a href="set_exam.php">Set Exam</a></li>
			<li class="li"><a href="view_exam.php">View Exam</a></li>
			
			<li class="li"><a href="logout.php">Logout</a></li>

		';
	
	
	}


?>
	

</ul>

</div>