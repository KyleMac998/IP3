<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <title>My Chart.js Chart</title>
      <A HREF="bubble.php">Bubble Chart</A>
      <A HREF="d3_test.php">Bar Chart</A>
  </head>
  <body>
    <div class="container" style="position:absolute; top:100px; left:150px; width:1000px; height:400px;">
        <canvas id="myChart"></canvas>
    </div>
    <script>
      let myChart= document.getElementById('myChart').getContext('2d');

      let GDPChart = new Chart(myChart, {
        type: 'horizontalBar', //bar,horizontalBar, pie, line
        data:{
          labels:['White', 'American American', 'Asian', 'Hispanic/Latino', 'All Races/Decents',],
          datasets:[{
            label:'Men',
            data:['971','710','1207','690','941'],
            backgroundColor:
              'rgba(173, 216, 230, 0.6)'
          },
          {
            label:'Women',
            data:['795','657','903','603','770'],
            backgroundColor:
              'rgba(255, 192, 203, 0.6)'
          }
          ]
        },
        options: {
          title: {
            display: true,
            text: 'USA Pay Gap Between Genders 2009'
          }, scales: {
            yAxes: [{
              scaleLabel: {
                display: true,
                labelString: "Race/Ethinicity"
              }
            }],
            xAxes: [{
              scaleLabel: {
                display: true,
                labelString: "Wage ($)"
              }
            }]
          }
        }
      });
    </script>
  </body>
</html>
