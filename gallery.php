
<?php 
	include_once 'includes/databasehandler.inc.php';
	
?>

<div class="gallery-design">
<div></div>

	
	<div class="gallery-container">

<?php


	if(isset($_POST["submit"]))
	{		
		$choicecat = $_POST["filter0"];
		
		
	}

	

	



	
	


	$sql = "SELECT * FROM items WHERE itemsName='Coco';";  
	$result =mysqli_query($conn, $sql);
	$resultcheck = mysqli_num_rows($result);
	if($resultcheck > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			 echo' <div> <br>
			 <IMG SRC="'.$row["itemsImgs"].'  " height="50%" width="25%"> 
			<br>
			<h1> '.$row ["itemsName"].'</h1> 
			'.$row["itemsDesc"].' 
			<br> '.$row["itemsPrice"].'    </div>';		
			}
	
	
	}
?>
	</div>

	<div></div>

</div>


