<?php date_default_timezone_set("Asia/Kolkata"); ?> 
<?php include "connect_input.php"; ?> 
<?php include "jsapifetchdata.php"; ?> 
<?php


	$sql1 = "SELECT * FROM `nsedb_timestamplist` WHERE `timestamplist_status` = '0'";
	$retval1 = mysqli_query($con, $sql1);

	while($row1 = mysqli_fetch_assoc($retval1))
	{	
		echo	"Timestamp ".$fetchtimestamp = $row1['timestamplist_timestamp'];			echo "<br>";
		echo	"Timepoint ".$timepoint = $row1['timestamplist_point'];			echo "<br>";
			

		if(strtotime("now") >= $row1['timestamplist_timestamp'])
		{	
			$sql2 = "SELECT * FROM `nsedb_stockname` WHERE `stockname_status` = '1'";
			$retval2 = mysqli_query($con, $sql2);
			
			while(($row2 = mysqli_fetch_assoc($retval2)))
			{	
				$stockkey[] = $row2['stockname_stockkey'];	
			}
			
			JSclosingpricepoint($fetchtimestamp, $stockkey, $timepoint);
			$stockkey = array();			
			
		}
		else
		{
			echo "Wait";	echo "<br>";
		}
		
		if(strtotime("now") >= $row1['timestamplist_timestamp'])
		{		
			$sql3 = "UPDATE `nsedb_timestamplist` SET `timestamplist_status` = '1' WHERE `timestamplist_point` = '$timepoint';";
			$retval3 = mysqli_query($con, $sql3);
		}
	}

?>
