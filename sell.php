<?php
	session_start();
	if($_SESSION["usertype"]==="sellers" || $_SESSION["usertype"]==="admins") { 
		include_once "header.php";
?>

<script type="text/javascript" src="js/selltype.js"></script>

<div class="submenu-wrapper">
	<div></div>
	<div id="sell-menu">
		<div class="sell-type" id="div-item"><input type="button" id="item" value="Buy it now"></div>
		<div class="sell-type" id="div-offer"><input type="button" id="offer" value="Best Offer"></div>
		<div class="sell-type" id="div-auction"><input type="button" id="auction" value="Auctions"></div>
	</div>
	<div></div>
</div>
<div>

<?php
	if(isset($_SESSION["selltype"])) {
		if($_SESSION["selltype"] === "item") {
			include_once "additem.php";
		}
		else if($_SESSION["selltype"] === "offer") {
			include_once "addoffer.php";
		}
		else if($_SESSION["selltype"] === "auction") {
			include_once "addauction.php";
		}
	}
	else {
		// presenter les style de ventes différents
		echo '
			<div class="flex-wrapper">
				<img src="images/upper.gif" alt="upper-arrow" width="80" style="margin:auto">
			</div>
			<div style="text-align: center">
				<span class="subtitle">You can chose the sell type for your items :</span><br>
				1: buy the item at is original cost.<br>
				2: Buyers will propose you some offers to get the item.<br>
				3: Aunctions you can bid for the item for a a fixe period of time and the higgest bidder wins.<br>
			</div>
		';
	}
?>

<?php
		include_once "footer.php";
	}
	else {
		header("location: login.php");
		exit();
	}
?>