<?php 
	include_once "header.php";
?>

<div class="flex-wrapper">
	<section class="form-type">
		<h2>Login</h2><br>
		<form action="includes/login.inc.php" method="post">
			<p>
				<label for="uid" class="subtitle">Your User Name or your Email</label>
				<input type="text" name="uid" id="uid" placeholder="Username/Email ..."><br>
			</p>
			<p>
				<label for="pwd" class="subtitle">Your Password</label>
				<input type="password" name="pwd" id="pwd" placeholder="Password ..."><br>
			</p>

			<div class="flex-wrapper">
				<button type="submit" name="submit" class="btn" style="margin: auto">Login</button>
			</div>
		</form>
		<!-- ERROR SECTION -->
		<div class="error">
			<?php
				if(isset($_GET["error"])) {
					if($_GET["error"]=="emptyinput") {
						echo "<br><p>Fill in all field</p>";
					}
					else if($_GET["error"]=="wronglogin") {
						echo "<br><p>Bad login information !</p>";
					}
					else if($_GET["error"]=="stmtfailed") {
						echo "<br><p>Error in database, Restart !</p>";
					}
					else if($_GET["error"]=="noresult") {
						echo "<br><p>Your account is no longer valid!<br>Please Create a new one.</p>";
					}
				}
			?>
		</div>
		<p>
			<br><a href="signup.php" style="text-align: center; color: var(--color)">You don't have any account ?</a>
		</p>
	</section>
</div>
<?php 
	include_once "footer.php";
?>