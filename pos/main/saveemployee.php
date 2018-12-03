<?php
session_start();
include('db.php');
function generateRandomString($length = 4) {
    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$ep=generateRandomString();
$br="employees";
  $branch=$_SESSION['BRANCHES'].$br;
  $code=$_SESSION['BRANCHES'].$ep;
$a = $_POST['first'];
$b = $_POST['second'];
$c = $_POST['pin'];
$d = $_POST['id_number'];
$e = $_POST['age'];
$f = $_POST['salary'];
$g = $_POST['position'];
$pass = $_POST['Password'];
$i = $_POST['branch'];
$j=$code;

	$algo='6';
    $rounds='5000';
    $CryptSalt='$'.$algo.'$rounds='.$rounds.'$';      
    $h=crypt($pass,$CryptSalt);
// query
$sql = "INSERT INTO $branch (first_name,second_name,pin,id_number,age,salary,position,password,branch,code) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j));
header("location: employee.php");


?>