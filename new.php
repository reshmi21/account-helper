<?php
$conn= new mysqli("localhost","root","","flat_account");
$name="";
$flat="";
$number="";
if((isset($_POST["name"]))and(isset($_POST["flatno"]))and(isset($_POST["contact"])))
{
$name=$_POST["name"];
$flat=$_POST["flatno"];
$number=$_POST["contact"];
$q="insert into personal_info(name,flat_no,contact)values('$name','$flat','$number')";
$add=mysqli_query($conn,$q);
if(!$add)
echo "Error caused! ";
//echo "inserted";
}
?>
