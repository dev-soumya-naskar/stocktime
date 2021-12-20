<?php include "connect_input.php"; ?> 
<?php

// get the q parameter from URL
$stockkey = $_REQUEST["key"];
$stockprice = $_REQUEST["price"];
$timestamp = $_REQUEST["stamp"];
$datapoint = $_REQUEST["point"];

	$sql2 = "INSERT INTO `nsedb_livedata` (`livedata_serial `, `livedata_stockkey`, `livedata_stockprice`, `livedata_datapoint`, `livedata_timestamp`, `livedata_formatteddate`) VALUES 
	(NULL, '$stockkey', '$stockprice', '$datapoint', '$timestamp', current_timestamp());";
	$retval2 = mysqli_query($con, $sql2);

?>

