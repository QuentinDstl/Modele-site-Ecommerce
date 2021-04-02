<?php
	function emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat) {

		$result;
		if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdrepeat)) {
			$result = true;
		}
		else {
			$result = false;
		}
		return $result;
	}

	function invalidUid($username) {

		$result;
		if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
			$result = true;
		}
		else {
			$result = false;
		}
		return $result;
	}

	function invalidEmail($email) {

		$result;
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$result = true;
		}
		else {
			$result = false;
		}
		return $result;
	}

	function pwdMatch($pwd, $pwdrepeat) {

		$result;
		if($pwd !== $pwdrepeat) {
			$result = true;
		}
		else {
			$result = false;
		}
		return $result;
	}

	function uidExists($conn, $username, $email) {
		$sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ../signup.php?error=stmtfailed");
			exit();
		}

		mysqli_stmt_bind_param($stmt, "ss", $username, $email);
		mysqli_stmt_execute($stmt);

		$resultData = mysqli_stmt_get_result($stmt);

		if($row = mysqli_fetch_assoc($resultData)) {
			return $row;
		}
		else {
			$result = false;
			return $result;
		}
		mysqli_stmt_close($stmt);
	}

	function createUser($conn, $username, $email, $pwd) {
		$sql = "INSERT INTO users (usersUid, usersEmail, usersPwd) VALUES (?,?,?);";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ../signup.php?error=stmtfailed");
			exit();
		}

		$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

		mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		header("location: ../signup.php?error=none");
		exit();
	}

	function emptyInputLogin($username, $pwd) {

		$result;
		if(empty($username) || empty($pwd)) {
			$result = true;
		}
		else {
			$result = false;
		}
		return $result;
	}

	function loginUser($conn, $username, $pwd) {
		$uidExists = uidExists($conn, $username, $username);

		if($uidExists === false) {
			header("location: ../login.php?error=wronglogin");
			exit();
		}

		$pwdHashed = $uidExists["usersPwd"];
		$checkPwd = password_verify($pwd, $pwdHashed);

		if($checkPwd === false) {
			header("location: ../login.php?error=wronglogin");
			exit();
		}
		else if($checkPwd === true) {
			session_start();
			$_SESSION["userid"] = $uidExists["usersId"];
			$_SESSION["useruid"] = $uidExists["usersUid"];
			header("location: ../index.php");
			exit();
		}
	}

	function emptyInputItem($cat, $name, $price) {

		$result;
		if(empty($cat) || empty($name) || empty($price)) {
			$result = true;
		}
		else {
			$result = false;
		}
		return $result;
	}

	function invalidName($name) {

		$result;
		if(!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
			$result = true;
		}
		else {
			$result = false;
		}
		return $result;
	}

	function invalidPrice($price) {
		$result;
		if(!is_int($price)) {
			$result = true;
		}
		else {
			$result = false;
		}
		return $result;
	}

	function invalidDesc($desc) {

		$result;
		if(strlen($desc)>250) {
			$result = true;
		}
		else {
			$result = false;
		}
		return $result;
	}

	function invalidImage($file) {
		$result;
		$allowedExtensions = array("jpg", "jpeg", "png", "gif");

		$fileName = $file["name"];

		$fileExtension = explode(".", $fileName);
		$fileActualExtension = strtolower(end($fileExtension));
		
		if(!in_array($fileActualExtension, $allowedExtensions)) {
			$result = true;
		}
		else {
			$result = false;
		}
		return $result;
	}

	function invalidImageSize($file) {
		$result;

		$fileSize = $file["size"];

		if($fileSize > 5000000) {
			$result = true;
		}
		else {
			$result = false;
		}
		return $result;
	}

	function errorImage($file) {
		$result;

		$fileError = $file["error"];

		if($fileError !== 0) {
			$result = true;
		}
		else {
			$result = false;
		}
		return $result;
	}

	function invalidDate($date) {
		$result;
		
		$deadline = new DateTime($date);
		$now = new DateTime();

		if($deadline < $now) {
			$result = true;
		}
		else {
			$result = false;
		}
		return $result;
	}

