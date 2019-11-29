 <!DOCTYPE html>
<?php
session_start();

if(!isset($_SESSION['user_name'])){
   header("Location:login.php");
}

include('db.php');
$myqry="select * from member";
$exec=mysqli_query($con,$myqry);
while($rowmy=mysqli_fetch_array($exec))
{
  $x=$rowmy['hours'];
  if($x==0)
  {
    echo "
        <script>
        alert('Client Packages have expired.Please check Expired packages.');
    
        </script>


        ";

  }
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

  <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> 
             Dashboard</h1>
            <a href="report.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
           
             <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="logut.php" >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
            
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">₹<?php
              $con = mysqli_connect("localhost","root","","fitbeasttest1");



            $result =mysqli_query($con,"select sum(I.price) from payments P,inventory I where I.itemid=P.itemid");
            $row = mysqli_fetch_array($result);
            $total = $row[0];
            echo "" . $total." ";
              ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Expired Packages</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
              $con = mysqli_connect("localhost","root","","fitbeasttest1");



            $result =mysqli_query($con,"select count(*) from member where hours=0");
            $row = mysqli_fetch_array($result);
            $total = $row[0];
            echo "" . $total." ";
              ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-alt-slash fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
           <a href="complaints.php" style="text-decoration:none">   <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Complaints to be resolved</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php
              $con = mysqli_connect("localhost","root","","fitbeasttest1");



            $result = mysqli_query($con,"select count(1) FROM complaints");
            $row = mysqli_fetch_array($result);
            $total = $row[0];
            echo "" . $total." ";
              ?> </div></a> 
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-skull-crossbones fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Members in the Gym</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
              $con = mysqli_connect("localhost","root","","fitbeasttest1");



            $result = mysqli_query($con,"select count(1) FROM member");
            $row = mysqli_fetch_array($result);
            $total = $row[0];
            echo "" . $total."";
              ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">

          
                <!-- Card Body -->
                <div class="card-body">
               
              <!-- Color System -->
              <div class="row">
                <div class="col-lg-6 mb-4 ">
                  <div class="card bg-primary text-white shadow-lg p-1 mb-5  rounded">
                    <div class="card-body">
                     <i class="fas fa-user-plus fa-1x"></i>  <a href="memberadd.php" class="btn btn-primary">  Member Registration</a><br>
                     <i class="fas fa-user-lock fa-1x"></i>  <a href="lockeradd.php" class="btn btn-primary">  Assign Locker</a>
                      <div class="text-white-50 small"></div>
                    </div></a>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-success text-white shadow-lg p-1 mb-5  rounded">
                    <div class="card-body">
                     <i class="fas fa-user-cog fa-1x"></i> <a href="traineradd.php" class="btn btn-success">Trainer Registration</a><br>
                         <i class="fas fa-user-friends fa-1x"></i> <a href="trainerassign.php" class="btn btn-success">Assign Trainer</a>
                    
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-info text-white shadow-lg p-1 mb-5  rounded">
                    <div class="card-body">
                     
                      <i class="fas fa-cube fa-1x"></i><a href="packageadd.php" class="btn btn-info" >Add package</a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-warning text-white shadow-lg p-1 mb-5  rounded">
                    <div class="card-body">
                    <i class="fas fa-shopping-cart fa-1x"></i> <a class="btn btn-warning" href="paymentadd.php">Add PaymentInfo</a>
                   
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-danger text-white shadow-lg p-1 mb-5  rounded">
                    <div class="card-body">
                      <i class="fas fa-dumbbell fa-1x"></i> <a href="equipmentadd.php" class="btn btn-danger"> Add Equipments</a>
                      
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-secondary text-white shadow-lg p-1 mb-5  rounded">
                    <div class="card-body">
                     <i class="fas fa-warehouse fa-1x"></i> <a href="itemadd.php" class="btn btn-secondary"> Add Products</a>
                      
                    </div>
                  </div>
                </div>
              </div>

            </div>

    </div>
    <!-- End of Content Wrapper -->
    <?php
            include("adminpanel/footer.html")
 ?>

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
 






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




