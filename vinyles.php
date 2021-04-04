<?php 
	include_once 'includes/databasehandler.inc.php';
	include_once "header.php";
?>

<div class="submenu-wrapper">

	<h2> Paint </h2>
	<div class="gallery-container">

<?php
	
	$sql = "SELECT * FROM items;";  
	$stmt = mysqli_stmt_init($conn);
	if(mysqli_stmt_prepare($stmt, $sql)){
	echo "SQL statement failed ! ";
	} else {
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		while ($row = mysqli_fetch_assoc($result))
		{
			echo' <a href="#">
			<div style="background-image: url(images/'.$row ["itemsImgs"].') > </div>
			<h3> '.$row ["itemsName"].'</h3>
			<p>'.$row["itemsDesc"].' <br> '.$row["itemsPrice"].' £  </p>
			</a>';
		}
	}

?>
	</div>

</div>
	require_once "databasehandler.inc.php";


<?php 
	include_once "footer.php";
?>