<?php include 'header.php';?>
 
 <p>

<?php
 	$sql = "SELECT * FROM albums ORDER BY Title;";
	include("albumTable.php");
?>
 
<?php include 'footer.php';?>
