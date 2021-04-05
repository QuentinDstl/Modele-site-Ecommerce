<?php 
	include_once 'includes/databasehandler.inc.php';
	include_once "header.php";
?>



<div class="submenu-wrapper">
<div>
</div>
<div> Paint</div>
<div> </div>
</div>



<div class="submenu-wrapper">
<div></div>

	
	<div id="gallery-container">

<?php
	
	$sql = "SELECT * FROM items WHERE itemsCat ='paint';";  
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



<div class="submenu-wrapper">
<div>
</div>
<div> Pictures</div>
<div> </div>
</div>

<div class="submenu-wrapper">
<div></div>

	
	<div id="gallery-container">

<?php
	
	$sqla = "SELECT * FROM items WHERE itemsCat ='pictures';";  
	$resulta =mysqli_query($conn, $sqla);
	$resultchecka = mysqli_num_rows($resulta);
	if($resultchecka > 0) {
		while($rowa = mysqli_fetch_assoc($resulta)) {
			 echo' <div> 
			 <IMG SRC="'.$rowa["itemsImgs"].'" height="50%" width="25%"> 
			<br>
			<h3> '.$rowa ["itemsName"].'</h3>
			<p>'.$rowa["itemsDesc"].' <br> '.$rowa["itemsPrice"].'</p> </div>';		
			}
	}
?>
	</div>
	<div></div>
</div>
<?php 
	include_once "footer.php";
?>