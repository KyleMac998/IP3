<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <title>My Chart.js Chart</title>
      <A HREF="bubble.php">Bubble Chart</A>
      <A HREF="barchart2.php">Horizontal Bar Chart</A>
  </head>
  <body>
    <div class="container" style="position:absolute; top:100px; left:150px; width:1000px; height:400px;">
        <canvas id="myChart"></canvas>
    </div>



    <script>
      let myChart= document.getElementById('myChart').getContext('2d');

      let GDPChart = new Chart(myChart, {
        type: 'bar', //bar,horizontalBar, pie, line
        data:{
          labels:['USA', 'CHN', 'JPN', 'DEU', 'IND', 'FRA', 'BRA', 'ITA', 'CAN', 'RUS'],
          datasets:[{
            label:'GDP',
            data:[
              19390604,
              12237700,
              4872137,
              3677439,
              2600818,
              2582501,
              2055506,
              1934798,
              1653043,
              1577524
            ],
            backgroundColor:
              'rgba(255, 99, 132, 0.6)'
          }]
        },
        options:{}
      });
    </script>
  </body>
</html>
