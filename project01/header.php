<html>
	
	<title>Top 100 Albums of All Time </title>
	<meta name="description" content="A list of the top 10 albums of all time, according to Rolling Stone.">
	<link rel="stylesheet" href="../stylesheet.css"></link>
<head>
	<script>
	function replaceList() {

		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function() {
			if(xhr.readyState == 4 && xhr.status == 200){
				document.getElementbyId("albumData").innerHTML = xhr.responseText;
			}

		}
		xhr.open("POST", "http://bquillen.humanoriented.com/albumTable.php", true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
		var sortOrder = document.getElementbyId("myIDFORSELECT").value;
		xhr.send("sortOrder=" + sortOrder);
	}
	</script>
</head>

<body>

	<form method="POST" action="topAlbums.php">
		<input type="submit" onclick="replaceList(); return false;">
		Ordered by
    <select name="sortOrder">
      <option <? if ($sortOrder == "rank") { ?>selected="selected"<? } ?> value="rank">Rank</option>
      <option <? if ($sortOrder == "year") { ?>selected="selected"<? } ?>value="year">Year</option>
      <option <? if ($sortOrder == "title") { ?>selected="selected"<? } ?>value="title">Title</option>
    </select>
    <input type="submit" value="Sort this!" />
	</form>

  <h1>Top 100 Albums of All Time</h1>
  <h2>At least, according to someone.</h2>
  
  
  