<?php 
    include 'include_files/login_header.php';
    include 'include_files/footer.php'; 
    include 'include_files/Navigation.php';
?>
   
    


<body class="body">
<script src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer", {
		title:{
			text: "CHART 1"              
		},
		data: [              
		{
			// Change type to "doughnut", "line", "splineArea", etc.
			type: "column",
			dataPoints: [
				{ label: "apple",  y: 10  },
				{ label: "orange", y: 15  },
				{ label: "banana", y: 25  },
				{ label: "mango",  y: 30  },
				{ label: "grape",  y: 28  }
			]
		}
		]
	});
	chart.render();

}


</script>
<table class="table1">
                <?php      include './include_files/Table.php';?>
</table>

<div class="container">
	<div class="leftbody">
		<div id="chartContainer" class="chart_container" "></div>
	</div>





</body>