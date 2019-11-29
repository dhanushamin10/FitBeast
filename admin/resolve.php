<?php
$id=$_GET['id'];
include('db.php');
global $sql;
$sql==mysqli_query($con,"DELETE FROM `complaints` WHERE cid='$id'");
if($sql==true)
{
	echo "
	<script>
	alert('Complaint Resolved');
	window.location='/fitbeast/admin/newindex.php';
	</script>
	";
}
	else
	{
		echo "
		<script>
		alert('resolved');
		window.location='/fitbeast/admin/newindex.php';
		</script>
		";
	}
?>

