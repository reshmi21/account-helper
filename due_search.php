<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styleFront.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
	session_start();
require 'function_include.php';
$conn= new mysqli("localhost","root","","flat_account");
if(!isset($_SESSION['IS_LOGIN']))
	redirect('userLogin.php');
else
{
	include('include.html') ?>
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="form-group">
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-1">
	<label for "amt">Search <i class="fa fa-search"></i></label>
	</div>
	 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
	<input class="form-control w-100" type="text" id="key" placeholder="enter resident name or flat no" required />
	</div>
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-1">
	<label for "amt">Enter maintainance amount </label>
	</div>
	 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
	<input class="form-control w-100" type="text" id="amt" placeholder="enter amount" required />
	</div>
	</div>
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
	<div class="btn-group mr-3">
	<button class="form-control btn btn-primary " type="Submit" id="chk">check</button><br>
	<button class="form-control btn btn-light" type="Submit" id="reset">Reset</button>
	</div>
	</div>
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
	<table class="table text-center table-bordered table-hovered" id="demo">
	</table>
	</div>
</main>

<script>
$('#chk').click(function(){
	search=$('#key').val();
	pay=$('#amt').val();
	$.post('due_cal.php',{search:search,pay:pay},function(data){
	$('#demo').html(data);
});
});
$('#reset').click(function(){
	$('#amt').val('');
	$('#key').val('');
});
</script>
<?php
}
?>
</body>
</html>