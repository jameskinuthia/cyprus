<?php
	session_start();
	include('db.php');
	$br="branch";
    $branch=$_SESSION['BRANCHES'].$br;
	?>
<!DOCTYPE html>
<html>
<head>

	<title></title>
	<link href="../css/style.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body>
<form action="saveemployee.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Add Employee</h4></center>
<hr>
<div id="ac">
<span>First name: </span><input type="text" style="width:265px; height:30px;" name="first" ><br>
<span>Second Name : </span><input type="text" style="width:265px; height:30px;" name="second" Required/><br>
<span> Kra pin: </span><input type="text" style="width:265px; height:30px;" name="pin"> <br>
<span>ID number: </span><input type="text" style="width:265px; height:30px;" name="id_number" /><br>
<span>Age : </span><input type="text"  style="width:265px; height:30px;" name="age" maxlength="2" /><br>
<span>Salary : </span><input type="text" id="txt1" style="width:265px; height:30px;" name="salary" onkeyup="sum();" Required><br>
<span>position: </span><select  name="position" style="width:265px; height:30px; margin-left:-5px;" >
	<option value='admin'>Administrator</option>
			<option value='cashier'>Cashier</option>
</select><br>
<span>Password: </span><input type="Password"  style="width:265px; height:30px;" name="Password" required><br>
<span>branch : </span>
<select  name="branch" style="width:265px; height:30px; margin-left:-5px;" >
	
<?php
	
	           $result = $db->prepare("SELECT * FROM $branch ORDER BY id DESC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
	
	
		<option ><?php echo $row['branch_name'];?></option>
	<?php
	}
	?>
</select><br>
<span></span><input type="hidden" style="width:265px; height:30px;" id="txt22" name="qty_sold" Required ><br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>
</body>
</html>


