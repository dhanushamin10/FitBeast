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
  <h1>Add Equipment</h1><br>
  <div class="row">
   <div class="col-md-4 mx-auto">
    <div class="myform form ">
       <form enctype="multipart/form-data" method="post" name="login">
        <div class="form-group">
         <input type="text" name="name"  class="form-control my-input" placeholder="Equipment Name">
        </div>
         <div class="form-group">
         <input type="text" name="handler"  class="form-control my-input"  placeholder="Equipment Handler ID">
        </div>
        <div class="form-group">
         <input type="file" name="image"  class="form" id="image" placeholder="Image">
        </div>
        
        <div class="text-center ">
         <button type="submit" name="add" id="insert" class=" btn btn-block send-button tx-tfm">Submit</button>
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
        $n=$_POST["name"];
        $n1=$_POST["handler"];
         $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        
        try{
        $qry=mysqli_query($con,"INSERT INTO `equipment`(`name`,`handler`,`image` ) 
          values('$n','$n1','$file')")or die(mysqli_error($con));
      }
  catch (mysqli_sql_exception $e) {
    
        echo "package doesnt exist";
    
}
     if($qry==true)
    {
    {
    echo "
    <script>
    alert('Equipment added Successfully');
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
   <script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script> 

