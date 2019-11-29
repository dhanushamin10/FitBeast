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
    <link href="css/report.css" rel="stylesheet">

</head>
<body>
<?php
 include('adminpanel/navbar.html');

 ?>

   <!-- Content Row -->
    <div class="container-fluid" id="div1">

          <!-- Page Heading -->
        <nav class="navbar navbar-expand navbar  topbar mb-4 static-top shadow">
          <h2 style="text-align: center;"></h2>

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

  
        
            <button onclick="printcontent('div1')" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Report</button>

         </ul>
       </nav>


       <h1 style="text-align: center; " class="text-primary">Trainers Report </h1><br>
<p>As generated on</p>
        <p id="demo"></p>
       <h2 style="text-align: center;">Trainer info</h2>
       <div class="card-body">
  <div class="table-responsive">
                <table class="table table-striped table-light" id="dataTable" width="100%" cellspacing="10"> 
                  <thead class="dark">  
                    <th>First Name</th>
                    <th>Last Namw</th>
                    <th>Specialization</th>
                    <th>Salary</th>
                  </thead>
      
       <?php
        include('db.php');
        $qry="select * from trainer T";
        $exec=mysqli_query($con,$qry);
        $exec2=mysqli_query($con,"select * from trainer T,trains T1,Member M,package P where T.trainerid=T1.trainerid and M.memberid=T1.memberid and M.package=P.packageid");
        $exec3=mysqli_query($con,"select * from trainer t,equipment e where e.handler=t.trainerid");
        while($row=mysqli_fetch_array($exec))
        {
          echo '
              <tr>
              <td>'.$row["fname"].' </td>
              <td> '.$row["lname"].'</td>
              <td>Specializes in '.$row["specialization"].'</td>
              <td>Cost to Company : '.$row["salary"].' /- month</td>
              <tr>

             
            ';

          
         }
         ?>

       </table>
     </div>
     <h3 style="text-align: center;"> Trainer Activity </h3>
       <div class="table-responsive">
                <table class="table table-striped table-light" id="dataTable" width="100%" cellspacing="10"> 
                  <thead class="dark">  
                    <th>Trainer ID</th>
                    <th>Trainer Name</th>
                    <th>Trained CLient</th>
                    <th>Package</th>
                  </thead>
     <?php
         while ($row2=mysqli_fetch_array($exec2)) {
          echo '<tr> 
                        <td>
                                    '.$row2["trainerid"].' </td>


                          <td>         '.$row2["fname"].'
                                    '.$row2["lname"].'</td>

                    <td>
                                    '.$row2["firstname"].'

                                    '.$row2["lastname"].'</td>
                        <td> '.$row2["name"].'</td>


            </tr>   ';



           # code...
         }
        ?></table>
<h3 style="text-align: center;">Equipment Handling</h3>
 <div class="table-responsive">
                <table class="table table-striped table-light" id="dataTable" width="100%" cellspacing="10"> 
                  <thead class="dark">  
                    <th>Trainer ID</th>
                    <th>Trainer Name</th>
                    <th>Equipment ID</th>
                    <th>Eqiupment Name</th>
                  </thead>

        <?php
      while($row3=mysqli_fetch_array($exec3))
      {

        echo '<tr>
    
                                <td>    '.$row3["trainerid"].' </td>


                               <td>    '.$row3["fname"].'
                                    '.$row3["lname"].'</td>

                    
                                 <td>   '.$row3["equipmentid"].'</td>
                                      <td>   '.$row3["name"].'</td>
                               <td><img style="width:10%; height=10%;" src="data:image/jpeg;base64,'.base64_encode($row3["image"]).'"/><td>
                                       
                       


                                    ';
                                  }
?></div>
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
<script>
   function printcontent(e1){
      var restorepage=document.body.innerHTML;
      var printContent=document.getElementById(e1).innerHTML;
      document.body.innerHTML=printContent;
      window.print();
      document.body.innerHTML=restorepage;
    }
  </script>


  <script>
var d = new Date();
document.getElementById("demo").innerHTML = d;
</script>


          

          
