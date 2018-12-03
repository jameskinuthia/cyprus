<!DOCTYPE html>
<html lang="en" >
<?php
require_once('auth.php');
require_once('db.php');

  
  //Select database
 $br="branch";
  $branch=$_SESSION['BRANCHES'].$br;
?>
<head>

  <meta charset="UTF-8">
  <title>Cyprus pos</title>
  
  
  
      <link rel="stylesheet" href="css2/style.css">
      <link href="vendors/uniform.default.css" rel="stylesheet" media="screen">
  <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link href="css/bootstrap-responsive.css" rel="stylesheet">

  <!-- combosearch box--> 
  
    <script src="vendors/jquery-1.7.2.min.js"></script>
    <script src="vendors/bootstrap.js"></script>
     <style type="text/css">
      body {
       background: #384047;
  font-family: sans-serif;
  font-size: 10px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>

  
</head>

<body>

 
  <div class="container">

    <form id="signup" method="post" action="branchdb.php">

        <div class="header">
        
            <h3>Please Select Your branch </h3>
            
            <p>You want to fill out this form</p>
            
        </div>
        
        <div class="sep"></div>

        <div class="inputs">
          <?php
          
        $result = $db->prepare("SELECT * FROM $branch ORDER BY id DESC");
        $result->execute();
        ?>
        <select style="width:300px" class="chzn-select" name="branch">
             
        <?php
        for($i=0; $row = $result->fetch(); $i++)
        {
        ?>
        <option value="<?php echo $row['branch_code'];?>"><?php echo $row['branch_name'];  ?></option>
        <?php
         }
          ?>
           </select>
            
            <button id="submit" type="submit" >next</button>
        
        </div>

    </form>

</divy>

</html>
