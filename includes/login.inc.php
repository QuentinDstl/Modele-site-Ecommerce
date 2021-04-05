<?php
	
	if(isset($_POST["submit"])) {

		$username = $_POST["uid"];
		$pwd = $_POST["pwd"];

		require_once "databasehandler.inc.php";
		require_once "functions.inc.php";

		if(emptyInputLogin($username, $pwd) !== false) {
			header("location: ../login.php?error=emptyinput");
			exit();
		}

		loginUser($conn, $username, $pwd);
		$raw = getUserInfo($conn, $username);

		header("location: ../index.php?");
		exit();
	}
	else {
		header("location: ../login.php");
		exit();
	}