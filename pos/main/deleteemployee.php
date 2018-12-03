<?php
session_start();
include('db.php');
$br="employees";
$branch=$_SESSION['BRANCHES'].$br;
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM $branch WHERE id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>