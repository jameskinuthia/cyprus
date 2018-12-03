<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign  CYPRUS</title>
  
  
  
      <link rel="stylesheet" href="css1/style.css">

  
</head>

<body>

  	

<form action="dbct.php" method="post">
  <h2>Sign Up</h2>
  		<p>
			<label for="First" class="floatLabel">First name</label>
			<input id="First" name="firstname" type="text" required/>
		</p>
  		<p>
			<label for="Company" class="floatLabel">Second name</label>
			<input id="Company" name="secondname" type="text" required/>
		</p>
  		<p>
			<label for="Company" class="floatLabel">Company</label>
			<input id="Company" name="company" type="text" required/>
		</p>
		<p>
			<label for="Tax" class="floatLabel">Tax pin</label>
			<input id="Tax" name="pin" type="text" required/>
		</p>
		<p>
			<label for="Email" class="floatLabel">Email</label>
			<input id="Email" name="email" type="text" required/>
		</p>
		<p>
			<label for="password" class="floatLabel">Password</label>
			<input id="password" name="password" type="password">
			<span>Enter a password longer than 8 characters</span>
		</p>
		<p>
			<label for="confirm_password" class="floatLabel">Confirm Password</label>
			<input id="confirm_password" name="confirm_password" type="password">
			<span>Your passwords do not match</span>
		</p>
		<p>
			<input type="submit" value="Create My Account" id="submit">
		</p>
	</form>
  <script src='Bootstrap/js/jquery.min.js'></script>

  

    <script  src="js1/index.js"></script>




</body>

</html>
