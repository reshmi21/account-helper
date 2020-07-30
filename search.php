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
$msg="";	
include('include.html') ?>
 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
	<h4 class="col-12 col-sm-6">Find Account</h4>
	</div>
	 <form id="form" method="POST" action="#">
	  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
	<input class="form-control w-100" type="text" aria-label="Search" type="text" id="key" name="searchKey" placeholder="enter keyword(Resident name/flat number)" required /><br>
	 <div class="btn-group mr-2">
                <button id="search" class="btn btn-sm btn-outline-secondary">Search</button>
                <button id="reset" class="btn btn-sm btn-outline-secondary">Reset</button>
              </div>
		
		<p id="demo" style="color:red"><?php echo $msg ?>
		
	</p>
	</div>
	</form>
	
	
<?php 
$name="";
if(isset($_POST["searchKey"]))
{
if(!(preg_match('/^[a-zA-Z0-9-]*$/',$_POST["searchKey"])))
{
$msg="Enter a valid keyword";
}
else
{	
$name=$_POST["searchKey"];
$q="select * from personal_info where name like '%$name%' or flat_no like '%$name%'";
$find=mysqli_query($conn,$q);
?>
<div class="table-responsive">
<table class="table text-center table-bordered table-hovered w-auto">
<tr>
<th class="th-lg">name</th>
<th class="th-lg">flat_no</th>
<th class="th-lg">contact</th>
<th class="th-lg">amount paid</th>
</tr>
<?php 
while($row=mysqli_fetch_array($find))
	{
    echo "<tr>";
    echo "<td id='name'>" . $row['name'] ."</td>";
    echo "<td id='num'>" . $row['flat_no'] . "</td>";
    echo "<td>" . $row['contact'] . "</td>";
	 #echo "<td>" . $row['amount_paid'] . "</td>";
	?>
	<td><input type="checkbox" id="checkEnable">
	<input type="text" id="amt" placeholder="enter money paid" required style="display:none;"/>
	</tr>
		<?php
		
	}
?>
	
</table>
</div>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
<div class="row">
<div class="col-12 col-sm-3">
<label for="month">Select month</label>
</div>
<div class="col-12 col-sm-9">
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
</div>
</div>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
<div class="row">
<div class="col-6 offset-sm-9 col-sm-3">
<button type="Submit" class="btn btn-success" id="deposit">Add</button></td>
</div>
</div>
</div>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
<div id="btn">
</div>
</div>

<?php
}
}
?>
</main>
<script>
$(document).ready(function(){
	$('#amt').hide();
	 $('#checkEnable').click(function(){
    var checked_status = this.checked;
    if(checked_status == true) {
	 $('#amt').show();
	}
});
$('#month').change(function() {
    var text = $("#month option:selected").text();
		
});

    $('#deposit').click(function(){
	 amt_val=$('#amt').val();
	 var text = $("#month option:selected").text();
	 var name=$("#name").text();
	 var flat=$("#num").text();
	 $.post('receipt.php',{name:name,flat:flat,amt_val:amt_val,text:text},function(data){
	$('#btn').html("<strong>"+data+"</strong>");
	 var currentURL = window.location.href;
    var index = currentURL.indexOf("?searchKey=");
    if(index > -1) {
        window.location.href = currentURL.substring(0, index);
    }

	//alert("The text has been changed."+name +flat);
	 });
});

});	
</script>
</main>
<?php
}
?>
</body>
</html>
