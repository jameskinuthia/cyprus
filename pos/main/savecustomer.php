<?php
session_start();
include('../connect.php');
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['prod_name'];
$e = $_POST['note'];
$f = $_POST['date'];
// query
$sql = "INSERT INTO customer (customer_name,address,contact,prod_name,note,expected_date) VALUES (:a,:b,:c,:d,:e,:f)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f));
header("location: customer.php");


?>