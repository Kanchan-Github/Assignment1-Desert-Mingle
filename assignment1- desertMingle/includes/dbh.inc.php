<?php
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "itech3108_30344274_a1";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);
if (!$conn){
die("Connection failed:" .mysqli_connect_error());
}