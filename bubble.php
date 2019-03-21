<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <title>My Chart.js Chart</title>
      <A HREF="d3_test.php">Bar Chart</A>
      <A HREF="barchart2.php">Horizontal Bar Chart</A>
  </head>
  <body>
    <div class="container" style="position:absolute; top:100px; left:150px; width:1000px; height:400px;">
        <canvas id="bubble-chart" ></canvas>
    </div>

    <script>
    new Chart(document.getElementById("bubble-chart"), {
  type: 'bubble',
  data: {
    labels: "Africa",
    datasets: [
      {
        //x= GDP, y=happiness, r=population
        label: ["USA"],
        backgroundColor: "rgba(255,221,50,0.2)",
        borderColor: "rgba(255,221,50,1)",
        data: [{
          x: 19390604,
          y: 7,
          r: 32.9
        }]
      }, {
        label: ["China"],
        backgroundColor: "rgba(60,186,159,0.2)",
        borderColor: "rgba(60,186,159,1)",
        data: [{
          x: 12237700,
          y: 5.3,
          r: 142
        }]
      }, {
        label: ["Japan"],
        backgroundColor: "rgba(0,0,0,0.2)",
        borderColor: "#000",
        data: [{
          x: 4872137,
          y: 5.9,
          r: 12.6
        }]
      }, {
        label: ["India"],
        backgroundColor: "rgba(9,174,80)",
        borderColor: "#000",
        data: [{
          x: 2600818,
          y: 4.3,
          r: 13.6
        }]
      }, {
        label: ["France"],
        backgroundColor: "rgba(248,6,14)",
        borderColor: "#000",
        data: [{
          x: 2582501,
          y: 6.4,
          r: 6.5
        }]
      }, {
        label: ["Brazil"],
        backgroundColor: "rgba(205,114,98)",
        borderColor: "#000",
        data: [{
          x: 2055506,
          y: 6.6,
          r: 21.2
        }]
      }, {
        label: ["Italy"],
        backgroundColor: "rgba(27,176,214)",
        borderColor: "#000",
        data: [{
          x: 1934798,
          y: 6,
          r: 5.9
        }]
      }, {
        label: ["Canada"],
        backgroundColor: "rgba(27,176,214)",
        borderColor: "#000",
        data: [{
          x: 31952.98,
          y: 7.3,
          r: 5.9
        }]
      }, {
        label: ["Russia"],
        backgroundColor: "rgba(228,241,77)",
        borderColor: "#000",
        data: [{
          x: 1577524,
          y: 6,
          r: 14.3
        }]
      }, {
        label: ["Germany"],
        backgroundColor: "rgba(193,46,12,0.2)",
        borderColor: "rgba(193,46,12,1)",
        data: [{
          x: 3677439,
          y: 7,
          r: 8.2
        }]
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'GDP, Happiness and Population of 10 countries'
    }, scales: {
      yAxes: [{
        scaleLabel: {
          display: true,
          labelString: "Happiness"
        }
      }],
      xAxes: [{
        scaleLabel: {
          display: true,
          labelString: "GDP per capita"
        }
      }]
    }
  }
});
    </script>
  </body>
</html>
