<?php
	
	if(isset($_POST["submit"])) {

		$username = $_POST["uid"];
		if(!isset($_SESSION)) { 
			session_start(); 
		}
		$_SESSION["useruid"]=$username;

		require_once "databasehandler.inc.php";
		require_once "functions.inc.php";

		$raw = getUserInfo($conn, $username);

		header("location: ../index.php?");
		exit();
	}
	else {
		header("location: ../login.php");
		exit();
	}