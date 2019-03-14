<div class="card p-4" style="margin: 0 auto; max-width: 320px;">
  <h2> Current Forecast </h2>

    <h3>  <?php echo find_icon($forecast->currently->icon); ?> </h3>

    <h3 class="display-2"><?php echo celcius($temp_current); ?>&deg;C  </h3>
    <h3> Humidity <?php echo $humidity_current ?>%</h3>
    <p class="lead"><?php echo $summary_current; ?> </p>
    <p class="lead"><?php echo kph($windSpeed_current); ?> <abbr title="Kilometers per Hour">KPH</abbr></p>
  </div>
