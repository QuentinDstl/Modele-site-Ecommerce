<?php

	if(isset($_POST["submit"])) {

		session_start();

		$email = $_POST["email"];
		$pwd =$_POST["pwd"];
		$pwdrepeat = $_POST["repeatpwd"];
		$username = $_SESSION["useruid"];

		require_once "databasehandler.inc.php";
		require_once "functions.inc.php";

		if(invalidEmail($email) !== false) {
			header("location: ../profil.php?error=invalidemail");
			exit();
		}

		if(pwdMatch($pwd, $pwdrepeat) !== false) {
			header("location: ../profil.php?error=pwddontmatch");
			exit();
		}

		if($_SESSION["usertype"]==="buyers") {
			$lastname = $_POST["lastname"];
			$firstname =$_POST["firstname"];
			if(emptyInputLogin($firstname, $lastname) !== false) {
				header("location: ../profil.php?error=emptyinput");
				exit();
			}
			modifyBuyers($conn, $username, $lastname, $firstname);
		}

		else if($_SESSION["usertype"]==="sellers") {
			$name = $_POST["name"];
			if(emptyInputLogin($firstname, "notnull") !== false) {
				header("location: ../profil.php?error=emptyinput");
				exit();
			}
			modifySellers($conn, $username, $name);
		}

		modifyUsers($conn, $username, $email, $pwd);
		getUserInfo($conn, $username);
		header("location: ../profil.php?error=none");
		exit();
	}
	else {
		header("location: ../signup.php");
		exit();
	}