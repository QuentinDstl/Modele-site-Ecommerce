function changeSellType(Type) {
	document.cookie = "selltype=" + Type +"; path=../";
	console.log(document.cookie);
}

$(document).ready(function() {
	$(".sell-type input").click(function(){
		var theId = "#div-"+event.target.id;
		// chech if class exist
		if($(".sell-selected")[0]) {
			// replace it if class exist
			$(".sell-selected").addClass("sell-type");
			$(".sell-selected").removeClass("sell-selected");
		}
		$(theId).addClass("sell-selected");
		$(theId).removeClass("sell-type");

		theType = event.target.id;
		$.post("includes/setsession.inc.php", {key:"selltype",value:theType});
	});
});