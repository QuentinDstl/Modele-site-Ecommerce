<?php 
	include_once "header.php";
?>

<div class="flex-wrapper">
	<section class="form-type">
		<h2>Sign Up</h2><br>
		<form action="includes/signup.inc.php" method="post">
			<p>
				<label for="name" class="subtitle">Your Name</label>
				<input type="text" name="name" id="name" placeholder="Full name ...">
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