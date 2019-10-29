<?php
$id=$_GET['id'];
include('db.php');
global $sql;
$sql==mysqli_query($con,"DELETE FROM `assign` WHERE lockerid='$id'");
if($sql==true)
{
	echo "
	<script>
	alert('DeAllocated');
	window.location='/fitbeast/admin/locker.php';
	</script>
	";
}
	else
	{
		echo "
		<script>
		alert('DeAllocated');
		window.location='/fitbeast/admin/locker.php';
		</script>
		";
	}
?>

