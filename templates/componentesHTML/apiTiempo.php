<?php

$city_name = 'London';
$api_key= '2ec5e2c352e79005fc8960dc22cb7090';

$api_url = 'http://api.openweathermap.org/data/2.5/weather?q='.$city_name.'&appid='.$api_key;

$weather_data = json_decode(file_get_contents($api_url),true);

$temperature = $weather_data['main']['temp'];

$temperature_in_celcius = round($temperature * 273.15);

$temperature_current_weather = $weather_data['weather'][0]['main'];

$temperature_current_weather_description = $weather_data['weather'][0]['description'];

$temperature_current_weather_icon =$weather_data['weather'][0]['icon'];

echo "La temperatura en Écija es de ". $temperature_in_celcius. "grados.";

echo "<img src='http://openweathermap.org/img/wn/".$temperature_current_weather_icon."@2x.png' />";