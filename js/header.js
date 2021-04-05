var colors = ["#23CE6B", "#5386E4", "#ED315D", "#CBFF47", "#7E3F8F", "#027C8D", "#BCAF9C", "#FF8811"];
var selectedColor = 0;

$(document).ready(function() {
	document.documentElement.style.setProperty("--color", colors[getRandomInt(colors.length)]);
	var location = window.location.href;

	$("#low-header a").each(function () {
		var linkPage = this.href;

		if (location == linkPage) {
			$(this).closest("div").addClass("active");
		}
	});	
});

function getRandomInt(max) {
  return Math.floor(Math.random() * max);
}