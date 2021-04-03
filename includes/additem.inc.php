<?php
	if(isset($_POST["submit"])) {

		session_start();

		$cat = $_POST["category"];
		$name = $_POST["name"];
		$price = intval($_POST["price"]);
		$desc = $_POST["description"];
		$file1 = $_FILES["image1"];
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

		if(invalidImage($file1) !== false) {
			header("location: ../sell.php?error=invalidimg");
			exit();
		}

		if(invalidImageSize($file1) !== false) {
			header("location: ../sell.php?error=invalidimgsize");
			exit();
		}

		if(ErrorImage($file1) !== false) {
			header("location: ../sell.php?error=errorimg");
			exit();
		}

		createItem($conn,  $cat, $name, $price, $desc, $file1, $sellerid);
	}
	else {
		header("location: ../sell.php");
		exit();
	}