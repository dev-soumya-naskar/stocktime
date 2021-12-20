
<?php

	function closingpricepoint($fetchtimestamp, $stockkey) 
	{

		$fetchtimestamp = $fetchtimestamp;
		$stockkey = $stockkey;

		$apiurl = "https://priceapi.moneycontrol.com/techCharts/techChartController/history?symbol=$stockkey&resolution=1&from=$fetchtimestamp&to=$fetchtimestamp";
		//echo $apiurl;	echo "<br>";

		$geo = file_get_contents($apiurl);
		$geo = json_decode($geo, true); // Convert the JSON to an array

		$obj =  $geo;

		if (isset($obj['t'][0]) && ($obj['c'][0])) 
		{
			$closingvalue = $obj['c'][0];
			return $closingvalue;
		}
		else
		{
			$closingvalue = null;
			return $closingvalue;
		}
	
	}



?>


