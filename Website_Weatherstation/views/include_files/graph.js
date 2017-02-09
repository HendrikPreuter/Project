var dataPoints = [];
var build = true;
var yVal;
var xVal = 0;
var label;

window.onload = function () {
    parseCSV();

    function parseCSV() {
        $.ajax({
            url: "./antarctica.csv",
            dataType: "text",
            async: false,
            success: function (data) {
                var array = Papa.parse(data);
                updateGraph(array.data);
            }
        });
    }

    function initiateGraph(data) {
        for (var i = data.length - 120; i <= data.length - 1; i++) {
            try {
                yVal = parseInt(data[i][3]);
                xVal = xVal + 1;
                label = data[i][2];
            } catch (e) {
                alert("PANIC! in initiategraph" + e + i);
            }
            dataPoints.push({
                y: yVal,
                x: xVal,
                label: label
            });

            while (dataPoints.length > 120) {
                dataPoints.shift();
            }
        }
    }

    function updateGraph(data) {
        if (build == true) {
            build = false;
            initiateGraph(data);
        } else {
            try {
                yVal = parseInt(data[data.length - 1][3]);
                xVal = xVal + 1;
                label = data[data.length - 1][2];
            } catch (e) {
                alert("error in updateGraph" + e + xVal);
            }
        }
        console.log("dataPoints length: ", dataPoints.length);
        while (dataPoints.length > 120) {
            dataPoints.shift();
        }
    }

    var chart = new CanvasJS.Chart("chartContainer", {
        title: {
            text: "South Pole wind speed"
        },
        data: [{
            type: "spline",
            dataPoints: dataPoints
        }],
        axisX: {
            title: "Local Time",
            gridThickness: 2,
            interval: 12,
            intervalType: "hour",
            valueFormatString: "hh TT K",
            labelAngle: -20
        },
        axisY: [{
            title: "Wind speed in m/s"
        }]
    });

    chart.render();

    var updateChart = function () {
        parseCSV();
        try {
            dataPoints.push({
                y: yVal,
                x: xVal,
                label: label
            });
        } catch (e) {
            alert("error while pushing data to dataPoints: " + e);
        }

        chart.options.title.text = "Wind speed at the South Pole";
        chart.render();

    };
    // update chart every thirty seconds
    setInterval(function () {
        updateChart();
    }, 31000);
}