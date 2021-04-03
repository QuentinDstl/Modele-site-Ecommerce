<?php 
	include_once 'includes/databasehandler.inc.php';
	include_once "header.php";
?>

<div class="submenu-wrapper">

	<h2> Paint </h2>
	<div class="gallery-container">

<?php
	
	$sql = "SELECT * FROM items;";  
	$result =mysqli_query($conn, $sql);
	$resultcheck = mysqli_num_rows($result);
	if($resultcheck > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			echo $row['itemsName'] . "<br>";
		}
	}
?>

<?php 
	include_once "footer.php";
?>