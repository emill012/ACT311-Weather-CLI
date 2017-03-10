<?php
echo "\n\n\n---------------------\n\n";
$space = " \n";
include_once 'wukey.php';
$key = $wuKey;
//$key = getenv("WUKEY");
echo "Enter a city:\n";
$city = readline();
echo "Enter a state:\n";
$state = readline();
$query = "http://api.wunderground.com/api/$key/geolookup/conditions/q/$state/$city.json";

$json_string = file_get_contents($query);
$weatherObject = json_decode($json_string);
	$temperature_string = $weatherObject->{'current_observation'}->{'temperature_string'};
	$display_location = $weatherObject->{'current_observation'}->{'display_location'}->{'full'};
	$display_location_zip = $weatherObject->{'current_observation'}->{'display_location'}->{'zip'};
	$weather_conditions = $weatherObject->{'current_observation'}->{'weather'};
	$wind = $weatherObject->{'current_observation'}->{'wind_string'};
	$precipitation_today = $weatherObject->{'current_observation'}->{'precip_today_string'};
	$forecast_url = $weatherObject->{'current_observation'}->{'forecast_url'};
	$observ_loc_full = $weatherObject->{'current_observation'}->{'observation_location'}->{'full'};
	$observ_time = $weatherObject->{'current_observation'}->{'observation_time'};
echo "Weather Conditions in $display_location $display_location_zip\n";
echo "	Conditions: $weather_conditions\n";
echo "	Temperature: $temperature_string\n";
echo "	Wind: $wind\n";
echo "	Precipitation Today: $precipitation_today\n";
echo "	Forecast: $forecast_url\n";
echo "Observation Location: $observ_loc_full ('$observ_time')\n";
echo $space;

echo "Data provided by Weather Underground - https://www.wunderground.com/";
echo $space;
echo "Logo URL: http://icons.wxug.com/graphics/wu2/logo_130x80.png";
echo $space;
?>