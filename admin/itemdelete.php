<?php
$id=$_GET['id'];
include('db.php');
global $sql;
$sql==mysqli_query($con,"DELETE FROM `inventory` WHERE itemid='$id'");
if($sql==true)
{
	echo "
	<script>
	alert('Deleted');
	window.location='/fitbeast/admin/inventory.php';
	</script>
	";
}
	else
	{
		echo "
		<script>
		alert('Deleted');
		window.location='/fitbeast/admin/inventory.php';
		</script>
		";
	}
?>

