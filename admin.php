<?php
	session_start();
	if($_SESSION["usertype"]==="admins") {
		include_once "header.php";
?>

<?php
		include_once "footer.php";
	}
	else {
		header("location: login.php");
		exit();
	}
?>