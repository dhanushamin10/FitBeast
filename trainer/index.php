<?php


  
session_start();

if(!isset($_SESSION['user_name'])){
   header("Location:trainerlogin.php");
}

 include("db.php");

 


if(!isset($_SESSION['user_name'])){
   header("Location:trainerlogin.php");
}

$user_profile=$_SESSION['user_name'];


$qry="Select * from Trainer t  where t.username='$user_profile' ";
$data=mysqli_query($con,$qry);


$result=mysqli_fetch_assoc($data);

$id=$result['trainerid'];




?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>FitBeast</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor1/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
  <link href="vendor1/fontawesome-free/css/all.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css1/resume.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">

      <span class="d-block d-lg-none"></span>
      <span class="d-none d-lg-block">
        <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="https://cdn2.iconfinder.com/data/icons/social-flat-buttons-3/512/anonymous-512.png" alt="">
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#profile">FITBEAST</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#profile">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#sales">Your Equipments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#trainer">Your Clients</a>
        </li>
     
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="logout.php">Logout</a>
        </li>
        
      </ul>
    </div>
  </nav>

  <div class="container-fluid p-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="profile">
      <div class="w-100">
         <h1 class="mb-0 text-danger">WELCOME</h1>
        <h1 class="mb-0"><?php echo ' '.$result['fname'].' '.$result['lname'].'<br> ' ;?>
        
        </h1>
        <div class="subheading mb-5">UDUPI <?php echo ' '.$result['contact'].'<br>' ;?>
          <a href="mailto:name@email.com"><?php echo ' '.$result['email'].'' ;?></a>
         
     
        
          
        </div>
      </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="sales">
      <div class="w-100">
        



 <h3 style="text-align: center;">Your Handled Equipments</h3>
 <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-light" id="dataTable" width="100%" cellspacing="0"> 
                          <thead class="thead-dark">  
                               <tr>  
                                    <td>EquipmentId</td>  
                                    <td>Name</td>  
                                
                                   
                                    <td>Image</td>
                                    
                                    
                          
                                
                                   
                               </tr>  
                          </thead>
                          <?php
$qry3="select * from equipment where handler='$id'";

$res=mysqli_query($con,$qry3);

while($row = mysqli_fetch_array($res))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["equipmentid"].'</td>  
                                    <td>'.$row["name"].'</td>  
                                  
                                      <td>


<img style="width:10%; height=10%;" src="data:image/jpeg;base64,'.base64_encode($row["image"]).'"/>
                                     </td>    
                                  
                                     

                                  
                                    
                               </tr>  
                               ';  
                          }  
                          ?>  

</table>

    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="trainer">
      <div class="w-100">
        <h2 class="mb-5">Your Clients</h2>
        <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-light" id="dataTable" width="100%" cellspacing="0"> 
                          <thead class="thead-dark">  
                               <tr>  
                                    <td>Client ID</td>  
                                    <td>Name</td>  
                                
                                   
                                    <td>Contact</td>
                                    <td>Email</td>
                                    <td>Hours Remaining</td>
                                    <td>Update Status</td>
                                   
                                    
                          
                                
                                   
                               </tr>  
                          </thead>  
                          <?php
                          $sql1 = "select * from trains t,member M where t.trainerid='$id' and M.memberid=t.memberid";
                          $data5=mysqli_query($con,$sql1);
                          while($row5 = mysqli_fetch_array($data5))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row5["memberid"].'</td>  
                                    <td>'.$row5["firstname"].' '.$row5["lastname"].'</td>  
                                    <td>'.$row5["contact"].'</td> 
                                     <td>'.$row5["email"].'</td>
                                     <td>'.$row5['hours'].'</td>
                                  <td><a href="update.php?id='.$row5["memberid"].'" class="btn btn-primary"> Update Status</a></td>
                                  
                               </tr>  
                               ';  
                          } 
                          ?>
                      </table>
    </section>



  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/resume.min.js"></script>

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

</script>