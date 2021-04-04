<?php

	if(isset($_POST["submit"])) {

		$lastname = $_POST["lastname"];
		$firstname =$_POST["firstname"];
		$email = $_POST["email"];
		$username = $_POST["uid"];
		$pwd = $_POST["pwd"];
		$pwdrepeat = $_POST["pwdrepeat"];
		// address
		$number = $_POST["number"];
		$street = $_POST["street"];
		$city = $_POST["city"];
		$zip = $_POST["zip"];
		$country = $_POST["country"];
		$accept = $_POST["accept"];

		require_once "databasehandler.inc.php";
		require_once "functions.inc.php";

		if(emptyInputSignup($lastname, $firstname, $email, $username, $pwd, $pwdrepeat, $number, $street, $city, $zip, $country) !== false) {
			header("location: ../signup.php?error=emptyinput");
			exit();
		}

		if(invalidUid($username) !== false) {
			header("location: ../signup.php?error=invaliduid");
			exit();
		}

		if(invalidEmail($email) !== false) {
			header("location: ../signup.php?error=invalidemail");
			exit();
		}

		if(pwdMatch($pwd, $pwdrepeat) !== false) {
			header("location: ../signup.php?error=pwddontmatch");
			exit();
		}

		if(uidExists($conn, $username, $email) !== false) {
			header("location: ../signup.php?error=uidtaken");
			exit();
		}

		if(emptyInputClause($accept) !== false) {
			header("location: ../signup.php?error=emptyclause");
			exit();
		}

		$address = createAddress($number, $street, $city, $zip, $country);
		createUser($conn, $lastname, $firstname, $username, $email, $pwd, $address);
	}
	else {
		header("location: ../signup.php");
		exit();
	}