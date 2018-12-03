<?php
// configuration
session_start();
include('db.php');
$br="employees";
$branch=$_SESSION['BRANCHES'].$br;
// new data
$id = $_POST['memi'];
$a = $_POST['first'];
$b = $_POST['second'];
$c = $_POST['pin'];
$d = $_POST['id_number'];
$e = $_POST['age'];
$f = $_POST['salary'];
$g = $_POST['position'];

$i = $_POST['branch'];

// query
$sql = "UPDATE $branch
        SET first_name=?, second_name=?, pin=?, id_number=?, age=?, salary=?,position=?, branch=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$f,$g,$i,$id));
header("location: employee.php");

?>