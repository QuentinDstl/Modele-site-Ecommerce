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
		echo $_SESSION["selltype"];
	}
	else {
		echo "no sell type yet";
	}
	

?>

<?php 
	include_once "additem.php";
?>
<?php 
	include_once "footer.php";
?>