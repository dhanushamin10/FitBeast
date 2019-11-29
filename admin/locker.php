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

</head>
<?php
 include('adminpanel/navbar.html');
 include('adminpanel/header.php');
 ?>
  

 <?php  
 $connect = mysqli_connect("localhost", "root", "", "fitbeasttest1");  
 $query ="select A.lockerid,L.type,A.memberid,M.firstname,M.lastname from assign A,locker L,member M where L.lockerid=A.lockerid and A.memberid=M.memberid";
 $result = mysqli_query($connect, $query);  
 ?>  
 
           <div class="container-fluid">

        
            
           <h1 align="center">Locker Management</h1>
              
                <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
                <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-light" id="dataTable" width="100%" cellspacing="0"> 
                          <thead class="thead-dark">  
                               <tr>  
                                    <td>Lockerid</td>  
                                    <td>Type</td>  
                                    <td>Memberid</td>  
                                    <td>First Name</td>  
                                    <td>Last Name</td>  
                                    <td>DeAllocate</td>
                                  
                                   
                                   
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["lockerid"].'</td>  
                                    <td>'.$row["type"].'</td>  
                                    <td>'.$row["memberid"].'</td>  
                                    <td>'.$row["firstname"].'</td>  
                                    <td>'.$row["lastname"].'</td>  
                                    

                                    <td><a class="btn btn-info" href="deletelocker.php?id='.$row['lockerid'].'">DeAllocate</a></td>
 
                                    
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                 </div>
           </div> 
           </div>
           </div>
         </div>

      ]







  </div>
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
