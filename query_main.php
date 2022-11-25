<!DOCTYPE html>
<html lang="">

<head>
	<meta charset="utf-8">
	<title>Search Results</title>
	<meta name="author" content="Your Name">
	<meta name="description" content="Example description">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="main.css">
	<link rel="icon" type="image/x-icon" href=""/>
</head>

<body>
	<header><center><h1></h1></center></header>
    <main>
    <center>
        <div id="maincontent">

<?php
$conn = mysqli_connect("localhost", "root", "","police_database");

if ($conn->connect_error) {
    die("Connection failed: "
        . $conn->connect_error);
}

if (!$_GET['databasename']) {
    die("Selected database not found. Please try again with a different database.");
}

$result = mysqli_query($conn, "SELECT * FROM " . $_GET['databasename']);

if (!$result) {
    die("There are no records in that database");
}

$matches = array();
while ($row = $result->fetch_array()) {
    foreach ($row as $value) {
        $matched = strpos("\x00" . strtolower($value), strtolower($_GET['search']));
        if ($matched) {
            $matches[count($matches)] = $row;
            break;
        }
    }
}

if (count($matches) == 0) {
    echo "No records match \"".$_GET['search']."\"";
}
else {
$cols = $conn -> query("SHOW COLUMNS from " . $_GET['databasename']);

echo "<p>".count($matches)." results found.</p>";
echo "<table>";

echo "<tr class=\"maintablerow\">";
while ($row = $cols->fetch_array()) {
    echo "<th class=\"centercell\">" . $row[0] . "</th>";
}
echo "</tr>";

foreach ($matches as $row) {
    echo "<tr class=\"maintablerow\">";
    for ($x = 0; $x < count($row)/2; $x += 1) {
        echo "<td class=\"centercell\">" . $row[$x] . "</td>";
    }
    echo "</tr>";
    // Free result set
  }
  echo "</table>";
}
  mysqli_free_result($result);

  mysqli_close($conn);


?>
</div>
    </center>
    </main>
	<footer></footer>
	<script type="text/javascript" src=""></script>
</body>

</html>