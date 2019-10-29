<?php
$id=$_GET['id'];
include('db.php');
global $sql;
$sql==mysqli_query($con,"DELETE FROM `trainer` WHERE trainerid='$id'");
if($sql==true)
{
	echo "
	<script>
	alert('Deleted');
	window.location='trainer.php';
	</script>
	";
}
	else
	{
		echo "
		<script>
		alert('Deleted');
		window.location='trainer.php';
		</script>
		";
	}
?>

