<?php
session_start();
include('db.php');
	$br="branch";
	$sales="sales";
  	$branch=$_SESSION['BRANCHES'].$br;
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM $branch WHERE id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	$row=$result->fetch();

	$del=$row['branch_code'].$sales;
	$sql="DELETE DATABASE $del";
	
	if (mysql_query($sql)) {
		# code...
		$sql1 = $db->prepare("DELETE FROM $branch WHERE id= :memid");
	$sql1->bindParam(':memid', $id);
	$sql1->execute();
	} else {
		# code...
		echo "something is wrong";
	}
	


?>