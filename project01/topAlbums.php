<?
$sortOrder = $_POST["sortOrder"];
if ($sortOrder == NULL){
  $sortOrder = "rank";
}
?>

<html>
<head>
	<title>Top 100 Albums of All Time </title>
	<meta name="description" content="A list of the top 10 albums of all time, according to Rolling Stone.">
	<link rel="stylesheet" href="../stylesheet.css"></link>
  <script>
  function replaceList() {
    var xhr = new XMLHttpRequest();
     xhr.onreadystatechange = function() {
         if(xhr.readyState == 4 && xhr.status == 200){
         document.getElementById("albumTable").innerHTML = xhr.responseText;
       }
    }
    xhr.open("POST", "http://bquillen.humanoriented.com/project01/albumTable.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    var sortOrder = document.getElementById("albumData").value;
    xhr.send("sortOrder=" + sortOrder);
  }
  </script>
</head>

<body>
  <h1>Top 100 Albums of All Time</h1>
  <h2>At least, according to someone.</h2>
  <form action="topAlbums.php" method="POST">
    Ordered by
    <select id="albumData" name="sortOrder">
      <option <? if ($sortOrder == "rank") { ?>selected="selected"<? } ?> value="rank">Rank</option>
      <option <? if ($sortOrder == "year") { ?>selected="selected"<? } ?>value="year">Year</option>
      <option <? if ($sortOrder == "title") { ?>selected="selected"<? } ?>value="title">Title</option>
    </select>
    <input type="submit" value="Sort this!" onclick="replaceList(); return false;" />
  </form>

<div id="albumTable"> 
<table>
  <thead>
    <tr>
      <td>Rank</td>
      <td>Title</td>
      <td>Year</td>
    </tr>
  </thead>

<?php
$servername = "crcp3320db.humanoriented.com";
$username = "crcp3320";
$password = "Crcp3320";
$dbname = "crcp3320";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM albums ORDER by " . $sortOrder;

$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    echo "<tr>\n" . "\t<td>" . $row["rank"] . "</td>\n<td>" . $row["title"]. "</td>\n<td>" . $row["year"]. "</td>\n</tr>\n";
}
$conn->close();
?>
</table>
</div>
</body>

  <h3>Brad Quillen, doing work</h3>

</html>