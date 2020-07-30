   <!DOCTYPE html>
   
   <head>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styleFront.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
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
include('include.html') ?>
 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
<label for="month">Select month</label>
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
<table class="table text-center table-bordered table-hovered">
<tr>
<th>expenses</th>
<th>amount incurred</th>
</tr>
<tr>
<td id="clean">in cleaning</td>
<td><input type="checkbox" id="chk1">
<input type="text" id="exp1" placeholder="enter money spent" required></td>
</tr>
<tr>
<td id="water">in water supply</td>
<td><input type="checkbox" id="chk2">
<input type="text" id="exp2" placeholder="enter money spent" required></td>
</tr>
<tr>
<td id="sec">in security surviellance</td>
<td><input type="checkbox" id="chk3">
<input type="text" id="exp3" placeholder="enter money spent" required></td>
</tr>
<tr>
<td id="lift">in lift maintainence</td>
<td><input type="checkbox" id="chk4">
<input type="text" id="exp4" placeholder="enter money spent" required></td>
</tr>
<tr>
<td id="elecbill">electricity bills</td>
<td><input type="checkbox" id="chk5">
<input type="text" id="exp5" placeholder="enter money spent" required></td>
</tr>
<tr>
<td id="missc">miscellanous</td>
<td><input type="checkbox" id="chk6">
<input type="text" id="exp6" placeholder="enter money spent" required></td>
</tr>
<tr>
<td id="total"><strong>Total expense</strong></td>
<td> <p class="align-items-left mr-3" id="show"></p></td>
</tr>
</table>
</div>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
<button type="Submit" id="add" class="btn-btn primary" >ADD TO ACCOUNTS</button>

</div>
</main>
<script>
	  $(document).ready(function(){
	$('#exp1').hide();
	 $('#chk1').click(function(){
    var checked_status1 = this.checked;
    if(checked_status1 == true) {
	 $('#exp1').show();
	}

	  });
//$('#exp1').change(function(){
	
	//$.post('cal_exp.php',{val1:val1,act1:act1},function(data){
	//$('#show').html(data);
	//alert("The text has been changed"+val1+"value");
	 //});
	 
//});
//$(document).ready(function(){
	$('#exp2').hide();
$('#chk2').click(function(){
    var checked_status2 = this.checked;
    if(checked_status2 == true) {
	 $('#exp2').show();
	}
});
//$('#exp2').change(function(){
	 
	 //$.post('cal_exp.php',{val2:val2,act2:act2},function(data){
	//$('#show').html(data);
	//alert("The text has been changed.");
	 //});
//});
//$(document).ready(function(){
	$('#exp3').hide();
$('#chk3').click(function(){
    var checked_status3 = this.checked;
    if(checked_status3 == true) {
	 $('#exp3').show();
	}
});
//$('#exp3').change(function(){
	
	//$.post('cal_exp.php',{val3:val3,act3:act3},function(data){
	//$('#show').html(data);
	//alert("The text has been changed.");
	 //});
//});
//$(document).ready(function(){
	$('#exp4').hide();
$('#chk4').click(function(){
    var checked_status4 = this.checked;
    if(checked_status4 == true) {
	 $('#exp4').show();
	}
});
//$('#exp4').change(function(){
	 
	//$.post('cal_exp.php',{val4:val4,act4:act4},function(data){
	//$('#show').html(data);
	//alert("The text has been changed.");
	 //});
//});
//$(document).ready(function(){
	$('#exp5').hide();
$('#chk5').click(function(){
    var checked_status5 = this.checked;
    if(checked_status5 == true) {
	 $('#exp5').show();
	}
});
//$('#exp5').change(function(){
	
	 //$.post('cal_exp.php',{val5:val5,act5:act5},function(data){
	//alert("The text has been changed.");
	 ////});
//});
//$(document).ready(function(){
	$('#exp6').hide();
$('#chk6').click(function(){
    var checked_status6 = this.checked;
    if(checked_status6 == true) {
	 $('#exp6').show();
	}
});
$('#month').change(function() {
    var text = $("#month option:selected").text();
		// alert("month added"+text);
});

//$('#exp6').change(function(){
	
	// $.post('cal_exp.php',{val6:val6,act6:act6},function(data){
		 //$('#show').html(data);
	 //});
//});
 $('#add').click(function(){
	  val6=$('#exp6').val();
	 act6=$('#missc').text(); 
	 val5=$('#exp5').val();
	 act5=$('#elecbill').text();
	 val4=$('#exp4').val();
	 act4=$('#lift').text();
	  val3=$('#exp3').val();
	 act3=$('#sec').text();
	 val2=$('#exp2').val();
	 act2=$('#water').text();
	  val1=$('#exp1').val();
	 act1=$('#clean').text();
	 text = $("#month option:selected").text();
	 $.post('cal_exp.php',{val1:val1,act1:act1,val2:val2,act2:act2,val3:val3,act3:act3,val4:val4,act4:act4,val5:val5,act5:act5,val6:val6,act6:act6,text:text},
	 function(data){
	$('#show').html("<strong>"+data+"<strong>");
	//alert("The text has been changed.");
	 
});
 });

});
	</script>
</body>
</html>
<?php 
}
?>