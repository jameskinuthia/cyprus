<?php
	session_start();
	require_once '../connect.php';
	$br=$_SESSION['BRANCHES']."branch";
	$wr="warehouse";
	$id=$_SESSION['product_id'];
	$result1 = $db->prepare("SELECT * FROM products WHERE product_id = $id ");
				$result1->execute();
				$row = $result1->fetch();

	?>
<!DOCTYPE html>
<html>
<head>

	<title></title>
	<link href="../css/style.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body>
<form action="sharedb.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> share</h4></center>
<hr>
<div id="ac">
<span>Brand Name: </span><?php echo $row['product_code'];?><br>
<span>Generic Name</span><?php echo $row['gen_name'];?><br>
<span>number of items : </span><input type="number" min="1" style="width:265px; height:30px;" name="number" placeholder="<?php echo $row['qty']; ?>" Required><br>
<span>Branch : </span>
<select  name="supplier" style="width:265px; height:30px; margin-left:-5px;" >
	
<?php
mysql_close();
				require_once 'db.php';
	           $result = $db->prepare("SELECT * FROM $br ORDER BY id DESC");
				$result->execute();
				
					# code...
					for($i=0; $row = $result->fetch(); $i++){
						?>
						<option value="<?php echo $row['branch_code']; ?>"><?php echo $row['branch_name']; ?></option>
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


