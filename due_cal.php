
<?php
$conn= new mysqli("localhost","root","","flat_account");
$amt="";
$key="";
$sum=0;
$count=0;
if((isset($_POST["pay"]))and(isset($_POST["search"])))
{
$amt=$_POST["pay"];
$key=$_POST["search"];
$q="select * from deposit where name like '%$key%' or flatno like '%$key%'";
$get=mysqli_query($conn,$q);

$table="<tr>";
$table.="<th>"."amount due"."</th>";
$table.="<th>"."month"."</th>";
$table.="</tr>";
while($row=mysqli_fetch_array($get))
{
  if($row['amount_pay']<$amt)
  { 
     $table.="<tr>";
    $table.="<td>" .($amt-$row['amount_pay']). "</td>";
	 $table.= "<td>" . $row['month'] . "</td>";
    $sum=$sum+($amt-$row['amount_pay']);
	$count=$count+1;
  }
}
$table.="<tr>";
$table.="<td><strong>"."Total dues"."</strong></td>";
  $table.="<td><strong>" . $sum . "</strong></td>";
	$table.="</tr>";
	$table.="<tr>";
	$table.="<td><strong>"."Total Period"."</strong></td>";
	$table.= "<td><strong>" . $count ."months"."</strong></td>";
	$table.="</tr>";

echo $table;
}
else
echo "error".mysqli_error($conn);
?>

