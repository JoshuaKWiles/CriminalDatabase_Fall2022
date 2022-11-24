<?php

$conn = mysqli_connect("localhost", "root", "","police_database");

if ($conn->connect_error) {
    die("Connection failed: "
        . $conn->connect_error);
}

function arrests_retrieve() {
    
}

function cases_retrieve() {
    
}

function criminals_retrieve() {
    
}

function process_retrieve() {
    
}

$new = $html->find("#arrests");
$new = $html->find("#cases");
$new = $html->find("#criminals");
$new = $html->find("#process");
if ($new == "#arrests") {
    echo something
} 
if else($new == "#cases") {
    echo something2
} 
if else($new == "#criminals") {
    echo something3
} 
if else($new == "#process") {
    echo something4
}
else {
    echo something5
}

>