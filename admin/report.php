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
 include('adminpanel/header.php');
 ?>

   <!-- Content Row -->
    <div class="container-fluid" id="div1">

          <!-- Page Heading -->
       
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
               <a href="trainerreport.php"><div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-l font-weight-bold text-primary text-uppercase mb-1">Trainer Report</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" ></div>
                    </div>
                    <div class="col-auto">
                     <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div></a>
            </div>

  <div class="col-xl-3 col-md-6 mb-4">
             <a href="memberreport.php"> <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-l font-weight-bold text-success text-uppercase mb-1">Member Report</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
              </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div></a>
            </div>

    
            
                <div class="col-xl-3 col-md-6 mb-4">
              <a href="salesreport.php">  <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-l font-weight-bold text-info text-uppercase mb-1">Sales Report</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
              </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-rupee-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div></a>
            </div>
          </div>
        </div>
      </body>


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
    function printcontent(e1){
      var restorepage=document.body.innerHTML;
      var printContent=document.getElementById(e1).innerHTML;
      document.body.innerHTML=printContent;
      window.print();
      document.body.innerHTML=restorepage;
    }
  </script>



