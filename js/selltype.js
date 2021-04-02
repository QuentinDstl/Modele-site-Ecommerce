$(document).ready(function() {
	$.post("includes/getsession.inc.php", {key:"selltype"}).done(function( data ) {
		if(typeof data === "string"){
			var theId = "#div-" + data;
			// chech if class exist
			if($(".sell-selected")[0]) {
				// replace it if class exist
				$(".sell-selected").addClass("sell-type");
				$(".sell-selected").removeClass("sell-selected");
			}
			$(theId).addClass("sell-selected");
			$(theId).removeClass("sell-type");
		}
	});

	$(".sell-type input").click(function(){
		var theId = "#div-" + event.target.id;
		// chech if class exist
		if($(".sell-selected")[0]) {
			// replace it if class exist
			$(".sell-selected").addClass("sell-type");
			$(".sell-selected").removeClass("sell-selected");
		}
		$(theId).addClass("sell-selected");
		$(theId).removeClass("sell-type");

		var theType = event.target.id;
		$.post("includes/setsession.inc.php", {key:"selltype",value:theType});
		location.reload();
	});
});