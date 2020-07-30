<?php
$conn= new mysqli("localhost","root","","flat_account");
$amt="";
$month="";
$name="";
$flatno="";
if((isset($_POST["amt_val"]))and(isset($_POST["text"]))and(isset($_POST["name"]))and(isset($_POST["flat"])))
{
$amt=$_POST["amt_val"];
$month=$_POST["text"];
$name=$_POST["name"];
$flatno=$_POST["flat"];
$q="insert into deposit(name,flatno,amount_pay,month)values('$name','$flatno','$amt','$month')";
$upt=mysqli_query($conn,$q);
if($upt)
echo "Account Updated, Go for next";
}
else
echo "error".mysqli_error($conn);

?>
