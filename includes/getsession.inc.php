<?php
	if(isset($_POST["key"])) {
		session_start();
		$key = $_POST["key"];

		echo $_SESSION[$key];
	}
	else {
		header("location: ../sell.php");
		exit();
	}