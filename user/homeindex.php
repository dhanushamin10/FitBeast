<?php


  
session_start();


 $con = mysqli_connect("localhost","root","","fitbeasttest1");

 


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
<html>
<head>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
 <title></title>
 <body>
    <h3>profile :

Name = <?php echo ' '.$result['firstname'].' '.$result['lastname'].'<br> ' ;?>
Sex = <?php echo ' '.$result['gender'].'<br> ' ;?>

Email = <?php echo ' '.$result['email'].'<br>' ;?>


</h3>
<a href="logout.php">logout</a>
<?php

$id=$result['memberid'];
$qry2="select * from member M,payments P,inventory I where P.memberid='$id' and P.memberid=M.memberid and P.itemid=I.itemid";
$result2=mysqli_query($con,$qry2);
?>

 id=<?php echo $id ;?>
 <h4>Purchase History</h4>
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

<?php
$qry3="select * from assign A,locker L where A.memberid='$id' and a.lockerid=l.lockerid";
$result3=mysqli_query($con,$qry3);
$data=mysqli_fetch_assoc($result3);
echo '<h3>You have been assigned Locker id : '.$data["lockerid"].' which is a '.$data["type"].' locker';
?>

<?php

$qry4="select * from package P,member M where M.memberid='$id' and M.package=P.packageid";
$result4=mysqli_query($con,$qry4);
$data4=mysqli_fetch_assoc($result4);
echo '   '.$data4['packageid'].' '.$data4['name'].'</h3>';


?>
<h3>Trainer info</h3>
<?php

$qry4="select * from trainer T,trains A  where A.memberid='$id' and T.trainerid=A.trainerid";
$result4=mysqli_query($con,$qry4);
$data4=mysqli_fetch_assoc($result4);
echo ' <h3> Trainer Name : '.$data4['fname'].' '.$data4['lname'].' <br>
			Specialization : '.$data4['specialization'].' </h3>';


?>










</body>
</html>