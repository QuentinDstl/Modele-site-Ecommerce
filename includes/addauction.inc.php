<?php

	if(isset($_POST["submit"])) {

		$cat = $_POST["category"];
		$name = $_POST["name"];
		$price = intval($_POST["price"]);
		$desc = $_POST["description"];
		$file1 = $_FILES["image1"];
		$date = $_POST["date"];
		$sellerid = $_SESSION["userid"];

		require_once "databasehandler.inc.php";
		require_once "functions.inc.php";

		if(invalidPrice($price) !== false) {
			header("location: ../sell.php?error=invalidprice");
			exit();
		}

		if(emptyInputItem($cat, $name, $price) !== false) {
			header("location: ../sell.php?error=emptyinput&");
			exit();
		}

		if(invalidName($name) !== false) {
			header("location: ../sell.php?error=invalidname");
			exit();
		}
		
		if(invalidDesc($desc) !== false) {
			header("location: ../sell.php?error=invaliddesc");
			exit();
		}

		if(invalidDate($date) !== false) {
			header("location: ../sell.php?error=invaliddate");
			exit();
		}

		if(invalidImage($file1) !== false) {
			header("location: ../sell.php?error=invalidimg");
			exit();
		}

		if(invalidImageSize($file1) !== false) {
			header("location: ../sell.php?error=invalidimgsize");
			exit();
		}

		if(errorImage($file1) !== false) {
			header("location: ../sell.php?error=errorimg");
			exit();
		}

		createAuction($conn,  $cat, $name, $price, $desc, $file1, $date, $sellerid);
	}
	else {
		header("location: ../sell.php");
		exit();
	}