
<!DOCTYPE html>
   
   <head>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styleFront.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
 include('include.html')
 ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
	<h4>Add New Resident</h4>
	</div>
	<div class="form-group">
	 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
	<input class="form-control w-100" type="text" id="res_name" placeholder="enter resident name" required /><br>
	<input class="form-control w-100" type="text" id="num" placeholder="enter flat number(ex:4-B)" required /><br>
	<input class="form-control w-100" type="text" id="contact" placeholder="enter contact number" required /><br>
	</div>
	</div>
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
	<div class="btn-group mr-2">
	<button class="btn btn-primary" type="Submit" id="add">ADD</button><br>
	<button class="btn btn-light" type="Submit" id="reset">Reset</button><br>
	<p id="demo"></p>
	</div>
	</div>
</main>
<script>

$('#add').click(function(){
	name=$('#res_name').val();
	flatno=$('#num').val();
	contact=$('#contact').val();
	$.post('new.php',{name:name,flatno:flatno,contact:contact},function(data){
	$('#demo').html(data);
	//alert("data changed"+name+flatno+contact);
});
});
$('#reset').click(function(){
	$('#res_name').val('');
	$('#num').val('');
	$('#contact').val('');	
	$('#demo').val('');
});
	$('#num').keyup(function(){
	fnum=$('#num').val();
	$.post('taken.php',{fnum:fnum},function(data){	
		//alert("same flat number");
		$('#demo').html(data);
	});
	});
</script>
<?php
}
?>
</body>
</html>