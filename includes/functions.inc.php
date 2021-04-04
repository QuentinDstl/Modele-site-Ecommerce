<?php
	function emptyInputSignup($lastname, $firstname, $email, $username, $pwd, $pwdrepeat, $number, $street, $city, $zip, $country) {

		$result;
		if(empty($lastname) || empty($firstname) || empty($email) || empty($username) || empty($pwd) || empty($pwdrepeat) || empty($number) || empty($street) || empty($city) || empty($zip) || empty($country)) {
			$result = true;
		}
		else {
			$result = false;
		}
		return $result;
	}

	function emptyInputClause($accept) {
		$result;
		if(empty($accept)) {
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

	function createAddress($number, $street, $city, $zip, $country) {
		$address;

		$address = $number.":".$street.":".$city.":".$zip.":".$country;
		return $address;
	}

	function createUser($conn, $lastname, $firstname, $username, $email, $pwd, $address) {
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

		// insert into buyers table :
		$_sql = "INSERT INTO buyers (buyersUid, buyersLastName, buyersFirstName, buyersAddress) VALUES (?,?,?,?);";
		$_stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($_stmt, $_sql)) {
			header("location: ../signup.php?error=stmtfailed");
			exit();
		}

		mysqli_stmt_bind_param($_stmt, "ssss", $username, $lastname, $firstname, $address);
		mysqli_stmt_execute($_stmt);
		mysqli_stmt_close($_stmt);

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
		}
	}

	function getUserInfo($conn, $username) {
		$table = "buyers";
		// $sql ="SELECT * FROM users INNER JOIN admins ON users.usersUid = admins.adminsUid;";
		$sql ="SELECT * FROM users INNER JOIN ? ON users.usersUid = ? WHERE users.usersUid = ?;";
		
		// $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			die("<pre>Prepare failed:\n".mysqli_error($conn)."\n$sql</pre>");
			// header("location: ../login.php?error=stmtfailed&".$error);
			// exit();
		}
		$checkTable = $table.".".$table."Uid";
		mysqli_stmt_bind_param($stmt, "sss", $table, $checkTable, $username);
		mysqli_stmt_execute($stmt);

		$resultData = mysqli_stmt_get_result($stmt);

		if($row = mysqli_fetch_assoc($resultData)) {
			return $row;
		}
		else {
			header("location: ../login.php?error=noresult");
			exit();
		}
		mysqli_stmt_close($stmt);
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

	function createItem($conn,  $cat, $name, $price, $desc, $file, $sellerid) {
		$itemKey = uniqid($sellerid,true); //same as : $sellerid.uniqid(true)

		$sql = "INSERT INTO items (itemsId, itemsCat, itemsName, itemsPrice, itemsDesc, itemsImgs) VALUES (?,?,?,?,?,?);";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ../sell.php?error=stmtfailed");
			exit();
		}

		// move picture to server
		$tmp=explode(".", $file["name"]);
		$fileExtension = strtolower(end($tmp));
		$fileDestination = "../images/uploads/".$itemKey.".".$fileExtension;
		move_uploaded_file($file["tmp_name"], $fileDestination);

		mysqli_stmt_bind_param($stmt, "sssiss", $itemKey, $cat, $name, $price, $desc, $fileDestination);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);

		// we know do the second sql request for the second table "normals"
		$_sql = "INSERT INTO normals (normalsId, normalsIdSeller) VALUES (?,?);";
		$_stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($_stmt, $_sql)) {
			header("location: ../sell.php?error=stmtfailed");
			exit();
		}
		mysqli_stmt_bind_param($_stmt, "si", $itemKey, $sellerid);
		mysqli_stmt_execute($_stmt);
		mysqli_stmt_close($_stmt);

		header("location: ../sell.php?error=none");
		exit();
	}

	function createOffer($conn,  $cat, $name, $price, $desc, $file, $sellerid) {
		$itemKey = uniqid($sellerid,true); //same as : $sellerid.uniqid(true)

		$sql = "INSERT INTO items (itemsId, itemsCat, itemsName, itemsPrice, itemsDesc, itemsImgs) VALUES (?,?,?,?,?,?);";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ../sell.php?error=stmtfailed");
			exit();
		}

		// move picture to server
		$fileExtension = strtolower(end(explode(".", $file["name"])));
		$fileDestination = "../images/uploads/".$itemKey.".".$fileExtension;
		move_uploaded_file($file["tmp_name"], $fileDestination);

		mysqli_stmt_bind_param($stmt, "sssiss", $itemKey, $cat, $name, $price, $desc, $fileDestination);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);

		// we know do the second sql request for the second table "offers"
		$numberOffers = 5;
		$_sql = "INSERT INTO offers (offersId, offersIdSeller, offersLeft, offersSellerPrice) VALUES (?,?,?,?);";
		$_stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($_stmt, $_sql)) {
			header("location: ../sell.php?error=stmtfailed");
			exit();
		}
		mysqli_stmt_bind_param($_stmt, "siii", $itemKey, $sellerid, $numberOffers, $price);
		mysqli_stmt_execute($_stmt);
		mysqli_stmt_close($_stmt);

		header("location: ../sell.php?error=none");
		exit();
	}

	function createAuction($conn,  $cat, $name, $price, $desc, $file, $date, $sellerid) {
		$itemKey = uniqid($sellerid,true); //same as : $sellerid.uniqid(true)

		$sql = "INSERT INTO items (itemsId, itemsCat, itemsName, itemsPrice, itemsDesc, itemsImgs) VALUES (?,?,?,?,?,?);";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ../sell.php?error=stmtfailed");
			exit();
		}

		// move picture to server
		$fileExtension = strtolower(end(explode(".", $file["name"])));
		$fileDestination = "../images/uploads/".$itemKey.".".$fileExtension;
		move_uploaded_file($file["tmp_name"], $fileDestination);

		mysqli_stmt_bind_param($stmt, "sssiss", $itemKey, $cat, $name, $price, $desc, $fileDestination);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);

		// we know do the second sql request for the second table "auctions"
		$_sql = "INSERT INTO auctions (auctionsId, auctionsDate) VALUES (?,?);";
		$_stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($_stmt, $_sql)) {
			header("location: ../sell.php?error=stmtfailed");
			exit();
		}
		mysqli_stmt_bind_param($_stmt, "ss", $itemKey, $date);
		mysqli_stmt_execute($_stmt);
		mysqli_stmt_close($_stmt);

		header("location: ../sell.php?error=none");
		exit();
	}