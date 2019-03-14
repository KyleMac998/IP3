<main class="container text-center">
    <h1 class="display-1">Weather Page</h1>

      <form class="form-inline" method="post">
          <div class="form-group mx-auto my-5">
            <label for="location"> Search </label>
            <input type="text" class="form-control" id="location" placeholder="location or coordinates" name="location">
            <button class="btn btn-primary" type="submit">Search</button>
          </div>
      </form>

      <?php

            if( isset($_POST['location']))
             {
               if ($location_data->status==='ok')
               {

                 echo '<h2 class="display-5s my-5">Weather for '.$searched_location. '</h2>';
                  require 'partials/currentForecast.php';
                  require 'partials/hourlyForecast.php';
          } else
           {
            echo'<h2> Location not found</h2>';

              }

            }

            ?>


</main>
