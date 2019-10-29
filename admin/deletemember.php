<?php
$id=$_GET['id'];
include('db.php');
global $sql;
$sql==mysqli_query($con,"DELETE FROM `member` WHERE memberid='$id'");
if($sql==true)
{
	echo "
	<script>
	alert('Deleted');
	window.location='/fitbeast/admin/clientele.php';
	</script>
	";
}
	else
	{
		echo "
		<script>
		alert('Deleted');
		window.location='/fitbeast/admin/clientele.php';
		</script>
		";
	}
?>

