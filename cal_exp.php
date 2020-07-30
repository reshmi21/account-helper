<?php
$conn= new mysqli("localhost","root","","flat_account");
$amt1="";
$amt2="";
$amt3="";
$amt4="";
$amt5="";
$amt6="";
$actv1="";
$actv2="";
$actv3="";
$actv4="";
$actv5="";
$actv6="";

if(((isset($_POST["val1"]))and(isset($_POST["act1"])))or((isset($_POST["val2"]))and(isset($_POST["act2"])))or((isset($_POST["val3"]))and(isset($_POST["act3"])))
	or((isset($_POST["val4"]))and(isset($_POST["act4"])))or((isset($_POST["val5"]))and(isset($_POST["act5"])))or((isset($_POST["val6"]))and
(isset($_POST["act6"])))and(isset($_POST["text"])))
{
	$amt1=$_POST["val1"];
	$actv1=$_POST["act1"];
	$amt2=$_POST["val2"];
	$actv2=$_POST["act2"];
	$amt3=$_POST["val3"];
	$actv3=$_POST["act3"];
	$amt4=$_POST["val4"];
	$actv4=$_POST["act4"];
	$amt5=$_POST["val5"];
	$actv5=$_POST["act5"];
	$amt6=$_POST["val6"];
	$actv6=$_POST["act6"];
	$month=$_POST["text"];
$sum=$amt1+$amt2+$amt3+$amt4+$amt5+$amt6;
$q="insert into expenses(expenses,amount_spent,month) values('$actv1','$amt1','$month'),('$actv2','$amt2','$month'),('$actv3','$amt3','$month'),
('$actv4','$amt4','$month'),('$actv5','$amt5','$month'),('$actv6','$amt6','$month')";
$add=mysqli_query($conn,$q);
if($add)
{
echo $sum;
}
	
else
	echo("try again".mysqli_error($conn));
}
