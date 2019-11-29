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
          <h2 style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

  
        
            <button onclick="printcontent('div1')" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Get Report</button>
         </ul>

          </nav>
          <h1 style="text-align: center;">Sales report</h1>
          <div class="card-body">
            <div class="card-header" style="text-align: center;"><h3>Item List</h3></div>
  <div class="table-responsive">
                <table class="table table-striped table-light" id="dataTable" width="100%" cellspacing="10"> 
                  <thead class="">  
                    <th>Item id</th>
                    <Th>Item Name</Th>
                  <Th>Price</Th>
                </thead>

        <?php
          include('db.php');
          $qry="Select * from inventory";
          $exec1=mysqli_query($con,$qry);
          while($row=mysqli_fetch_array($exec1))
          {
            echo '
                  <tr>
                  <td> '.$row["itemid"].'</td>
                   <td> '.$row["itemname"].'</td>
                    <td> '.$row["price"].'</td>
                      </tr>
          ';
        }
        ?>
      </table><br>
      <div class="card-body">
            <div class="card-header" style="text-align: center;"><h3></h3></div>
  <div class="table-responsive">
                <table class="table table-striped table-light" id="dataTable" width="100%" cellspacing="10"> 
                  <thead class="">  
                    <th>Payment ID</th>
                    <Th>Customer Name</Th>
                  <th>Item ID</Th>
                    <th>Item Name </th>
                    <th>Amount</th>
                    <th>Payment Mode</th>
                </thead>

      <h3>Sales Activity</h3>
<?php
  $exec3=mysqli_query($con,"select *  from payments P,member M,inventory I where P.itemid=i.itemid and M.memberid=P.memberid");
  while($row2=mysqli_fetch_array($exec3))
echo '
<tr>
   <td>  '.$row2["paymentid"].'</td> 
  <td> '.$row2["firstname"].'  
    '.$row2["lastname"].'</td>
  <td> '.$row2["itemid"].' </td>

  <td>  '.$row2["itemname"].' </td>
   <td> ₹'.$row2["price"].' </td>
   <td> '.$row2["mode"].'</td>
   
</tr>




';
?>
</table>
<?php
       $result =mysqli_query($con,"select sum(I.price) from payments P,inventory I where I.itemid=P.itemid");
            $row = mysqli_fetch_array($result);
            $total = $row[0];
            echo '<br><h5>The Amount gained by the gym through item sales :₹' . $total.'<h5>
            ';
?>


</div>
</div>
</div>
</body>
</html>
 <script>
    function printcontent(e1){
      var restorepage=document.body.innerHTML;
      var printContent=document.getElementById(e1).innerHTML;
      document.body.innerHTML=printContent;
      window.print();
      document.body.innerHTML=restorepage;
    }
  </script>
 <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>