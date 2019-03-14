<?php

// test 55.8642,-4.2518

//https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyArOzjdrSzwoqdTDg4ce7HNTlsiW_XxUwk


$location = htmlentities($_POST['location']);

$location = str_replace(' ', '+', $location);



$google_api = 'https://maps.googleapis.com/maps/api/geocode/json?address='.$location.'&key=AIzaSyArOzjdrSzwoqdTDg4ce7HNTlsiW_XxUwk';

$location_data = json_decode(file_get_contents($google_api));

$coordinates = $location_data->results[0]->geometry->location;

$coordinates = $coordinates->lat.','.$coordinates->lng;

$searched_location = $location_data->results[0]
->formatted_address;




$api_url = 'https://api.darksky.net/forecast/d5443fed198ba7aee4ac82d2b12aba5b/'.$coordinates;


$forecast = json_decode(file_get_contents($api_url));

// api stuff, remove "//"// to see variable names on webpage
//echo '<pre>';
//print_r($forecast);
//echo '</pre>';

// current conditions
$temp_current = round($forecast->currently->temperature);
$summary_current = $forecast->currently->summary;
$windSpeed_current = round($forecast->currently->windSpeed);
$humidity_current = $forecast->currently->humidity*100;

//functions
//converting to Celcuis
function celcius($temp)
  {
    return round(($temp-32)*.5556);
  }

// converting mph to KPH

function kph($speed)
{
  return (($speed)*1.6);
}

//finding correct weather icons
function find_icon($icon)
{
    if($icon==='clear-day')
    {
        $weather_icon = '<i class="wi wi-day-sunny"></i>';
       return $weather_icon;
     }
    elseif($icon==='clear-night')
    {
      $weather_icon = '<i class="wi wi-night-clear"></i>';
      return $weather_icon;
    }
    elseif($icon==='rain')
    {
      $weather_icon = '<i class="wi wi-rain"></i>';
      return $weather_icon;
    }
    elseif($icon==='snow')
    {
      $weather_icon = '<i class="wi wi-snowflake-cold"></i>';
      return $weather_icon;
    }
    elseif($icon==='sleet')
    {
      $weather_icon = '<i class="wi wi-sleet"></i>';
      return $weather_icon;
    }
    elseif($icon==='wind')
    {
      $weather_icon = '<i class="wi wi-strong-wind"></i>';
      return $weather_icon;
    }
    elseif($icon==='fog')
    {
      $weather_icon = '<i class="wi wi-fog"></i>';
      return $weather_icon;
    }
    elseif($icon==='cloudy')
    {
      $weather_icon = '<i class="wi wi-cloudy"></i>';
      return $weather_icon;
    }
    elseif($icon==='partly-cloudy-day')
    {
      $weather_icon = '<i class="wi wi-day-cloudy"></i>';
      return $weather_icon;
    }
    elseif($icon==='partly-cloudy-night')
    {
      $weather_icon = '<i class="wi wi-night-alt-cloudy"></i>';
      return $weather_icon;
    }
    else
    {
      $weather_icon = 'i class="wi wi-na"></i>';
      return $weather_icon;
    }
}




//setting time zone based on location of searcher
date_default_timezone_set($forecast->timezone)


?>

<nav class="navbar navbar-default navbar-fixed-top">
<div class="container-fluid">
  <div class="navbar-header">
    <a class="navbar-brand" href="#">IP3</a>
  </div>
  <ul class="nav navbar-nav">
    <li class="active"><a href="index.php">OverView</a></li>
    <li class="active"><a href="EarthQuake.php">EarthQuake Map</a></li>
    <li class="active"><a href="WeatherPage.php">Weather Page</a></li>
  </ul>
</div>
</nav>


<?php require 'partials/header.php' ?>
<?php require 'partials/main.php' ?>
<?php require 'partials/footer.php' ?>
