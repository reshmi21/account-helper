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
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 mb-1">
<label for="month">Select month<i class="fa fa-calendar"></i></label>
</div>
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center ">
<select class="form-control" id="month">
<option>chose month</option>
<option>january</option>
<option>february</option>
<option>march</option>
<option>april</option>
<option>may</option>
<option>june</option>
<option>july</option>
<option>august</option>
<option>september</option>
<option>october</option>
<option>november</option>
<option>december</option>
</select>
</div>
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
<button class="btn btn-success" type="Submit" id="chkbal">check balance</button></td>
</div>
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
 <div class="card align-self-center" id="ShowDetail" >
	<h3 class="card-header text-left" id="heading">
		Summary of Account for <span id="showMonth"></span>
		</h3>
		<div class="card-block">
		<p id="btn"></p>
      </div>
	  </div>
	  </div>
</main>

<script>
$(document).ready(function()
{
	$('#heading').hide();
$('#month').change(function() {
    var text = $("#month option:selected").text();
	text=text.substring(0,1).toUpperCase()+text.substring(1);
	$('#showMonth').html(text);
		 //alert("month added"+text);
});
   $('#chkbal').click(function(){
	   var text=$("#month option:selected").text();
	 $.post('total_cal.php',{text:text},function(data){
		 $('#heading').show();
	$('#btn').html("<strong>"+data+"<strong>");
	//alert("The text has been changed."+text);
	 });
});

});	
</script>
<?php
}
?>
</body>
</html>