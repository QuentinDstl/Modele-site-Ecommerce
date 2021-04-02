<?php 
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
		echo "no sell type yet";
	}
?>

<?php 
	include_once "footer.php";
?>