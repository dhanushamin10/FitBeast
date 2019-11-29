<?php


  
session_start();


 $con = mysqli_connect("localhost","root","","fitbeasttest1");

 


if(!isset($_SESSION['user_name'])){
   header("location:trainerlogin.php");
}

$user_profile=$_SESSION['user_name'];

$qry="Select * from Trainer t  where t.username='$user_profile' ";
$data=mysqli_query($con,$qry);


$result=mysqli_fetch_assoc($data);
echo "<h3>Welcome ".$_SESSION['user_name'];
$id=$result['trainerid'];

?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<title></title>
</head>
<body>
<h3>

profile :

Name = <?php echo ' '.$result['fname'].''.$result['lname'].'<br> ' ;?>


Email = <?php echo ' '.$result['email'].'<br>' ;?>

Specialisation = <?php echo ' '.$result['specialization'].'<br> ' ;?></h3>


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

<h2 style="text-align: center;">Your Clients</h2>

 <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-light" id="dataTable" width="100%" cellspacing="0"> 
                          <thead class="thead-dark">  
                               <tr>  
                                    <td>Client ID</td>  
                                    <td>Name</td>  
                                
                                   
                                    <td>Contact</td>
                                    <td>Email</td>
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
                                  <td><a href="updatehours.php?id='.$row5["memberid"].'" class="btn btn-primary"> Update Status</a></td>
                                  
                               </tr>  
                               ';  
                          } 
                          ?>
                      </table>




















<a href="logout.php">logout</a>







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
