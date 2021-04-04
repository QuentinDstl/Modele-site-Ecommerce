<?php 
	include_once "header.php";
?>

<div class="flex-wrapper">
	<section class="form-type">
		<h2>Sign Up</h2><br>
		<form action="includes/signup.inc.php" method="post">
			<p>
				<label for="lastname" class="subtitle">Your Last Name</label>
				<input type="text" name="lastname" id="lastname" placeholder="Last name ...">
				<br>
			</p>
			<p>
				<label for="firstname" class="subtitle">Your First Name</label>
				<input type="text" name="firstname" id="firstname" placeholder="First name ...">
				<br>
			</p>
			<p>
				<label for="email" class="subtitle">Your Email</label>
				<input type="text" name="email" id="email" placeholder="Email ..."><br>
			</p>
			<p>
				<label for="uid" class="subtitle">Your User Name</label>
				<input type="text" name="uid" id="uid" placeholder="User name ..."><br>
			</p>
			<p>
				<label for="pwd" class="subtitle">Your Password</label>
				<input type="password" name="pwd" id="pwd" placeholder="Password ..."><br>
			</p>
			<p>
				<label for="pwdrepeat" class="subtitle">Repeat your Password</label>
				<input type="password" name="pwdrepeat" id="pwdrepeat" placeholder="Repeat Password ..."><br>
			</p>
			<p class="subtitle" style="text-align: center"> Address </p>
			<div style="border: 1px solid var(--black); border-radius: 4px; padding: 10px">
				<p>
					<label for="number" class="subtitle">Your Building Number</label>
					<input type="text" name="number" id="number" placeholder="Building number ...">
					<br>
				</p>

				<p>
					<label for="street" class="subtitle">Your Street</label>
					<input type="text" name="street" id="street" placeholder="Street name ...">
					<br>
				</p>

				<p>
					<label for="city" class="subtitle">Your City</label>
					<input type="text" name="city" id="city" placeholder="City name ...">
					<br>
				</p>

				<p>
					<label for="zip" class="subtitle">Your ZIP Code</label>
					<input type="text" name="zip" id="zip" placeholder="Region zip code ...">
					<br>
				</p>

				<p>
					<label for="country" class="subtitle">Your Country</label><br>
					<select name="country" id="country">
						<option value="">--Choose a country--</option>
						<option value="fr">France</option>
						<option value="us">USA</option>
						<option value="en">England</option>
					</select>
					<br>
				</p>
			</div>
			<br>
			<p style="text-align: center">
				<label for="accept" class="subtitle">Accept the Clause : &nbsp&nbsp&nbsp&nbsp</label>
				<input type="checkbox" name="accept" id="accept" value="yes">
				<br>
				If I make an offer on an item,<br>
				I am legally contracted to purchase it<br>
				if the seller accepts the offer.<br>
				<br>
			</p>

			<div class="flex-wrapper">
				<button type="submit" name="submit" class="btn" style="margin: auto">Login</button>
			</div>
		</form>

		<div class="error">
			<?php
				if(isset($_GET["error"])) {
					if($_GET["error"]=="emptyinput") {
						echo "<br><p>Fill in all field</p>";
					}
					else if($_GET["error"]=="invaliduid") {
						echo "<br><p>Use only letters and numbers in your username !</p>";
					}
					else if($_GET["error"]=="invalidemail") {
						echo "<br><p>Choose a proper email!</p>";
					}
					else if($_GET["error"]=="pwddontmatch") {
						echo "<br><p>Password doesn't match!</p>";
					}
					else if($_GET["error"]=="stmtfailed") {
						echo "<br><p>Something went wrong, try again!</p>";
					}
					else if($_GET["error"]=="uidtaken") {
						echo "<br><p>Username already taken!</p>";
					}
					else if($_GET["error"]=="emptyclause") {
						echo "<br><p>Please accept clause !</p>";
					}
					else if($_GET["error"]=="none") {
						echo "<br><p style='color:green'>You have signed up!</p>";
					}
				}
			?>
		</div>
	</section>
</div>



<?php
	include_once "footer.php";
?>