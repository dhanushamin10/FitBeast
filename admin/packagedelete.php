<?php
$id=$_GET['id'];
include('db.php');
global $sql;
$sql==mysqli_query($con,"DELETE FROM `package` WHERE packageid='$id'");
if($sql==true)
{
	echo "
	<script>
	alert('Deleted');
	window.location='/fitbeast/admin/package.php';
	</script>
	";
}
	else
	{
		echo "
		<script>
		alert('Cannot Delete Package while Still in Use');
		window.location='/fitbeast/admin/package.php';
		</script>
		";
	}
?>

