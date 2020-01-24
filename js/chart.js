// Load the Visualization API and the piechart package.
google.charts.load('current', {'packages':['line']});
      
// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawChart);
  
function drawChart() {
  var jsonData = $.ajax({
      url: "charts/getTransactionData.php",
      dataType: "json",
      async: false
      }).responseText;
      
  // Create our data table out of JSON data loaded from server.
  var data = new google.visualization.DataTable(jsonData);

  // Set chart options
    var options = {
        width: 600,
        height: 300,
        legend: {
            position: 'none'
        },
        series: {
            1: { 
                pointShape: 'circle',
                lineDashStyle: [4, 4],
                lineWidth: 4,
                pointSize: 30,
            },
        },
        chart: {
            title: 'Aantal transacties per dag',
            subtitle: 'van de afgelopen 7 dagen',
            curveType: 'function',
        },
        animation:{
            duration: 1000,
            easing: 'out',
            startup: true
        },
        annotations: {
            boxStyle: {
              // Color of the box outline.
              stroke: '#888',
              // Thickness of the box outline.
              strokeWidth: 1,
              // x-radius of the corner curvature.
              rx: 10,
              // y-radius of the corner curvature.
              ry: 10,
              // Attributes for linear gradient fill.
              gradient: {
                // Start color for gradient.
                color1: '#fbf6a7',
                // Finish color for gradient.
                color2: '#33b679',
                // Where on the boundary to start and
                // end the color1/color2 gradient,
                // relative to the upper left corner
                // of the boundary.
                x1: '0%', y1: '0%',
                x2: '100%', y2: '100%',
                // If true, the boundary for x1,
                // y1, x2, and y2 is the box. If
                // false, it's the entire chart.
                useObjectBoundingBoxUnits: true
              }
            }
          }
    };

  // Instantiate and draw our chart, passing in some options.
  var chart = new google.charts.Line(document.getElementById('pie-chart-div'));
  chart.draw(data, google.charts.Line.convertOptions(options));
}
