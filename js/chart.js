// Load the Visualization API and the piechart package.
google.charts.load('current', {'packages':['corechart']});
      
// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawChart);
  
function drawChart() {
  var cssClassNames = {
      
  }

  var jsonData = $.ajax({
      url: "charts/getTransactionData.php",
      dataType: "json",
      async: false
      }).responseText;
      
  // Create our data table out of JSON data loaded from server.
  var data = new google.visualization.DataTable(jsonData);

  // Set chart options
    var options = {
        width: 300,
        height: 250,
        titleTextStyle: {
            fontSize: 14,
            bold: true,
        },
        title: 'Aantal transacties per dag',
            subtitle: 'van de afgelopen 7 dagen',
        fontName: "Roboto",
        fontSize: 14,
        bold: false,
        colors:['#37A1FB'],
        legend: {
            position: 'none'
        },
        series: { //Create 2 separate series to fake what you want. One for the line             and one for the points
            0: {
                lineWidth: 3,
                lineDashStyle: [4, 4],
                pointSize: 10
            }
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
  var chart = new google.visualization.AreaChart(document.getElementById('pie-chart-div'));
  chart.draw(data, options);
}
