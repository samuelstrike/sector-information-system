<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js "></script>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>

	<style type="text/css">
		.box{
			width: 600px;
			margin:0 auto;
		}

	</style>
	<script type="text/javascript">
		var analytics = {!! $status !!}

		google.charts.load('current', {'packages':['corechart']});

		google.charts.setOnLoadCallback(drawChart);

		function drawChart()
		{
			var data=google.visualization.arrayToDataTable(analytics);
			
			var options={

				title: 'Status in percentage',
			    is3D: true,
			}; 
			var chart= new google.visualization.PieChart(document.getElementById('pie_chart'));
			chart.draw(data, options);
		}
	</script>

</head>
<body>
	<br />
	<div class="container">
		<h3 align="center">Status</h3>
		<br />

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Status (%)</h3>
			</div>
			<div class="panel-body">
				<div id="pie_chart" style="width:450px; height:450px;">
					
				</div>
			</div>
		</div>
	</div>

</body>
</html>