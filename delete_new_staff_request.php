<?php
	include"database.php";
	session_start();
	
	$s="delete from new_staff where NSID={$_GET["id"]}";
	$db->query($s);
	echo "<script>window.open('new_teacher_request.php?mes=Request Deleted.','_self');</script>"
?>