<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>JustEatFood Delivery</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Homemade+Apple&family=Rubik:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>

<h2><img src="Images/Background/del.jpeg" height="150"></h2>
</body>


</html>
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

// // Checking the  connection
// if (!$connection) {
//   die("Failed ". mysqli_connect_error());
// }
// echo "Connection established successfully." . "\n";
$result = mysqli_query($connection,"SELECT name_del,Phone_number FROM delivery ORDER BY rand() LIMIT 1");


mysqli_query($connection,"UPDATE delivery SET status = 'yes' where status = 'no'");
// mysqli_query($connection,"UPDATE delivery SET status = 'no' where name = $result");
while($row = mysqli_fetch_assoc($result)){
    $name = $row['name_del'];
    $phoneno=$row['Phone_number'];
    mysqli_query($connection,"UPDATE delivery SET status = 'no' where name_del ='$name'");}
    echo "Your Delivery Guy is on his way";
    echo  '<p > His name is '.$name.'</p>';
    echo  '<p >You can contact him on this phone number '.$phoneno.'</p>';
   
  
   ?>
   <style>
    *{
      
      font-size: 50px;
    margin: 0;
    padding: 0;
    background-color:blanchedalmond ;
    box-sizing: border-box;
    
  
    
}

    
    