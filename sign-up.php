<?php
$conn= new mysqli("localhost","root","","flat_account");
require 'function_include.php';
$msg="";
if(isset($_POST["submit"]))
{
	$username=$_POST["username"];
	$password=$_POST["pass_word"];
	$contact=$_POST["contact"];
	$sql="INSERT INTO users(username,password,contact)VALUES('$username','$password','$contact')";
	$res=mysqli_query($conn,$sql);
	if(!$res)
	{
		$msg="Please enter valid login details";
	}
	else
	{
		redirect('userLogin.php');
	}
}
	
?>
<!DOCTYPE HTML>
<html>
<HEAD>
</head>
<link rel="stylesheet" href="sign-up.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<body class="text-center">
    <form class="form-signup" action="#" method="POST">
	<h2> Account Helper <i class="fa fa-calculator"></i></h2>
	  <img class="mb-4" src="https://miro.medium.com/max/3840/1*MGv5b9bNEIRcYPVxQ50m0Q.jpeg" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Register Yourself</h1>
      <label for="inputUser" class="sr-only">Username</label>
      <input type="text" id="inputUser" class="form-control" name="username" placeholder="Enter username" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="pass_word" class="form-control" placeholder="Password" required>
	  <label for="inputContact" class="sr-only">Contact</label>
      <input type="text" id="inputContact" name="contact" class="form-control" placeholder="Contact-no" required>
	  <div class="mt-2 pt-3">
      <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign Up</button>
	  </div>
	  <p> <?php echo $msg ?>
	  <h4 class="mt-2 pt-3">Thanks for choosing us!</h4>
    </form>
  </body>
</html>

