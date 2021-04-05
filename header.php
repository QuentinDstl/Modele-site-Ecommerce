<?php
	if(!isset($_SESSION)) { 
		session_start(); 
	} 
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>YourMarket</title>
		<link rel="stylesheet" href="css/reset.css"  type="text/css" />
		<link rel="stylesheet" href="css/style.css"  type="text/css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/header.js"></script>
	</head>
		
	<body>
		<header>
			<div id="top-header">
				<div id="logo">
					<a href="index.php">
						<img src="images/logo.png" alt="YR MRKT" height="40">
					</a>
				</div>
				<div id="search-bar">
					<form action="/action_page.php">
						<input type="text" placeholder="Search.." name="search">
						<button type="submit"><i class="fa fa-search"></i></button>
					</form>
				</div>
				<div id="login">
					
					<?php
						if(isset($_SESSION["useruid"])) {

							echo "
								<form action='profil.php'>
									<button id='btn-header-left' type='submit'><i class='fa fa-user'><span> ". $_SESSION["useruid"] ."</span></i></button>
								</form>
								&nbsp
								<form action='includes/logout.inc.php'>
									<button id='btn-header-right'  type='submit'><i class='fa fa-power-off'></i></button>
								</form>";
						}
						else {
							echo "
							<form action='login.php'>
								<button class='btn btn-animate' type='submit'>CONNECT</button>
							</form>";
						}
					?>
				</div>
			</div>

			<div id="low-header">
				<div></div>
				<div id="cat-1"><a href="categories.php"> CATEGORIES </a></div>
				<div id="cat-2"><a href="shop.php"> SHOP </a></div>
				<?php
						if(isset($_SESSION["usertype"])) {
							// user is connected
							if($_SESSION["usertype"] === "buyers") {
								echo "
									<div id='cat-3'><a href='cart.php'> CART </a></div>
									<div id='cat-4'><a href='contactus.php'> CONTACT </a></div>
								";
							}
							else if($_SESSION["usertype"] === "sellers") {
								echo "
									<div id='cat-3'><a href='sell.php'> SELL </a></div>
									<div id='cat-4'><a href='contactus.php'> CONTACT </a></div>
								";
							}
							else if($_SESSION["usertype"] === "admins") {
								echo "
									<div id='cat-3'><a href='sell.php'> SELL </a></div>
									<div id='cat-4'><a href='admin.php'> ADMIN </a></div>
								";
							}
						}
						else {
							// user not connected
							echo "
								<div id='cat-3'><a href='login.php'> CART </a></div>
								<div id='cat-4'><a href='contactus.php'> CONTACT </a></div>
							";
						}
					?>
				<div></div>
			</div>
		</header>