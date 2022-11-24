<?php


$conn = mysqli_connect("localhost", "root", "","police_database");

if ($conn->connect_error) {
    die("Connection failed: "
        . $conn->connect_error);
}

$result = mysqli_query($conn, "SELECT * FROM " . $_GET['databasename']);

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
    echo "No results found";
}
else {
$cols = $conn -> query("SHOW COLUMNS from " . $_GET['databasename']);
echo "<table>";

echo "<tr>";
while ($row = $cols->fetch_array()) {
    echo "<th>" . $row[0] . "</th>";
}
echo "</tr>";

foreach ($matches as $row) {
    echo "<tr>";
    for ($x = 0; $x < count($row)/2; $x += 1) {
        echo "<td>" . $row[$x] . "</td>";
    }
    echo "</tr>";
    // Free result set
  }
  echo "</table>";
}
  mysqli_free_result($result);

  mysqli_close($conn);


?>