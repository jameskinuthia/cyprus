<html>
<head>
<title>
POINT OF SALE SYSTEM
</title>
<?php
	require_once('auth.php');
	$br="branch";
  $branch=$_SESSION['BRANCHES'].$br;
?>
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">


<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>



 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>	


</head>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
} 
$finalcode='RS-'.createRandomPassword();
?>
<body>
<?php include('navfixed.php');?>
<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
          <div class="well sidebar-nav">
              <ul class="nav nav-list">
              <li><a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard  </a></li> 
			<li><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Sales </a>  </li>             
			<li><a href="products.php"><i class="icon-list-alt icon-2x"></i> Products</a>                                     </li>
			<li class="active"><a href="customer.php"><i class="icon-group icon-2x"></i> Customers </a>                                    </li>
			<li><a href="supplier.php"><i class="icon-group icon-2x"></i> Suppliers</a>                                    </li>
			<li><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Sales Report</a>                </li>
			<?php
			if (($_SESSION['SESS_MEMBER_ROLE'] == 'admin') or ($_SESSION['SESS_MEMBER_ROLE'] == 'owner')) {
				# code...
				?>
				<li>
					<a href="employee.php"><i class="icon-group icon-2x"></i>add employee</a>
				</li>
				<li>
					<a href="createbranch.php"><i class="icon-group icon-2x"></i>add branch</a>
				</li>
				<?php
			}
			?>
					<br><br><br><br><br><br>		
			<li>
			 <div class="hero-unit-clock">
		
			<form name="clock">
			<font color="white">Time: <br></font>&nbsp;<input style="width:150px;" type="submit" class="trans" name="face" value="">
			</form>
			  </div>
			</li>
			
				
				</ul>     
          </div><!--/.well -->
        </div><!--/span-->
	<div class="span10">
	<div class="contentheader">
			<i class="icon-group"></i> Branches
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Branches</li>
			</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
<?php 
			include('db.php');
				$result = $db->prepare("SELECT * FROM $branch ORDER BY id DESC");
				$result->execute();
				$rowcount = $result->rowcount();
			?>
			<div style="text-align:center;">
			Total Number of Branches: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $rowcount;?></font>
			</div>
</div>
<input type="text" name="filter" style="padding:15px;" id="filter" placeholder="Search branch..." autocomplete="off" />

<?php if(($_SESSION['SESS_MEMBER_ROLE'] == 'admin') or ($_SESSION['SESS_MEMBER_ROLE'] == 'owner')) { ?>

<a rel="facebox" href="addbranch.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Add Branch</button></a><br><br>
<?php } ?>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="17%"> Branch name </th>
			<th width="10%"> location </th>
			<th width="23%"> number of employee</th>
			<!-- <th width="9%"> Total </th> -->
			<?php if(($_SESSION['SESS_MEMBER_ROLE'] == 'admin') or ($_SESSION['SESS_MEMBER_ROLE'] == 'owner')) { ?>
				<th width="14%"> Action </th>
			<?php } ?>
		</tr>
	</thead>
	<tbody>
		
			<?php
				include('db.php');
				$result = $db->prepare("SELECT * FROM $branch ORDER BY id DESC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['branch_name']; ?></td>
			<td><?php echo $row['location']; ?></td>
			<td><?php echo $row['no_staff']; ?></td>

			<?php if(($_SESSION['SESS_MEMBER_ROLE'] == 'admin') or ($_SESSION['SESS_MEMBER_ROLE'] == 'owner')) { ?>
				<td>
					<a rel="facebox" href="editsupplier.php?id=<?php echo $row['suplier_id']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> View </button></a>
				<a href="#" id="<?php echo $row['id']; ?>" class="delbutton" title="Click To Delete"><button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Delete</button></a></td>
			<?php } ?>

			</tr>
			<?php
				}
			?>
		
	</tbody>
</table>
<div class="clearfix"></div>

</div>
</div>
</div>
<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Are you sure want to delete? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deletebranch.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
</body>
<?php include('footer.php');?>

</html>