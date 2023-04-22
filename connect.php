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


$Full_Name =  $_REQUEST['fname'];
$Username = $_REQUEST['uname'];
$Age =  $_REQUEST['age'];
$Email = $_REQUEST['email'];
$Password = $_REQUEST['password'];
$Flat_Building= $_REQUEST['flat'];
$Postal_address= $_REQUEST['address'];
$Phone=$_REQUEST['phno'];         
$sql = "INSERT INTO userinfo (Full_Name,Username,Age,Email,Password,Flat_Building,Postal_Address,Phone)  VALUES ('$Full_Name','$Username','$Age','$Email','$Password','$Flat_Building','$Postal_address','$Phone')";
if(mysqli_query($connection, $sql)){
  //echo "<h3>data stored in a database successfully.\n Please browse your localhost php my admin\nto view the updated data</h3>";
  header('Location:./home2.html');
 // echo nl2br("\n$Full_Name\n$Username\n$Age\n$Email\n$Password\n$Flat_Building\n$Postal_address\n$City\n$State\n$Phone");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($connection);
        }
         
        // Close connection
        mysqli_close($connection);
       
?>

