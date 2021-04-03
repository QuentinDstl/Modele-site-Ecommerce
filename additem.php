<div class="flex-wrapper">
	<section class="form-type">
		<h2>Add Item</h2><br>
		<form action="includes/additem.inc.php" method="post" enctype="multipart/form-data">
			<p>
				<label for="ai-category" class="subtitle">Select Category</label><br>
				<select name="category" id="ai-category">
					<option value="">--Please choose an option--</option>
					<option value="NFT">NFT</option>
				</select>
				<br>
			</p>

			<p>
				<label for="ai-name" class="subtitle">Item Name</label><br>
				<input type="text" name="name" id="ai-name" placeholder="Name of item ...">
				<br>
			</p>

			<p>
				<label for="ai-price" class="subtitle">Item Price</label><br>
				<input type="text" name="price" id="ai-price" placeholder="Price of item ..."><br>
			</p>

			<p>
				<label for="ai-description" class="subtitle">Item Description</label><br>
				<input type="text" name="description" id="ai-description" placeholder="Description of item ..."><br>
			</p>

			<p>
				<label for="ai-image1" class="subtitle">Item Picture</label><br>
				<input type="file" name="image1" id="ai-image1"><br>
				<br>
			</p>

			<div class="flex-wrapper">
				<button type="submit" name="submit" class="btn btn-animate" style="margin: auto">Add Item</button>
			</div>
		</form>

		<div class="error">
			<?php
				if(isset($_GET["error"])) {
					if($_GET["error"]=="emptyinput") {
						echo "<br><p>Fill in all field & use numbers for price !</p>";
					}
					else if($_GET["error"]=="invalidname") {
						echo "<br><p>Use only letters and numbers in your username !</p>";
					}
					else if($_GET["error"]=="invalidprice") {
						echo "<br><p>Use only numbers for your price !</p>";
					}
					else if($_GET["error"]=="invaliddesc") {
						echo "<br><p>Your description is more then 250 character !</p>";
					}
					else if($_GET["error"]=="invalidimg") {
						echo "<br><p>Your image dont have good format !</p>";
					}
					else if($_GET["error"]=="invalidimgsize") {
						echo "<br><p>Your image is to big !</p>";
					}
					else if($_GET["error"]=="errorimg") {
						echo "<br><p>Problem while loading image !</p>";
					}
					else if($_GET["error"]=="stmtfailed") {
						echo "<br><p>Something went wrong, try again!</p>";
					}
					else if($_GET["error"]=="none") {
						echo "<br><p style='color:green'>You have add an new item !</p>";
					}
				}
			?>
		</div>
	</section>
</div>