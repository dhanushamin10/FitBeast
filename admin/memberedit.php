<!DOCTYPE html>
<?php
session_start();

if(!isset($_SESSION['user_name'])){
   header("Location:login.php");
}
?>s
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
$sql=mysqli_query($con,"SELECT * FROM `member` WHERE memberid='$id'");
$res=mysqli_fetch_array($sql);
?>
  <h1>Update Member Details</h1><br>
  <div class="row">
   <div class="col-md-4 mx-auto">
    <div class="myform form ">
       <form action="" method="post" name="login">
        <div class="form-group">
         <input type="text" name="firstname"  class="form-control my-input" value="<?php echo $res['firstname']?>">
        </div>
         <div class="form-group">
         <input type="text" name="lastname"  class="form-control my-input"  value="<?php echo $res['lastname']?>">
        </div>
         <div class="form-group">
         <input type="text" name="contact"  class="form-control my-input" value="<?php echo $res['contact']?>">
        </div>
        <div class="form-group">
         <input type="email" name="email"  class="form-control my-input"  value="<?php echo $res['email']?>">
        </div>
        <div class="form-group">
         <input type="text" name="joindate"  class="form-control my-input"  value="<?php echo $res['joindate']?>">
        </div>
          <div class="form-group">
         <input type="text" name="package"  class="form-control my-input" value="<?php echo $res['package']?>">
        </div>
         <div class="form-group">
         <input type="text" name="hours"  class="form-control my-input" value="<?php echo $res['hours']?>">
        </div>
        
        <div class="text-center ">
         <button type="submit" name="add" class=" btn btn-block send-button tx-tfm">Update</button>
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
  $n4=$_POST['package'];
   $n5=$_POST['hours'];
  $qry=mysqli_query($con,"UPDATE `member` SET `firstname`='$n',`lastname`='$n1',`contact`='$n2',`email`='$n3',`package`='$n4',`hours`='$n5' WHERE `memberid`='$id'")or die(mysqli_error($con));
  if($qry==true)
  {

    echo "
    <script>
    alert('Updatation Success');
    window.location='/fitbeast/admin/clientele.php';
    </script>
    ";
  }

else
{
  echo "
  <script>
  alert('failed');
  window.location='/fitbeast/admin/clientele.php';
  </script>
  ";
}
} 
?>