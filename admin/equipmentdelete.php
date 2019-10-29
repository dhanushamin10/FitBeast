<?php
$id=$_GET['id'];
include('db.php');
global $sql;
$sql==mysqli_query($con,"DELETE FROM `equipment` WHERE equipmentid='$id'");
if($sql==true)
{
	echo "
	<script>
	alert('Deleted');
	window.location='/fitbeast/admin/equipment.php';
	</script>
	";
}
	else
	{
		echo "
		<script>
		alert('Deleted');
		window.location='/fitbeast/admin/equipment.php';
		</script>
		";
	}
?>

