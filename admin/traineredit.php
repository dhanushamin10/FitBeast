<!DOCTYPE html>
<?php
session_start();

if(!isset($_SESSION['user_name'])){
   header("Location:login.php");
}
?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>FitBeast A Complete Solution for Gym Owners</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <link href="css/form.css" rel="stylesheet">

</head>
 
<?php
 include('adminpanel/navbar.html');
 include('adminpanel/header.php');
 ?>
    <div class="container">
         <?php 
$id=$_GET['id'];

include("db.php");
$sql=mysqli_query($con,"SELECT * FROM `trainer` WHERE trainerid='$id'");
$res=mysqli_fetch_array($sql);
?>
  <h1>Trainer Registration</h1><br>
  <div class="row">
   <div class="col-md-4 mx-auto">
    <div class="myform form ">
       <form action="" method="post" name="login">
        <div class="form-group">
         <input type="text" name="firstname"  class="form-control my-input" value="<?php echo $res['fname']?>"  placeholder="First Name">
        </div>
         <div class="form-group">
         <input type="text" name="lastname"  class="form-control my-input" value="<?php echo $res['lname']?>" placeholder="Last Name">
        </div>
         <div class="form-group">
         <input type="text" name="contact"  class="form-control my-input" value="<?php echo $res['contact']?>" placeholder="Contact">
        </div>
        <div class="form-group">
         <input type="email" name="email"  class="form-control my-input" value="<?php echo $res['email']?>" placeholder="Email">
        </div>
        <div class="form-group">
         <input type="text" name="specialization"  class="form-control my-input" value="<?php echo $res['specialization']?>" placeholder="Specialization">
        </div>
          <div class="form-group">
         <input type="text" name="salary"  class="form-control my-input" value="<?php echo $res['salary']?>" placeholder="Salary">
        </div>
         
        
        <div class="text-center ">
         <button type="submit" name="add" class=" btn btn-block send-button tx-tfm">Submit</button>
        </div>
        <div class="col-md-12 ">
         <div class="login-or">
          <hr class="hr-or">
         
         </div>
        </div>
        
        
          
       </form>
         <?php
include("db.php");
$id=$_GET['id'];
if(isset($_POST['add']))
{
  $n=$_POST['firstname'];
  $n1=$_POST['lastname'];
  $n2=$_POST['contact'];
  $n3=$_POST['email'];
  $n4=$_POST['specialization'];
    $n5=$_POST['salary'];
  $qry=mysqli_query($con,"UPDATE `trainer` SET `fname`='$n',`lname`='$n1',`contact`='$n2',`email`='$n3',`specialization`='$n4',`salary`='$n5' WHERE `trainerid`='$id'")or die(mysqli_error($con));
  if($qry==true)
  {

    echo "
    <script>
    alert('Updatation Success');
    window.location='/fitbeast/admin/trainer.php';
    </script>
    ";
  }

else
{
  echo "
  <script>
  alert('failed');
  window.location='/fitbeast/admin/trainer.php';
  </script>
  ";
}
} 
?>

