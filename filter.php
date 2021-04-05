<?php 
include_once 'includes/databasehandler.inc.php';
?>


<div class="submenu-wrapper">
	<div></div>
	<form action="shop.php" method="post" enctype="multipart/form-data">
	<div id="filter-menu">
		
		<div >
			<label for="filter0" >CATEGORIES</label><br>
			<select name="filter0" id="filter0">
				<option value="">--Choose an option--</option>
				<option value="art">Art</option>
				<option value="music">Music</option> 
				<option value="cd">Cd</option>
				<option value="vinyles">Vyniles</option>
				<option value="paint">Paint</option>
				<option value="pictures">Pictures</option>
				
			</select>
		</div>
		<div >
			<label for="filter1" >AUCTIONS</label><br>
			<input type="radio" id="filter1" name="filter1" value="auctions" >
		</div>
		<div >
			<label for="filter1">BID</label><br>
			<input type="radio" id="filter2" name="filter1" value="bid">
		</div>
		<div >
			<label for="filter1">DIRECT</label><br>
			<input type="radio" id="filter3" name="filter1" value="direct">
		</div>
				
		<div id="slidecontainer">
			<label for="slider">MAX PRICE</label><br>
			<input type="range" min="1" max="100" value="50" class="slider" id="myRange">
		</div>

	</div> 
	
		<div>
				<br>
				<button type="checkbox" name="submit" class="btn btn-animate" style="margin: auto">Filter</button>
				</div>
	</form>

</div>

