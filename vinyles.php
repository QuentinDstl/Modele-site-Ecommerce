<?php 
	include_once 'includes/databasehandler.inc.php';
	include_once "header.php";
?>



<div class="submenu-wrapper">
<div>
</div>
<div> Vinyles</div>
<div> </div>
</div>

<div class="submenu-wrapper">
<div></div>

	
	<div id="gallery-container">

<?php
	
	$sql = "SELECT * FROM items WHERE itemsCat ='vinyles';";  
	$result =mysqli_query($conn, $sql);
	$resultcheck = mysqli_num_rows($result);
	if($resultcheck > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			 echo' <div> 
			 <IMG SRC="'.$row["itemsImgs"].'" height="50%" width="25%"> 
			<br>
			<h3> '.$row ["itemsName"].'</h3>
			<p>'.$row["itemsDesc"].' <br> '.$row["itemsPrice"].'</p> </div>';		
			}
	}
?>
	</div>
	<div></div>
</div>
<?php 
	include_once "footer.php";
?>