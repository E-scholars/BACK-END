<?php
	include"database.php";
	session_start();
	
	$s="delete from hclass where HID={$_GET["id"]}";
	$db->query($s);
	echo "<script>window.open('subject_tt_cm.php?mes=Data Deleted.','_self');</script>"
?>