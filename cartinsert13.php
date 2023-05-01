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
}else{
echo "Connection established successfully." . "\n";
$dishName = $_POST['dishName'];
echo $dishName;
$dishPrice = $_POST['dishPrice'];

session_start();
$User_Name= $_SESSION['username'];

$r = "INSERT INTO `cart`(`Username`,`DishName`,`DishPrice`) values('$User_Name','$dishName', '$dishPrice')";
$result = mysqli_query($connection, $r);
if($result)
{//echo "Connection established .";
    header('Location:./vintagecreams.html');
}
else{
    echo "not";
}
}

?>