<?php



$conn = mysqli_connect("localhost", "root", "","police_database");

if ($conn->connect_error) {
    die("Connection failed: "
        . $conn->connect_error);
}

>