<?php


$conn = mysqli_connect("localhost", "root", "","police_database");

if ($conn->connect_error) {
    die("Connection failed: "
        . $conn->connect_error);
}

$result = mysqli_query($conn, "SELECT * FROM ".$_GET['databasename']);

echo "<table>";
while ($row = $result -> fetch_array()) {
    echo "</tr>";
    foreach ($row as $val) {
        echo "<td>" . $val . "</td>";
    }
    echo "</tr>";
    // Free result set
  }
  echo "</table>";
  mysqli_free_result($result);

  mysqli_close($conn);


?>