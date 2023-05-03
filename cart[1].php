
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>JustEatFood Cart</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Homemade+Apple&family=Rubik:wght@300;400;500&display=swap" rel="stylesheet">
</head>
</html>

<?php
    
	$servername = "localhost";
    $username = "root";
    $password = "";
    $database = "JustEatFood";

    // Create a connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    if(!$conn){
        die("Sorry we failed to connect: ". mysqli_connect_error());
    }
    session_start();
        $User_Name = $_SESSION['username'];
       // $dishName =$_SESSION['dishName'];
        // $dishPrice=$_SESSION['dishPrice'];
        

		//Fetch products from database
		$result = mysqli_query($conn, "SELECT * FROM cart where Username='$User_Name'");

        echo '<div class="full-page">';
            echo ' <div class="navbar">';
                    echo '<h2 style="color:  #137a5e;  margin-left: 10px; font-size: 50px;">JustEatFood</h2>';
                        echo '<nav>';
                        echo '<ul id="MenuItems"';
                            echo '<li><a href="home2.html">Home</a></li>';
                            
                            
                            echo '<li><a href="Cart.html">Cart</a></li>';
                            echo '<li><a href="login.html">Login</a></li>';
                            echo '<li><a href="logout.php">Logout</a></li>';
                        echo '</ul>';
                    echo '</nav>';
                echo '</div>';



if(mysqli_num_rows($result) > 0)  {

        echo '<h1 class="cart" style="font-size: 3rem; margin-left: 30rem;">Your Orders!</h1>';
  

while($row = mysqli_fetch_assoc($result)){
    
    $price = $row['DishPrice'];
    // $name = $row['DishName'];
    $cartquery = mysqli_query($conn,"SELECT SUM(CAST(substring(DishPrice,2,6) AS int)) FROM cart where Username='$User_Name'");
    //while($row1 = mysqli_fetch_assoc($cartquery));
    echo '<div class="card">';
        echo  '<p class="dishName" > Dish Name: '.$row['DishName'].'</p>';
        echo  '<p class="dishPrice" > Price: '.$row['DishPrice'].'</p>';
        echo '</div>';

			}

        // echo '<br><br><a class="order" href="order.html">Order Now</a>';
    while($row = mysqli_fetch_assoc($cartquery)){
        $bill = $row['SUM(CAST(substring(DishPrice,2,6) AS int))'];
    echo '<p class="totalPrice">Total Price: '.$row['SUM(CAST(substring(DishPrice,2,6) AS int))'].'</p>';
    echo "<a href='./payment.html'><button'>Procced to Payment</button></a>";}
}
		else{
			echo "No products found. Please Login First";
		}  
?>



<style>
  
        .order{
            padding: 0.6rem 1rem;
            background-color: black;
            color: #ebfeee;
            text-decoration: none;
            align-items: center;
            border-radius: 0.6rem;
            margin-left: 35rem;
        }

        .card{
            margin-top: 2rem;
            border: 1px black solid;
            border-radius: 1rem;
        }

    .dishName{
        margin: 1rem;
        font-size: 2rem;
    }

    .dishPrice{
        font-size: 1.5rem;
        margin: 0.5rem 1rem;
    }
    .totalPrice{
        font-size: 1.5rem;
        margin: 0.5rem 1rem;

    }

    *{
    margin: 0;
    padding: 0;
    background-color: #ebfbee;
    box-sizing: border-box;
}

body{
    font-family: 'Rubik', sans-serif;

}


.full-page
        {
            /* height: 100%; */
            padding: 0.8rem;
            max-width: 100%;
            background-size: cover;
            background-position: center;
          
        }
        .navbar
        {
            display: flex;
            align-items: center;
            padding-left: 3.5rem;
            padding-right: 2.5rem;
            font-family: 'Homemade Apple', cursive;
            
        }
        nav
        {
            flex: 1;
            text-align: right;
        }
        nav ul 
        {
            display: inline-block;
            list-style: none;
        }
        nav ul li
        {
            display: inline-block;
            margin-right: 3rem;
        }
        nav ul li a
        {
            text-decoration: none;
            font-size: 1rem;
            font-family: 'Rubik', sans-serif;
            color: #020a08;
        }
</style>

