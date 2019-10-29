<!DOCTYPE html>
<html lang="en">

<head><style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column1 {
  float: left;
  width: 50%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row1:after {
  content: "";
  display: table;
  clear: both;
}</style>


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
  include('db.php');
        $qry="select * from member T";
        $exec=mysqli_query($con,$qry);

 ?>

   <!-- Content Row -->
    <div class="container-fluid" id="div1">

          <!-- Page Heading -->
        <nav class="navbar navbar-expand navbar  topbar mb-4 static-top shadow">
          <h2 style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Member Report</h2>

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

  
        
            <button onclick="printcontent('div1')" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Report</button>


         </ul>
       </nav>
          <h1 style="text-align: center; " class="text-primary">Report </h1><br>
          <p>As generated on</p>
        <p id="demo"></p>

<h2>Member detail</h2>
<div class="card-body">
  <div class="table-responsive">
                <table class="table table-striped table-light" id="dataTable" width="100%" cellspacing="10"> 
                  <thead class="">  
                               <tr>  
                                    <th>First Name</th>  
                                    <th>Last Name</th> 
                                    <th>&nbsp;&nbsp;&nbsp;</th>
                                    <th>Sex</th> 
                                    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>

                                    <th>Contact</th>  
                                    
                               </tr>  
                          </thead>  


       <?php
       
         while($row=mysqli_fetch_array($exec))
        {
          echo '
            
              <tr>
              <td>'.$row["firstname"].'  </td>
              <td>'.$row["lastname"].'<td>
              <td> '.$row["gender"].'<td>
              <td>'.$row["contact"].' <td>
              </tr>
             
             


            ';
        }

        ?>
      </table>
    </div>


    <h4> Member Activity</h4>

      
       <?php
        include('db.php');
        $qry="select * from member T";
        $exec=mysqli_query($con,$qry);
        $exec2=mysqli_query($con,"select * from member m,package p,trainer t, trains t1 where  p.packageid=m.package and t1.trainerid=t.trainerid and t1.memberid=m.memberid");
        $exec3=mysqli_query($con,"select sum(p.price) from member m,package p where  p.packageid=m.package");
        
      


        while($row2=mysqli_fetch_array($exec2))
        {
          echo ' 

          <h5>
          Member ID :
                                    '.$row2["memberid"].' 


                                   '.$row2["firstname"].'
                                    '.$row2["lastname"].'


                    is trained by   '.$row2["fname"].'
                                    '.$row2["lname"].'

                      has opted package 
                                    '.$row2["name"].'

                      which amounts to : ₹'.$row2["price"].'



</h5><BR>

          ';
        }
 $row = mysqli_fetch_array($exec3);
            $total = $row[0];
            echo '<br><h4>
                  Total Amount Earned By Packages :


               ₹ '. $total.' </h4>';







?>























>


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


          


          
