         <?php 
$id=$_GET['id'];


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="post">
		
		<input type="text" name="hours" placeholder="hours">
		<input type="submit" name="submit">

</body>

<?php

 $con = mysqli_connect("localhost","root","","fitbeasttest1");

global $value;

$qry2="select * from member where memberid='$id'";
$res=mysqli_query($con,$qry2);
$data=mysqli_fetch_assoc($res);
$hours=$data['hours'];
if(isset($_POST['submit']))
{
  $n=$_POST['hours']; 
  $value=$hours-$n;

 
  $qry=mysqli_query($con,"UPDATE `member` SET `hours`='$value' WHERE `memberid`='$id'")or die(mysqli_error($con));
  
 }


?>
</html>