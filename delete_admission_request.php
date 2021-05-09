<?php
	include"database.php";
	session_start();
	
	$s="delete from admission where ADID={$_GET["id"]}";
	$db->query($s);
	echo "<script>window.open('admission_request.php?mes=Request Deleted.','_self');</script>"
?>