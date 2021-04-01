<div class="flex-wrapper">
	<section class="form-type">
		<h2>Add item</h2><br>
		<form action="includes/additem.inc.php" method="post" enctype="multipart/form-data">
			<p>
				<label for="category" class="subtitle">Select Category</label>
				<select name="category" id="category">
					<option value="">--Please choose an option--</option>
					<option value="NFT">NFT</option>
				</select>
			</p>

			<p>
				<label for="name" class="subtitle">Item Name</label>
				<input type="text" name="name" id="name" placeholder="Name of item ...">
				<br>
			</p>
			<p>
				<label for="price" class="subtitle">Item Price</label>
				<input type="text" name="price" id="price" placeholder="Price of item ..."><br>
			</p>
			<p>
				<label for="description" class="subtitle">Item Description</label>
				<input type="text" name="description" id="description" placeholder="Description of item ..."><br>
			</p>

			<p>
				<label for="image1" class="subtitle">Item Description</label>
				<input type="file" name="image1" id="image1"><br>
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
				}
			?>
		</div>
	</section>
</div>