<?php 
	include_once "header.php";
?>

<div class="flex-wrapper">
	<section class="signup-form">
		<h2>Sign Up</h2><br>
		<form action="includes/signup.inc.php" method="post">
			<p>
				<label for="name">Your Name</label>
				<input type="text" name="name" id="name" placeholder="Full name ...">
				<br>
			</p>
			<p>
				<label for="email">Your Email</label>
				<input type="text" name="email" id="email" placeholder="Email ..."><br>
			</p>
			<p>
				<label for="uid">Your User Name</label>
				<input type="text" name="uid" id="uid" placeholder="User name ..."><br>
			</p>
			<p>
				<label for="pwd">Your Password</label>
				<input type="password" name="pwd" id="pwd" placeholder="Password ..."><br>
			</p>
			<p>
				<label for="pwdrepeat">Repeat your Password</label>
				<input type="password" name="pwdrepeat" id="pwdrepeat" placeholder="Repeat Password ..."><br>
			</p>
			<p>
				<button type="submit" name="submit">Sign Up</button>
			</p>
		</form>
		<!-- ERROR SECTION -->
		<?php
			if(isset($_GET["error"])) {
				if($_GET["error"]=="emptyinput") {
					echo "<p>Fill in all field</p>";
				}
				else if($_GET["error"]=="invaliduid") {
					echo "<p>Use only letters and numbers in your username !</p>";
				}
				else if($_GET["error"]=="invalidemail") {
					echo "<p>Choose a proper email!</p>";
				}
				else if($_GET["error"]=="pwddontmatch") {
					echo "<p>Password doesn't match!</p>";
				}
				else if($_GET["error"]=="stmtfailed") {
					echo "<p>Something went wrong, try again!</p>";
				}
				else if($_GET["error"]=="uidtaken") {
					echo "<p>Username already taken!</p>";
				}
				else if($_GET["error"]=="none") {
					echo "<p>You have signed up!</p>";
				}
			}
		?>
	</section>
</div>



<?php
	include_once "footer.php";
?>