<?php
//specify the server name and here it is localhost
$server_name = "localhost";

//specify the username - here it is root
$user_name = "root";

//specify the password - it is empty
$password = "";
$database="JustEatFood";

// Creating the connection by specifying the connection details
$connection = mysqli_connect($server_name, $user_name, $password,$database);

// Checking the  connection
if (!$connection) {
  die("Failed ". mysqli_connect_error());
}
echo "Connection established successfully." . "\n";

$dishName = $_POST['dishName'];
$dishPrice = $_POST['dishPrice'];
session_start();
    $email = $_SESSION['email'];

$r = "INSERT INTO `cart`() values($dishName, $dishPrice)";


?>