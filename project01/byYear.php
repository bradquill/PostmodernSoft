<?php include 'header.php';?>
 
 <p>

 <?php
 	$sql = "SELECT * FROM albums ORDER BY year;";
 	include("albumTable.php");
?>

<?php include 'footer.php';?>