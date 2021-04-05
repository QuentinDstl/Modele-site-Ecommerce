<?php
	include_once 'includes/databasehandler.inc.php';
?>

<?php 
	include_once "header.php";
	

?>

<?php 
	include_once "filter.php";
?>



<div class="submenu-wrapper">
<div></div>

	<div id="gallery-container">

<?php

if(isset($_POST["submit"]))
{		
	
		$choicecat = $_POST["filter0"];
		$filtre = $_POST["filter1"];
		
	if($filtre == "direct")
	{
		if ($choicecat=="art"){
			$choicecat="paint";
			$filtrea="pictures";
			$sqla = "SELECT * FROM items  JOIN normals  ON items.itemsId = normals.normalsId WHERE (itemsCat = 'paint' OR itemsCat = 'pictures');";
					$resulta = mysqli_query($conn, $sqla);
					$resultchecka = mysqli_num_rows($resulta);
					if($resultchecka > 0) {
					while($row = mysqli_fetch_assoc($resulta)) {
						 echo' <div> <br>
							 <IMG SRC="'.$row["itemsImgs"].'" height="50%" width="25%"> 
								<br>
								<h1> '.$row ["itemsName"].'</h1> 
								'.$row["itemsDesc"].' 
								<br> '.$row["itemsPrice"].'  <br>
								<button type="checkbox" name="'.$row["itemsId"].' class="btn btn-animate" style="margin: auto">ADD</button>

								</div>';		
									}
						}
			}
		else if($choicecat == "music")
				{

					$sqlb = "SELECT * FROM items  JOIN normals  ON items.itemsId = normals.normalsId WHERE (itemsCat = 'cd' OR itemsCat = 'vinyles');";
					$resultb = mysqli_query($conn, $sqlb);
					
					$resultcheckb = mysqli_num_rows($resultb);
				if($resultcheckb > 0) {
					while($row = mysqli_fetch_array($resultb)) {
						 echo' <div> <br>
							 <IMG SRC="'.$row["itemsImgs"].'" height="50%" width="25%"> 
								<br>
								<h1> '.$row ["itemsName"].'</h1> 
								'.$row["itemsDesc"].' 
							 <br> '.$row["itemsPrice"].'    </div>';		
				}
			}
				
				}
		else if($choicecat=="paint"){

	$sql = "SELECT * FROM items  JOIN normals ON items.itemsId = normals.normalsId  WHERE (itemsCat = 'paint');";
	$result = mysqli_query($conn, $sql);
	$resultcheck = mysqli_num_rows($result);
	if($resultcheck > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			 echo' <div> <br>
			 <IMG SRC="'.$row["itemsImgs"].'" height="50%" width="25%"> 
			 <br>
			 <h1> '.$row ["itemsName"].'</h1> 
			 '.$row["itemsDesc"].' 
			 <br> '.$row["itemsPrice"].'    </div>';		
			  }
			}
		}
		else if($choicecat=="vinyles"){

	$sql = "SELECT * FROM items  JOIN normals ON items.itemsId = normals.normalsId  WHERE (itemsCat = 'vinyles');";
	$result = mysqli_query($conn, $sql);
	$resultcheck = mysqli_num_rows($result);
	if($resultcheck > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			 echo' <div> <br>
			 <IMG SRC="'.$row["itemsImgs"].'" height="50%" width="25%"> 
			 <br>
			 <h1> '.$row ["itemsName"].'</h1> 
			 '.$row["itemsDesc"].' 
			 <br> '.$row["itemsPrice"].'    </div>';		
			  }
			}
		}
		else if($choicecat=="pictures"){

	$sql = "SELECT * FROM items  JOIN normals ON items.itemsId = normals.normalsId  WHERE (itemsCat = 'pictures');";
	$result = mysqli_query($conn, $sql);
	$resultcheck = mysqli_num_rows($result);
	if($resultcheck > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			 echo' <div> <br>
			 <IMG SRC="'.$row["itemsImgs"].'" height="50%" width="25%"> 
			 <br>
			 <h1> '.$row ["itemsName"].'</h1> 
			 '.$row["itemsDesc"].' 
			 <br> '.$row["itemsPrice"].'    </div>';		
			  }
			}
		}
		else if($choicecat=="cd"){

	$sql = "SELECT * FROM items  JOIN normals ON items.itemsId = normals.normalsId  WHERE (itemsCat = 'cd');";
	$result = mysqli_query($conn, $sql);
	$resultcheck = mysqli_num_rows($result);
	if($resultcheck > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			 echo' <div> <br>
			 <IMG SRC="'.$row["itemsImgs"].'" height="50%" width="25%"> 
			 <br>
			 <h1> '.$row ["itemsName"].'</h1> 
			 '.$row["itemsDesc"].' 
			 <br> '.$row["itemsPrice"].'    </div>';		
			  }
			}
		}
	}


	if($filtre == "auctions")
	{
		if ($choicecat=="art"){
			
			$sqlc = "SELECT * FROM items  JOIN auctions ON items.itemsId = auctions.auctionsId  WHERE (itemsCat = '.paint.' OR
					 itemsCat = 'pictures');";
					$resultc = mysqli_query($conn, $sqlc);
					$resultcheckc = mysqli_num_rows($resultc);
					if($resultcheckc > 0) {
					while($row = mysqli_fetch_assoc($resultc)) {
						 echo' <div> <br>
							 <IMG SRC="'.$row["itemsImgs"].'" height="50%" width="25%"> 
								<br>
								<h1> '.$row ["itemsName"].'</h1> 
								'.$row["itemsDesc"].' 
								<br> Last proposal :'.$row["itemsPrice"].'  <br>
								<label for="ao-price" class="subtitle">Offer Price</label><br>
								<input type="text" name="price" id="ao-price" placeholder="Price of item ..."> <br>
								<button type="checkbox" name="'.$row["itemsId"].' class="btn btn-animate" style="margin: auto">ADD</button>

								</div>';		
									}
						}
			}
		else if($choicecat == "music")
				{
					
					$sqld = "SELECT * FROM items  JOIN auctions ON items.itemsId = auctions.auctionsId  WHERE( itemsCat = 'cd' OR itemsCat = 'vinyles');";
					$resultd = mysqli_query($conn, $sqld);
					$resultcheckd = mysqli_num_rows($resultd);
				if($resultcheckd > 0) {
					while($row = mysqli_fetch_assoc($resultd)) {
						 echo' <div> <br>
							 <IMG SRC="'.$row["itemsImgs"].'" height="50%" width="25%"> 
								<br>
								<h1> '.$row ["itemsName"].'</h1> 
								'.$row["itemsDesc"].' 
							 <br> The last proposal :  '.$row["itemsPrice"].'  <br>
							 <label for="ao-price" class="subtitle">Offer Price</label><br>
							<input type="text" name="price" id="ao-price" placeholder="Price of item ...">
							<br>
							<button type="checkbox" name="'.$row["itemsId"].' class="btn btn-animate" style="margin: auto">ADD</button>
							 </div>';		
				}
			}
				
				}
		else if($choicecat == "paint") {

	$sqle = "SELECT * FROM items INNER JOIN auctions ON items.itemsId = auctions.auctionsId  WHERE( items.itemsCat = 'paint');";
	$resulte = mysqli_query($conn, $sqle);
	$resultchecke = mysqli_num_rows($resulte);
	if($resultchecke > 0) {
		while($row = mysqli_fetch_assoc($resulte)) {
			 echo' <div> <br>
			 <IMG SRC="'.$row["itemsImgs"].'" height="50%" width="25%"> 
			 <br>
			 <h1> '.$row ["itemsName"].'</h1> 
			 '.$row["itemsDesc"].' 
			 <br> The last proposal :  '.$row["itemsPrice"].'<br> 
			 <label for="ao-price" class="subtitle">Offer Price</label><br>
			 <input type="text" name="price" id="ao-price" placeholder="Price of item ...">
			 <br>							
			 <button type="checkbox" name="'.$row["itemsId"].' class="btn btn-animate" style="margin: auto">ADD</button>

			 </div>';		
			  }
			}
		}
		else if($choicecat == "pictures") {

	$sqle = "SELECT * FROM items JOIN auctions ON items.itemsId = auctions.auctionsId  WHERE( itemsCat = 'pictures');";
	$resulte = mysqli_query($conn, $sqle);
	$resultchecke = mysqli_num_rows($resulte);
	if($resultchecke > 0) {
		while($row = mysqli_fetch_assoc($resulte)) {
			 echo' <div> <br>
			 <IMG SRC="'.$row["itemsImgs"].'" height="50%" width="25%"> 
			 <br>
			 <h1> '.$row ["itemsName"].'</h1> 
			 '.$row["itemsDesc"].' 
			 <br> The last proposal :  '.$row["itemsPrice"].'<br> 
			 <label for="ao-price" class="subtitle">Offer Price</label><br>
			 <input type="text" name="price" id="ao-price" placeholder="Price of item ...">
			 <br>							
			 <button type="checkbox" name="'.$row["itemsId"].' class="btn btn-animate" style="margin: auto">ADD</button>

			 </div>';		
			  }
			}
		}
		else if($choicecat == "cd") {

	$sqle = "SELECT * FROM items  JOIN auctions ON items.itemsId = auctions.auctionsId  WHERE (itemsCat = 'cd');";
	$resulte = mysqli_query($conn, $sqle);
	$resultchecke = mysqli_num_rows($resulte);
	if($resultchecke > 0) {
		while($row = mysqli_fetch_assoc($resulte)) {
			 echo' <div> <br>
			 <IMG SRC="'.$row["itemsImgs"].'" height="50%" width="25%"> 
			 <br>
			 <h1> '.$row ["itemsName"].'</h1> 
			 '.$row["itemsDesc"].' 
			 <br> The last proposal :  '.$row["itemsPrice"].'<br> 
			 <label for="ao-price" class="subtitle">Offer Price</label><br>
			 <input type="text" name="price" id="ao-price" placeholder="Price of item ...">
			 <br>							
			 <button type="checkbox" name="'.$row["itemsId"].' class="btn btn-animate" style="margin: auto">ADD</button>

			 </div>';		
			  }
			}
		}
		else if($choicecat == "vinyles") {

	$sqle = "SELECT * FROM items  JOIN auctions ON items.itemsId = auctions.auctionsId  WHERE (itemsCat = 'vinyles');";
	$resulte = mysqli_query($conn, $sqle);
	$resultchecke = mysqli_num_rows($resulte);
	if($resultchecke > 0) {
		while($row = mysqli_fetch_assoc($resulte)) {
			 echo' <div> <br>
			 <IMG SRC="'.$row["itemsImgs"].'" height="50%" width="25%"> 
			 <br>
			 <h1> '.$row ["itemsName"].'</h1> 
			 '.$row["itemsDesc"].' 
			 <br> The last proposal :  '.$row["itemsPrice"].'<br> 
			 <label for="ao-price" class="subtitle">Offer Price</label><br>
			 <input type="text" name="price" id="ao-price" placeholder="Price of item ...">
			 <br>							
			 <button type="checkbox" name="'.$row["itemsId"].' class="btn btn-animate" style="margin: auto">ADD</button>

			 </div>';		
			  }
			}
		}
	}


	
	if($filtre == "bid")
	{
		if ($choicecat=="art"){
			
			$sqlf = "SELECT * FROM items JOIN offers ON items.itemsId = offers.offersId  WHERE( itemsCat = 'paint' OR itemsCat='pictures');";
					$resultf = mysqli_query($conn, $sqlf);
					$resultcheckf = mysqli_num_rows($resultf);
					if($resultcheckf > 0) {
					while($row = mysqli_fetch_assoc($resultf)) {
						 echo' <div> <br>
							 <IMG SRC="'.$row["itemsImgs"].'" height="50%" width="25%"> 
								<br>
								<h1> '.$row ["itemsName"].'</h1> 
								'.$row["itemsDesc"].' 
								<br> The price :'.$row["itemsPrice"].'  <br>
								<label for="ao-price" class="subtitle">Make a bid </label><br>
								<input type="text" name="price" id="ao-price" placeholder="Price of item ..."> <br>
								<button type="checkbox" name="'.$row["itemsId"].' class="btn btn-animate" style="margin: auto">ADD</button>

								</div>';		
									}
						}
			}
		else if($choicecat == "music")
				{
					
					$sqlg = "SELECT * FROM items JOIN offers ON items.itemsId = offers.offersId  WHERE( itemsCat = 'cd' OR itemsCat='vinyles');";
					$resultg = mysqli_query($conn, $sqlg);
					$resultcheckg = mysqli_num_rows($resultg);
				if($resultcheckg > 0) {
					while($row = mysqli_fetch_assoc($resultg)) {
						 echo' <div> <br>
							 <IMG SRC="'.$row["itemsImgs"].'" height="50%" width="25%"> 
								<br>
								<h1> '.$row ["itemsName"].'</h1> 
								'.$row["itemsDesc"].' 
							 <br> The price :  '.$row["itemsPrice"].'  <br>
							 <label for="ao-price" class="subtitle">Make a bid </label><br>
							<input type="text" name="price" id="ao-price" placeholder="Price of item ...">
							<br>
							<button type="checkbox" name="'.$row["itemsId"].' class="btn btn-animate" style="margin: auto">ADD</button>
							 </div>';		
				}
			}
				
				}
		else if($choicecat=="paint"){

	$sqlh = "SELECT * FROM items JOIN offers ON items.itemsId = offers.offersId  WHERE items.itemsCat = 'paint';";
	$resulth = mysqli_query($conn, $sqlh);
	$resultcheckh = mysqli_num_rows($resulth);
	if($resultcheckh > 0) {
		while($row = mysqli_fetch_assoc($resulth)) {
			 echo' <div> <br>
			 <IMG SRC="'.$row["itemsImgs"].'" height="50%" width="25%"> 
			 <br>
			 <h1> '.$row ["itemsName"].'</h1> 
			 '.$row["itemsDesc"].' 
			 <br> The price :  '.$row["itemsPrice"].'<br> 
			 <label for="ao-price" class="subtitle">Make a bid</label><br>
			 <input type="text" name="price" id="ao-price" placeholder="Price of item ...">
			 <br>							
			 <button type="checkbox" name="'.$row["itemsId"].' class="btn btn-animate" style="margin: auto">ADD</button>

			 </div>';		
			  }
			}
		}
		else if($choicecat=="pictures"){

	$sqlh = "SELECT * FROM items JOIN offers ON items.itemsId = offers.offersId  WHERE items.itemsCat = 'pictures';";
	$resulth = mysqli_query($conn, $sqlh);
	$resultcheckh = mysqli_num_rows($resulth);
	if($resultcheckh > 0) {
		while($row = mysqli_fetch_assoc($resulth)) {
			 echo' <div> <br>
			 <IMG SRC="'.$row["itemsImgs"].'" height="50%" width="25%"> 
			 <br>
			 <h1> '.$row ["itemsName"].'</h1> 
			 '.$row["itemsDesc"].' 
			 <br> The price :  '.$row["itemsPrice"].'<br> 
			 <label for="ao-price" class="subtitle">Make a bid</label><br>
			 <input type="text" name="price" id="ao-price" placeholder="Price of item ...">
			 <br>							
			 <button type="checkbox" name="'.$row["itemsId"].' class="btn btn-animate" style="margin: auto">ADD</button>

			 </div>';		
			  }
			}
		}
		else if($choicecat=="cd"){

	$sqlh = "SELECT * FROM items JOIN offers ON items.itemsId = offers.offersId  WHERE items.itemsCat = 'cd';";
	$resulth = mysqli_query($conn, $sqlh);
	$resultcheckh = mysqli_num_rows($resulth);
	if($resultcheckh > 0) {
		while($row = mysqli_fetch_assoc($resulth)) {
			 echo' <div> <br>
			 <IMG SRC="'.$row["itemsImgs"].'" height="50%" width="25%"> 
			 <br>
			 <h1> '.$row ["itemsName"].'</h1> 
			 '.$row["itemsDesc"].' 
			 <br> The price :  '.$row["itemsPrice"].'<br> 
			 <label for="ao-price" class="subtitle">Make a bid</label><br>
			 <input type="text" name="price" id="ao-price" placeholder="Price of item ...">
			 <br>							
			 <button type="checkbox" name="'.$row["itemsId"].' class="btn btn-animate" style="margin: auto">ADD</button>

			 </div>';		
			  }
			}
		}
		else if($choicecat=="vinyles"){

	$sqlh = "SELECT * FROM items JOIN offers ON items.itemsId = offers.offersId  WHERE items.itemsCat = 'vinyles';";
	$resulth = mysqli_query($conn, $sqlh);
	$resultcheckh = mysqli_num_rows($resulth);
	if($resultcheckh > 0) {
		while($row = mysqli_fetch_assoc($resulth)) {
			 echo' <div> <br>
			 <IMG SRC="'.$row["itemsImgs"].'" height="50%" width="25%"> 
			 <br>
			 <h1> '.$row ["itemsName"].'</h1> 
			 '.$row["itemsDesc"].' 
			 <br> The price :  '.$row["itemsPrice"].'<br> 
			 <label for="ao-price" class="subtitle">Make a bid</label><br>
			 <input type="text" name="price" id="ao-price" placeholder="Price of item ...">
			 <br>							
			 <button type="checkbox" name="'.$row["itemsId"].' class="btn btn-animate" style="margin: auto">ADD</button>

			 </div>';		
			  }
			}
		}
	}
}

?>

<?php 
	include_once "footer.php";
?>