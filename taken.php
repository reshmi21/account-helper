<?php
$conn= new mysqli("localhost","root","","flat_account");
$number="";
if(isset($_POST["fnum"]))
{
$number=$_POST["fnum"];
$q="select * from personal_info where flat_no='$number'";
$find=mysqli_query($conn,$q);
if($row=mysqli_fetch_assoc($find))
   {
	   //if($row['flat_no']==$number)
	   //
        echo "wrong flat number";
        //}
   } 
}
   ?>