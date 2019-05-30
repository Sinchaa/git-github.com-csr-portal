<?php
$servername = "localhost";
$username1 = "root";
$db="csr";
$password1 = "";

// Create connection
$conn = mysqli_connect($servername, $username1, $password1,$db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>