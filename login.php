<?php 
	include_once "header.php";
?>

<div class="flex-wrapper">
	<section class="signup-form">
		<h2>Login</h2><br>
		<form action="includes/login.inc.php" method="post">
			<p>
				<label for="name">Your User Name or your Email</label>
				<input type="text" name="uid" id="uid" placeholder="Username/Email ..."><br>
			</p>
			<p>
				<label for="name">Your Password</label>
				<input type="password" name="pwd" id="pwd" placeholder="Password ..."><br>
			</p>
			<p>
				<button type="submit" name="submit">Login</button>
			</p>
		</form>
		<!-- ERROR SECTION -->
		<?php
			if(isset($_GET["error"])) {
				if($_GET["error"]=="emptyinput") {
					echo "<p>Fill in all field</p>";
				}
				else if($_GET["error"]=="wronglogin") {
					echo "<p>Bad login information !</p>";
				}
			}
		?>
	</section>
</div>
<?php 
	include_once "footer.php";
?>