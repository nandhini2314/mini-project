<?php
// session_start();
// echo '<title>Cyber Safety Awareness</title>';
// echo '<link rel="icon" type="image/x-icon" href="./Assets/icon.ico">';
// // Check if the user is logged in
// if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
// 	// User is logged in, show after-login-navbar.php
// 	include './NavBar/navbarAfter.php';
// } else {
// 	// User is not logged in, show before-login-navbar.php
// 	include './NavBar/navbarBefore.php';
// }

$servername = "localhost";
    $username = "root";
    $password = "";
    $database = "JustEatFood";

    // Create a connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    session_start();
        $User_Name = $_SESSION['username'];
    $cartquery = mysqli_query($conn,"SELECT SUM(CAST(substring(DishPrice,2,6) AS int)) FROM cart where Username='$User_Name'");
    while($row = mysqli_fetch_assoc($cartquery)){
        $bill = $row['SUM(CAST(substring(DishPrice,2,6) AS int))'];
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Support Us</title>
	<link rel="stylesheet" href="./StyleSheet/donationpage.css" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./StyleSheet/font.css" />
</head>

<body>
	<div class="main">
		<div class="message">
			<img class="image" src="./Assets/donation.jpg" />
			<p>
				We are proudly non-profit, non-corporate and non-compromised.
				Thousands of people like you help us stand up for a safe internet for
				all. We rely on donations to carry out our mission to keep the web
				secure for all.
			</p>
		</div>
		<div class="donation">
			<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="donation-form">
				<div class="donation">
					<h1>Make A Donation</h1>
					<div class="donation-field">
						<p id="willing">I Will Donate $</p>
						<input type="number" name="amount" id="amount" class="amount" step="0.01" min="4.99" value="4.99" required />
					</div>
					<div class="choices">
						<button type="button" class="choice selected" data-amount="4.99">
							<p>$4.99</p>
						</button>
						<button type="button" class="choice" data-amount="9.99">
							<p>$9.99</p>
						</button>
						<button type="button" class="choice" data-amount="14.99">
							<p>$14.99</p>
						</button>
						<button type="button" class="choice" data-amount="19.99">
							<p>Other</p>
						</button>
					</div>
					<div class="cta">
						<button class="button" type="submit">Donate Now</button>
					</div>
					<p class="donation-note">
						You'll be redirected to PayPal to donate.
					</p>
				</div>
				<input type="hidden" name="cmd" value=$bill />
				<input type="hidden" name="business" value="sb-qyyoc25365716@business.example.com" />
				<input type="hidden" name="item_name" value="One-time Donation" />
				<input type="hidden" name="currency_code" value="USD" />
				<input type="hidden" name="return" value="http://localhost:3000/thankyou.php" />
			</form>
		</div>
	</div>
	<!-- <?php include './Footer/footer.php'; ?> -->
</body>
<script>
	const MININUM_DONATION = 4.99;
</script>
<script src="./Script/donation.js"></script>

</html>