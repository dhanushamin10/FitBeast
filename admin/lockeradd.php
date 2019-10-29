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

</head>
<?php
 include('adminpanel/navbar.html');
 include('adminpanel/header.html');
 ?>
  
   <div class="container">
    
      <?php  
 $connect = mysqli_connect("localhost", "root", "", "fitbeasttest1");  
 $query ="SELECT * FROM locker where lockerid not in (select lockerid from assign )";  
 $result = mysqli_query($connect, $query);  
 ?>  
 
           <div class="container-fluid">

        
            
           
              
                <div class="card shadow mb-4">
            
              <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-dark" style="text-align: center;">Available Lockers</h6>
            </div>
           
                <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-light" id="dataTable" width="100%" cellspacing="0"> 
                          <thead class="thead-dark">  
                               <tr>  
                                    <td>Locker id</td>  
                                    <td>Type</td>  
                                   
                                   
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["lockerid"].'</td>  
                                    <td>'.$row["type"].'</td>  
                              
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                 </div>
           </div> 
           </div>
           </div>
 <h5 style="text-align: center;">Assign Locker</h5><br>
           <div class="row">
   <div class="col-md-4 mx-auto">
    <div class="myform form ">
       <form action="" method="post" name="login">
        <div class="form-group">
         <input type="text" name="memberid"  class="form-control my-input" placeholder="Member ID">
        </div>
         <div class="form-group">
         <input type="text" name="lockerid"  class="form-control my-input"  placeholder="Locker ID">
        </div>
        
        <div class="text-center ">
         <button type="submit" name="add" class=" btn btn-info send-button tx-tfm">Submit</button>
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
        $n1=$_POST["lockerid"];
        
        try{
        $qry=mysqli_query($con,"INSERT INTO `assign`(`memberid`,`lockerid`) 
          values('$n','$n1')")or die(mysqli_error($con));
      }
  catch (mysqli_sql_exception $e) {
    
        echo "package doesnt exist";
    
}
     if($qry==true)
    {
    {
    echo "
    <script>
    alert('Locker assigned Successfully');
    window.location='/fitbeast/admin/newindex.php';
    </script>
  ";
}
    }
  
}


?>





         </div>

         
            
      </body>  
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
   

