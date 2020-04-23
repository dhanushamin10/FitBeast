<?php
	session_start();


	include("db.php");



 
?>


<!DOCTYPE html>
<html>
<head>
	<title>FitBeast</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
	
	<div class="container">
		<div class="img">
      <img src="img/2.jpg">
			
		</div>
		<div class="login-content">
			<form action="" method="post">
				<img src="https://cdn2.iconfinder.com/data/icons/social-flat-buttons-3/512/anonymous-512.png">
				<h2 class="text-light">FitBeast&nbsp; <sup>x</sup> Trainer Login&nbsp;&nbsp;&nbsp;</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Userid</h5>
           		   		<input type="text" name="username" class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" name="password" sclass="input">
            	   </div>
            	</div>
           
            	<input type="submit" class="btn" name="submit" value="Login">
            </form>
        </div>
    </div>
    <?php
if(isset($_POST['submit']))
{
	$user=$_POST['username'];
	$pwd=$_POST['password'];

	$query="select * from trainer where username= '$user' && password='$pwd'";
	$data=mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($data);
	$total=mysqli_num_rows($data);
	$packageid=$row['package'];
	
	if($total==1)
			{
			
				$_SESSION['user_name']=$user;
				header('location:index.php');
			}
			else
			{
				echo "
				<script>
				alert('Invalid Username/Password');
				header('location:trainerlogin.php')
				</script>


				";
			}
}
?>
   
</body>
</html>

 <script type="text/javascript" src="js/main.js"></script>