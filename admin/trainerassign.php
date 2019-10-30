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
 $connect = mysqli_connect("localhost", "root", "", "fitbeasttest1");  
 $query ="SELECT * FROM trainer where trainerid not in ( select trainerid from trains group by trainerid having count(*)>=5)";  

 $result = mysqli_query($connect, $query);  
 ?>  
 
           <div class="container-fluid">

        
            
         
              
                <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-dark" style="text-align: center;">Available trainers</h6>
            </div>
                <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-light" id="dataTable" width="100%" cellspacing="0"> 
                          <thead class="thead-dark">  
                               <tr>  
                                    <td>EmployeeId</td>  
                                    <td>First Name</td>  
                                    <td>Last Name</td>  
                                 
                                    <td>Speciality</td>
                               
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["trainerid"].'</td>  
                                    <td>'.$row["fname"].'</td>  
                                    <td>'.$row["lname"].'</td>  
                             
                                    <td>'.$row["specialization"].'</td> 
                                   

                                   
                                    
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


      

  <div class="row">
   <div class="col-md-4 mx-auto">
    <div class="myform form ">
       <form action="" method="post" name="login">
        <div class="form-group">
         <input type="text" name="memberid"  class="form-control my-input" placeholder="MemberID" >
        </div>
         <div class="form-group">
         <input type="text" name="trainerid"  class="form-control my-input"  placeholder="TrainerID">
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
        $n=$_POST["memberid"];
        $n1=$_POST["trainerid"];
        
        try{
        $qry=mysqli_query($con,"INSERT INTO `trains`(`memberid`,`trainerid`) 
          values('$n','$n1')")or die(mysqli_error($con));
      }
  catch (mysqli_sql_exception $e) {
    
        echo "";
    
}
     if($qry==true)
    {
    {
    echo "
    <script>
    alert('Trainer Assigned Successfully');
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
  



