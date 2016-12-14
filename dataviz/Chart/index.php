<!DOCTYPE html>
<!-- All Rights Reserved! -->
<html>
<head>
<title>My Chart Tests</title>
<script src="assets/js/Chart.js"></script> <!-- This library occupies a global variable of `Chart`; Futher documentation under http://www.chartjs.org/docs/ -->
<style type="text/css">
	.canvas-container {
		text-align: center;
	}

	.canvas-holder {
    	width: 400px;
    	margin-top: 50px;
    	text-align: center;
    	display: inline-block;
	}
</style>
</head>
<body>
<div class="canvas-container">
	<div class="canvas-holder">
		<canvas id="linc-chart" width="300" height="300"></canvas>
	</div>
	<div class="canvas-holder">
		<canvas id="pie-chart" width="300" height="300"/>
	</div>
	<div class="canvas-holder">
		<canvas id="bar-chart" width="300" height="300"/>
	</div>
	<div class="canvas-holder">
		<canvas id="doughnut-chart" width="300" height="300"/>
	</div>
	<div class="canvas-holder">
		<canvas id="polar-chart" width="300" height="300"/>
	</div>
	<div class="canvas-holder">
		<canvas id="radar-chart" width="300" height="300"/>
	</div>
</div>

<script type="text/javascript">
	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

	var lineChartData = {
		labels : ["January","February","March","April","May","June","July"],
		datasets : [
			{
				label: "My First dataset",
				fillColor : "rgba(220,220,220,0.2)",
				strokeColor : "rgba(220,220,220,1)",
				pointColor : "rgba(220,220,220,1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(220,220,220,1)",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			},
			{
				label: "My Second dataset",
				fillColor : "rgba(151,187,205,0.2)",
				strokeColor : "rgba(151,187,205,1)",
				pointColor : "rgba(151,187,205,1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(151,187,205,1)",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			}
		]
	}

	var pieData = [
			{
				value: 300,
				color:"#F7464A",
				highlight: "#FF5A5E",
				label: "Red"
			},
			{
				value: 50,
				color: "#46BFBD",
				highlight: "#5AD3D1",
				label: "Green"
			},
			{
				value: 100,
				color: "#FDB45C",
				highlight: "#FFC870",
				label: "Yellow"
			},
			{
				value: 40,
				color: "#949FB1",
				highlight: "#A8B3C5",
				label: "Grey"
			},
			{
				value: 120,
				color: "#4D5360",
				highlight: "#616774",
				label: "Dark Grey"
			}

	];

	var barChartData = {
		labels : ["January","February","March","April","May","June","July"],
		datasets : [
			{
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,0.8)",
				highlightFill: "rgba(220,220,220,0.75)",
				highlightStroke: "rgba(220,220,220,1)",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			},
			{
				fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,0.8)",
				highlightFill : "rgba(151,187,205,0.75)",
				highlightStroke : "rgba(151,187,205,1)",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			}
		]
	}

	var doughnutData = [
			{
				value: 300,
				color:"#F7464A",
				highlight: "#FF5A5E",
				label: "Red"
			},
			{
				value: 50,
				color: "#46BFBD",
				highlight: "#5AD3D1",
				label: "Green"
			},
			{
				value: 100,
				color: "#FDB45C",
				highlight: "#FFC870",
				label: "Yellow"
			},
			{
				value: 40,
				color: "#949FB1",
				highlight: "#A8B3C5",
				label: "Grey"
			},
			{
				value: 120,
				color: "#4D5360",
				highlight: "#616774",
				label: "Dark Grey"
			}

	];

	var polarData = [
			{
				value: 300,
				color:"#F7464A",
				highlight: "#FF5A5E",
				label: "Red"
			},
			{
				value: 50,
				color: "#46BFBD",
				highlight: "#5AD3D1",
				label: "Green"
			},
			{
				value: 100,
				color: "#FDB45C",
				highlight: "#FFC870",
				label: "Yellow"
			},
			{
				value: 40,
				color: "#949FB1",
				highlight: "#A8B3C5",
				label: "Grey"
			},
			{
				value: 120,
				color: "#4D5360",
				highlight: "#616774",
				label: "Dark Grey"
			}
	];

	var radarChartData = {
		labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
		datasets: [
			{
				label: "My First dataset",
				fillColor: "rgba(220,220,220,0.2)",
				strokeColor: "rgba(220,220,220,1)",
				pointColor: "rgba(220,220,220,1)",
				pointStrokeColor: "#fff",
				pointHighlightFill: "#fff",
				pointHighlightStroke: "rgba(220,220,220,1)",
				data: [65,59,90,81,56,55,40]
			},
			{
				label: "My Second dataset",
				fillColor: "rgba(151,187,205,0.2)",
				strokeColor: "rgba(151,187,205,1)",
				pointColor: "rgba(151,187,205,1)",
				pointStrokeColor: "#fff",
				pointHighlightFill: "#fff",
				pointHighlightStroke: "rgba(151,187,205,1)",
				data: [28,48,40,19,96,27,100]
			}
		]
	};

	window.onload = function(){
		var ctxLine = document.getElementById("linc-chart").getContext("2d");
		window.myLine = new Chart(ctxLine).Line(lineChartData, {
			responsive: true
		});

		var ctxPie = document.getElementById("pie-chart").getContext("2d");
		window.myPie = new Chart(ctxPie).Pie(pieData);

		var ctxBar = document.getElementById("bar-chart").getContext("2d");
		window.myBar = new Chart(ctxBar).Bar(barChartData, {
			responsive : true
		});

		var ctxDoughnut = document.getElementById("doughnut-chart").getContext("2d");
		window.myDoughnut = new Chart(ctxDoughnut).Doughnut(doughnutData, {
			responsive : true
		});

		var ctxPolar = document.getElementById("polar-chart").getContext("2d");
		window.myPolarArea = new Chart(ctxPolar).PolarArea(polarData, {
			responsive:true
		});

		var ctxRadar = document.getElementById("radar-chart").getContext("2d");
		window.myRadar = new Chart(ctxRadar).Radar(radarChartData, {
			responsive: true
		});
	}
</script>
<script src="/global.js"></script>
</body>
</html>