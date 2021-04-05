<?php
	session_start();
	if(isset($_SESSION["usertype"])) {
		include_once "header.php";
?>

<div class="flex-wrapper">
	<section class="form-type">
		
		<h2>Info</h2><br>
		<form action="includes/profil.inc.php" method="post">
			<p>
				<label for="update-email" class="subtitle">Your New Email</label>
				<input type="text" name="email" id="update-email" value= "<?php echo $_SESSION["useremail"]; ?>"><br>
			</p>
			<p>
				<label for="update-pwd" class="subtitle">Your New Password</label>
				<input type="password" name="pwd" id="update-pwd" placeholder="For security enter password"><br>
			</p>
			<p>
				<label for="update-repeatpwd" class="subtitle">Repeat New Password</label>
				<input type="password" name="repeatpwd" id="update-repeatpwd" placeholder="For security repeat password"><br>
			</p>
			<?php
				if($_SESSION["usertype"]==="buyers") {
					echo "
						<p>
							<label for='update-firstname' class='subtitle'>Your New FirstName</label>
							<input type='text' name='firstname' id='update-firstname' value='".$_SESSION["firstname"]."'><br>
						</p>
						<p>
							<label for='update-lastname' class='subtitle'>Your New LastName</label>
							<input type='text' name='lastname' id='update-lastname' value='".$_SESSION["lastname"]."'><br>
						</p>
						<p>
							<label for='update-address' class='subtitle'>Your New Address</label>
							<input type='text' name='address' id='update-address' value='".$_SESSION["address"]."'><br>
						</p>
					";
				}
				else if($_SESSION["usertype"]==="sellers") {
					echo "
						<p>
							<label for='update-name' class='subtitle'>Your New Name</label>
							<input type='text' name='name' id='update-name'><br>
						</p>
					";
				}
			?>
			<div class="flex-wrapper">
				<button type="submit" name="submit" class="btn btn-animate" style="margin: auto">Update Infos</button>
			</div>
		</form>
		<!-- ERROR SECTION -->
		<div class="error">
			<?php
				if(isset($_GET["error"])) {
					if($_GET["error"]=="emptyinput") {
						echo "<br><p>Fill in all field</p>";
					}
					else if($_GET["error"]=="invalidemail") {
						echo "<br><p>Not valid email !</p>";
					}
					else if($_GET["error"]=="pwddontmatch") {
						echo "<br><p>Password don't match !</p>";
					}
					else if($_GET["error"]=="stmtfailed") {
						echo "<br><p>Error in database, Restart !</p>";
					}
					else if($_GET["error"]=="none") {
						echo "<br><p style='color:green'>Informations updated!</p>";
					}
				}
			?>
		</div>

	</section>
</div>

<?php 
	include_once "footer.php";
?>

<?php 
	}
	else {
		header("location: login.php");
		exit();
	}
?>