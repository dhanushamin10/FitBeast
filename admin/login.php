<?php
	session_start();
include('db.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Animated Login Form</title>
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
				<h2 class="text-light">FitBeast<sup>x</sup>  Login&nbsp;&nbsp;&nbsp;</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
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
	$query="select * from validation where username= '$user' && password='$pwd'";
	$data=mysqli_query($con,$query);
	$total=mysqli_num_rows($data);
	if($total==1)
			{
			
				$_SESSION['user_name']=$user;
				header('location:newindex.php');
			}
			else
			{
				echo "
				<script>
				alert('Invalid Username/Password');
				header('location:login.php')
				</script>


				";
			}
}
?>
   
</body>
</html>

 <script type="text/javascript" src="js/main.js"></script>