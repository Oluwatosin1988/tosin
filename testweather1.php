<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>WeatherApp</title>
    <style>
    body{
      width:960px;
      margin:0auto;

    }
    userForm{
      padding-top:50px;
    }
    </style>
  </head>
  <body>

   <form class="userForm" name="weatherForm" action="testweather1.php"method="GET">
    <h1>your weather for today</h1>
    City:<input type="text"name="city" placeholder = "city"/> <br/>
    Country:<input type="text"name="country" placeholder = "country"/> <br/>
    <input type="submit" name="submit" value="submit"/>
  </form>
  <br/>
  <hr/>

  <?php
  if(isset($_GET['city']) && isset($_GET['country'])){
    $user_city = $_GET['city'];
    $user_country = $_GET['country'];

    // if statement to check that $user_city and $user_country not empty strings
    $api_url = "http://api.openweathermap.org/data/2.5/weather?q=" . $user_city . "," . $user_country;
    $weather_data = file_get_contents($api_url);

 echo $weather_data;
    $json = json_decode($weather_data, TRUE);
    $user_temp = $json['main']['temp'];
    $user_humidity = $json['main']['humidity'];
    $user_conditions = $json['weather'][0]['main'];
    $user_wind = $json['wind']['speed'];
    $user_wind_direction = $json['wind']['deg'];


echo "<stong> City: </strong>" . $user_city . "<br/>";
echo "<stong> Country: </strong>" . $user_country . "<br/>";
echo "<stong> Humidity: </strong>" . $user_humidity . "<br/>";
echo "<stong> Current conditions: </strong>" . $user_conditions . "<br/>";
echo "<stong> Wind speed: </strong>" . $user_wind . "<br/>";
echo "<stong> Wind direction: </strong>" . $user_wind_direction . "<br/>";
echo "<stong> Current Temperature: </strong>" . $user_temp . "<br/>";


};

?>

<?php
if(isset($GET['Submit'])){
  $data = "data1.json";
  $json_string = json_encode($_GET, JSON_PRETTY_PRINT);
  file_put_contents($data, $json_string,FILE_APPEND);

};
?>
</body>


</html>





















  
