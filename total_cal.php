<?php
$conn= new mysqli("localhost","root","","flat_account");
$month="";
$sum_dep="";
$sum_exp="";
$bal_amt="";
if(isset($_POST["text"]))
{
$month=$_POST["text"];
$q="SELECT SUM(amount_pay) as amount_pay from deposit where month='$month'";
$get=mysqli_query($conn,$q);
$row=mysqli_fetch_array($get);
$sum_dep=$row['amount_pay'];
echo "TOTAL DEPOSITED \n ".$sum_dep.'<br>';
$q1="SELECT SUM(amount_spent) as amount_spent from expenses where month='$month'";
$get1=mysqli_query($conn,$q1);
$row1=mysqli_fetch_array($get1);
$sum_exp=$row1['amount_spent'];
echo "TOTAL EXPENDITURE \n".$sum_exp.'<br>';
$bal_amt=$sum_dep-$sum_exp;
echo "BALANCE FOR \n ".$month." is ".$bal_amt.'<br>';
$q2="insert into total_cost(month,deposit,expenses,balance) values('$month','$sum_exp','$sum_dep','$bal_amt')";
$add=mysqli_query($conn,$q2);
if((!empty($sum_exp))or(!empty($sum_dep)))
{
if($sum_exp>$sum_dep)
echo "flat running on dues\n".$bal_amt;
elseif($sum_exp==$sum_dep)
echo "optimum condition\n".$bal_amt;
else
echo "amount of money in fund\n".$bal_amt;
}
else
echo "no account yet updated";
}

else
echo "error".mysqli_error($conn);
?>
  
  
  