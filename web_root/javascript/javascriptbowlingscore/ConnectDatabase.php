<?php
$servername = "localhost";
$username = "u3380";
$password = "h898efRG842";
$dbname = "3380project";

//connect to the server
$conn = new mysqli($servername,$username,$password,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
