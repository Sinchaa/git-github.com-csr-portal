<?php 
	include("no_events.php");
?>

<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
i=<?php echo $EventsUpcoming; ?>  //51.08;
j=<?php echo $EventsConducted; ?>  //48.92;
var chart2 = new CanvasJS.Chart("chartContainer2", {
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	exportEnabled: true,
	animationEnabled: true,
	title: {
		text: "Events"
	},
	data: [{
		type: "pie",
		startAngle: 25,
		toolTipContent: "<b>{label}</b>: {y}",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - {y}",
		dataPoints: [
			{ y: i, label: "Upcoming Events" },
			{ y: j, label: "Conducted" },
		]
	}]
});
chart2.render();

}
</script>
</head>
<body>
<div id="chartContainer2" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>