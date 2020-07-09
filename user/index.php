<?php


  
session_start();

if(!isset($_SESSION['user_name'])){
   header("Location:homepage.php");
}

include("db.php");

 


if(!isset($_SESSION['user_name'])){
   header("Location:homepage.php");
}

$user_profile=$_SESSION['user_name'];

$qry="Select * from member M ,package P where M.username='$user_profile' and P.packageid=M.package ";

$data=mysqli_query($con,$qry);
$result=mysqli_fetch_assoc($data);
$x=$result["hours"];
if($x==0)
{
  echo "
        <script>
        alert('Your Package is Expired Please Renew in counter.');
    
        </script>


        ";
}


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
  <style>
  body {
  font-family: "Open Sans", sans-serif;
  color: #444444;
  background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
  </style>

</head>

<body id="page-top">

  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="sideNav">
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
          <a class="nav-link js-scroll-trigger" href="#sales">Purchase History</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#trainer">Trainer Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#package">Package info</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#locker">Locker info</a>
        </li>
         <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#issue">Raise an Issue</a>
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
        <h1 class="mb-0"><?php echo ' '.$result['firstname'].' '.$result['lastname'].' ' ;?>
        
        </h1>
        <div class="subheading mb-5">UDUPI <?php echo ' '.$result['contact'].'' ;?>
          <a href="mailto:name@email.com"><?php echo ' '.$result['email'].'' ;?></a>
           <div class="subheading mb-5">Sex:<?php echo ' '.$result['gender'].'' ;?>
        </div>
     
        
          
        </div>
      </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="sales">
      <div class="w-100">
        <h2 class="mb-5" style="text-align: center;">Purchase History</h2>

        <?php

$id=$result['memberid'];
$qry2="select * from member M,payments P,inventory I where P.memberid='$id' and P.memberid=M.memberid and P.itemid=I.itemid";
$result2=mysqli_query($con,$qry2);
?>


 
 <table class="table table-striped table-light" id="dataTable" width="100%" cellspacing="0"> 
                          <thead class="thead-dark">  
                               <tr>  
                                    <td>Paymentid</td>  
                                    <td>Itemid</td>  
                                    <td>ItemName</td>  
                              
                                    <td>Amount</td>  
                                
                                   
                                   
                               </tr>  
                          </thead>  
                          <?php  
                          while($row1 = mysqli_fetch_array($result2))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row1["paymentid"].'</td>  
                                    <td>'.$row1["itemid"].'</td>  
                                    <td>'.$row1["itemname"].'</td>  
                                    
                                    <td>'.$row1["price"].'</td>  
                                     

                                  
 
                                    
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  

    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="trainer">
      <div class="w-100">
        <h2 class="mb-5">Trainer Profile</h2>
        <?php

$qry4="select * from trainer T,trains A  where A.memberid='$id' and T.trainerid=A.trainerid";
$result4=mysqli_query($con,$qry4);
$data4=mysqli_fetch_assoc($result4);



?>

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
            <h3 class="mb-0">Trainer Name <?php echo' '.$data4['fname'].' '.$data4['lname'].' ';?></h3>
            <div class="subheading mb-3">Speicalization <?php echo''.$data4['specialization'].'';?></div>
            <div><?php echo''.$data4['contact'].''.$data4['email'].'';?> </div>
            
         
    </section>

    <hr class="m-0">
<?php    
$qry4="select * from package P,member M where M.memberid='$id' and M.package=P.packageid";
$result4=mysqli_query($con,$qry4);
$data4=mysqli_fetch_assoc($result4);
?>

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="package">
      <div class="w-100">
        <h2 class="mb-5">Package Info</h2>

        <div class="subheading mb-3">Package ID<?php echo '   '.$data4['packageid'].'';?></div>
         <div class="subheading mb-3">Package name <?php echo '   '.$data4['name'].'';?></div>
         <div class="subheading mb-3">Hours Left <?php echo '   '.$result['hours'].'';?></div>
        

     
      </div>
    </section>

    <hr class="m-0">
    <?php
$qry3="select * from assign A,locker L where A.memberid='$id' and a.lockerid=l.lockerid";
$result3=mysqli_query($con,$qry3);
$data=mysqli_fetch_assoc($result3);
?>

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="locker">
      <div class="w-100">
        <h2 class="mb-5">Locker Info</h2>
        <div class="subheading mb-3">Locker ID<?php echo '   '.$data['lockerid'].'';?></div>
         <div class="subheading mb-3">Locker Type <?php echo '   '.$data['type'].'';?></div>
         
        
      </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="issue">
      <div class="w-100">
          <h2 class="mb-5" style="text-align: center;">Raise an Issue</h2>
        <div class="column">
        <form action="" method="post">
          <input type="text" name="type" placeholder=" Complaint Type" required=""><br><br>
          <input type="text" size="100" name="description" placeholder="Complaint description" required=""><br><br>
          <input type="submit" name="submit" class="btn btn-primary">
        </form>
        <?php

        global $qry7;
        
        if(isset($_POST["submit"]))
      {
        $n=$_POST["type"];
        $n1=$_POST["description"];
        $n2=$id;
   
    
        $qry7=mysqli_query($con,"INSERT INTO `complaints`(`type`,`description`,`memberid`)
          values('$n','$n1','$n2')")or die(mysqli_error($con));
      }
 
     if($qry7==true)
    {
    {
    echo "
    <script>
    alert('Complaint Registered Successfully');
   </script>
  ";
}
    }
  



?>
      
      </div>
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