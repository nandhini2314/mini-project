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
$User_Name = $_REQUEST["username"];
$Password = $_REQUEST["pass"];
$query = "SELECT * FROM `userinfo` WHERE Username = '$User_Name' and Password ='$Password'";
$mysqli_result= mysqli_query($connection,$query);
if($row = mysqli_fetch_assoc($mysqli_result))
  {
  if($User_Name == $row['Username'] and $Password == $row['Password'])
  {
    session_start();
    $_SESSION['username'] =  $User_Name;
    header('Location:./home2.html');
    //echo '<a href="./home2.html">Click here</a>';
  }
}
else 
{
  //echo "Login Unsuccessful";
  header('Location:./loginunsuccessful.html');
}
  
?>
