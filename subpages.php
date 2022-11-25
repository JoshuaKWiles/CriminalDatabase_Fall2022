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

function arrests_retrieve() {
    $result = mysqli_query($GLOBALS['conn'], "SELECT * FROM arrests");
    return $result;
}

function cases_retrieve() {
    $result = mysqli_query($GLOBALS['conn'], "SELECT * FROM cases");
    return $result;
}

function criminals_retrieve() {
    $result = mysqli_query($GLOBALS['conn'], "SELECT * FROM offender");
    return $result;
}

function process_retrieve() {
    $result = mysqli_query($GLOBALS['conn'], "SELECT * FROM prosecutions");
    return $result;
}

function result_as_table($result, $from_name) {
    $matches = array();
while ($row = $result->fetch_array()) {
            $matches[count($matches)] = $row;
}

    $cols = $GLOBALS['conn'] -> query("SHOW COLUMNS from " . $from_name);

    $table = "<p>Showing ".count($matches)." results.</p>";
    $table = $table . "<table>";

$table = $table . "<tr class=\"maintablerow\">";
while ($row = $cols->fetch_array()) {
    $table = $table . "<th class=\"centercell\">" . $row[0] . "</th>";
}
$table = $table . "</tr>";

foreach ($matches as $row) {
    $table = $table . "<tr class=\"maintablerow\">";
    for ($x = 0; $x < count($row)/2; $x += 1) {
        $table = $table . "<td class=\"centercell\">" . $row[$x] . "</td>";
    }
    $table = $table . "</tr>";
    // Free result set
  }
  $table = $table . "</table>";

  return $table;
}

$new = $_GET["database"];
if ($new == "arrests") {
    echo "<center>
    <h>Arrest Database</h>
</center>";
    echo result_as_table(arrests_retrieve(),$new);
} 
else if($new == "cases") {
    echo "<center>
    <h>Case Database</h>
</center>";
    echo result_as_table(cases_retrieve(),$new);
} 
else if($new == "criminals") {
    echo "<center>
    <h>Criminal Database</h>
</center>";
    echo result_as_table(criminals_retrieve(),"offender");
} 
else if($new == "process") {
    echo "<center>
    <h>Prosecution Database</h>
</center>";
    echo result_as_table(process_retrieve(),"prosecutions");
}
else {
    echo "Database not found";
}

?>

</div>
    </center>
    </main>
	<footer></footer>
	<script type="text/javascript" src=""></script>
</body>

</html>