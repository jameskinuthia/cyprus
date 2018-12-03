<?php
	//Start session
	session_start();
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	$link = mysql_connect('localhost','root',"");
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db('cyprus', $link);
	if(!$db) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values= 
	$role = clean($_POST['role']);
	$login = clean($_POST['username']);
	$password = clean($_POST['password']);
	//hash algo
	 $algo='6';
      $rounds='5000';
      $CryptSalt='$'.$algo.'$rounds='.$rounds.'$';      
      $hashedpassword=crypt($password,$CryptSalt);
	//Input Validations
	if($role == '') {
		$errmsg_arr[] = 'Role is missing';
		$errflag = true;
	}
	if($login == '') {
		$errmsg_arr[] = 'Username missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: index.php");
		exit();
	}
	
	//Create query
	$name=substr($login ,0,6);
	$br='branch';
	$cp=$name.$br;
	$e="employees";
	$ep=$name.$e;
	
	//Check whether the query was successful or not
	if($role=="owner") {
	$qry="SELECT * FROM members WHERE position = '$role' AND email='$login' AND password='$hashedpassword'";
	$result=mysql_query($qry);
		if(mysql_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
			$_SESSION['SESS_MEMBER_ROLE'] = $member['position'];
			$_SESSION['SESS_FIRST_NAME'] = $member['firstname'];
			$_SESSION['SESS_LAST_NAME'] = $member['secondname'];
			$_SESSION['BRANCHES']=$member['code'];
			//$_SESSION['SESS_PRO_PIC'] = $member['profImage'];
			session_write_close();
			header("location: main/branch.php");
			exit();
		}
		
		else {
			//Login failed
			header("location: index.php");
			exit();
		}
	}
	elseif (($role== "admin") or ($role="cashier")) {
	
		$qry1="SELECT * FROM `$ep` WHERE position = '$role' AND code='$login' AND password='$hashedpassword'";
	$result1=mysql_query($qry1) or die(mysql_error());
			# code...
			if(mysql_num_rows($result1) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result1);
			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
			$_SESSION['SESS_MEMBER_ROLE'] = $member['position'];
			$_SESSION['SESS_FIRST_NAME'] = $member['first_name'];
			$_SESSION['SESS_LAST_NAME'] = $member['second_name'];
			$_SESSION['BRANCHES']=$name;
			//$_SESSION['SESS_PRO_PIC'] = $member['profImage'];
			session_write_close();
			header("location: main/branch.php");
			exit();
		}
		
		else {
			//Login failed
			header("location: index.php");
			exit();
		}
		}
	else {
		die("Query failed");
	}
?>