<!DOCTYPE html>
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
 include('adminpanel/header.html');
 ?>
    <div class="container">
  <h1>Member Registration</h1><br>
  <div class="row">
   <div class="col-md-4 mx-auto">
    <div class="myform form ">
       <form action="" method="post" name="login">
        <div class="form-group">
         <input type="text" name="firstname"  class="form-control my-input" placeholder="First Name">
        </div>
         <div class="form-group">
         <input type="text" name="lastname"  class="form-control my-input"  placeholder="Last Name">
        </div>
        <div class="form-group">
         <input type="text" name="gender"  class="form-control my-input"  placeholder="Sex">
        </div>
         <div class="form-group">
         <input type="text" name="contact"  class="form-control my-input"  placeholder="Contact">
        </div>
        <div class="form-group">
         <input type="email" name="email"  class="form-control my-input"  placeholder="Email">
        </div>
        <div class="form-group">
         <input type="text" name="joindate"  class="form-control my-input"  placeholder="Join Date">
        </div>
          <div class="form-group">
         <input type="text" name="package"  class="form-control my-input"  placeholder="Package id">
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
        
        if(isset($_POST["add"]))
      {
        $n=$_POST["firstname"];
        $n1=$_POST["lastname"];
        $n2=$_POST["contact"];
        $n3=$_POST["email"];
         $n4=$_POST["joindate"];
          $n5=$_POST["package"];
               $n6=$_POST["gender"];
        try{
        $qry=mysqli_query($con,"INSERT INTO `member`(`firstname`,`lastname`,`contact`,`email`,`joindate`,`gender`,`package`) 
          values('$n','$n1','$n2','$n3','$n4','$n6','$n5')")or die(mysqli_error($con));
      }
  catch (mysqli_sql_exception $e) {
    
        echo "package doesnt exist";
    
}
     if($qry==true)
    {
    {
    echo "
    <script>
    alert('Member Registered Successfully');
    window.location='/fitbeast/admin/newindex.php';
    </script>
  ";
}
    }
  
}


?>
    </div>
   </div>
  </div>
</div>


  </div>
  </html>


 <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  



