<div class="row">

  <?php

    $i = 0;


    foreach($forecast->hourly->data as $hour):

    ?>

  <div class="col-3 col-md-2">
    <div class"card p-4 mb-7">
    <h2 class="h4">
   <?php echo date("g:i a", $hour->time);  ?>
 </h2>
  <div class="d-flex justify-content-between">
      <h3 class="h4">
     <?php echo celcius($hour->temperature);?>  &deg;
   </h3>
      <h3 class="h4">
          <?php echo find_icon($hour->icon); ?>
      </h3>
</div>

   <p class="lead">
  <abbr title="Feels like">feels like <?php echo celcius($hour->apparentTemperature);?>  &deg;</li>
</p>
<p class="lead">
  <?php echo $hour->summary ?>
</p>
</div>
</div>

  <?php

  $i++;

  if($i==12) break;

  //ending loop
endforeach;
?>

</div>
