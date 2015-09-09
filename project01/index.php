<?php include 'header.php';?>

<?php
$sql = "SELECT * FROM albums ORDER BY rank;";
 include 'albumTable.php';
 ?>

<?php include 'footer.php';?>