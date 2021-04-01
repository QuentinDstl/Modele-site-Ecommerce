<?php
	if(isset($_POST["key"])) {
		session_start();
		$key = $_POST["key"];
		$value = $_POST["value"];

		$_SESSION[$key] = $value;
		header("location: ../sell.php");
		exit();
	}
	else {
		header("location: ../sell.php");
		exit();
	}