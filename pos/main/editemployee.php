<?php
session_start();
	include('db.php');
	$br="employees";
	$e="branch";
  $branch=$_SESSION['BRANCHES'].$br;
  $ep=$_SESSION['BRANCHES'].$e;
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM $branch WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditemployee.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit employee</h4></center>
<hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>First Name : </span><input type="text" style="width:265px; height:30px;"  name="first" value="<?php echo $row['first_name']; ?>" Required/><br>
<span>Second Name : </span><input type="text" style="width:265px; height:30px;"  name="second" value="<?php echo $row['second_name']; ?>" /><br>
<span> KRA PIN : </span><input type="text" style="width:265px; height:30px;"  name="pin" value="<?php echo $row['pin']; ?>"><br>
<span>ID number: </span><input type	="text" style="width:265px; height:30px;" name="id_number" value="<?php echo $row['id_number']; ?>" /><br>
<span>Age : </span><input type	="text" style="width:265px; height:30px;" name="age" value="<?php echo $row['age']; ?>" /><br>
<span>Salary : </span><input type="text" style="width:265px; height:30px;" id="txt1" name="salary" value="<?php echo $row['salary']; ?>" onkeyup="sum();" Required/><br>

<span>position: </span><select  name="position" style="width:265px; height:30px; margin-left:-5px;" >
	<option value='admin'>Administrator</option>
			<option value='cashier'>Cashier</option>
</select><br>
<span>Branch : </span>
<select name="branch" style="width:265px; height:30px; margin-left:-5px;" >
	<option><?php echo $row['branch']; ?></option>
	<?php
	$results = $db->prepare("SELECT * FROM $ep");
		$results->bindParam(':userid', $res);
		$results->execute();
		for($i=0; $rows = $results->fetch(); $i++){
	?>
		<option><?php echo $rows['branch_name']; ?></option>
	<?php
	}
	?>
</select><br>


<div style="float:right; margin-right:10px;">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>