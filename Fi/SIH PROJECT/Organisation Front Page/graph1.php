<?php 
	include("no_events.php");
?>

<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
i=<?php echo $UsersIndCount; ?>  //51.08;
j=<?php echo $UsersCompanyCount; ?>  //48.92;
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	exportEnabled: true,
	animationEnabled: true,
	title: {
		text: "Users Count"
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
			{ y: i, label: "Individual" },
			{ y: j, label: "Organisation" },
		]
	}]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 400px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>