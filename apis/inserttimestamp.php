<?php date_default_timezone_set("Asia/Kolkata"); ?> 
<?php include "connect_input.php"; ?> 

<?php

	$currentdate = "09-12-2021";
	$timestamp = strtotime($currentdate);	
	$enlistdate = date("d-m-Y");

	
	echo "Today's Date $currentdate.";	echo "<br>";
	
	
	
	//check timestamp exists or not
	$sql_chktimestampdate = "SELECT * FROM `nsedb_timestamplist` WHERE `timestamplist_formatteddate` = '$currentdate'";					
	$retval_chktimestampdate = mysqli_query($con, $sql_chktimestampdate);
	$chktimestampdate = mysqli_num_rows($retval_chktimestampdate);
	
	if($chktimestampdate > 0)
	{		
		echo "Today's Date Timestamps already exists.";
	}
	else
	{
		echo "The Day 9:15 Timestamp starts with $timestamp.";	echo "<br>";

		$x = 1;
		$y = $timestamp + 33300;
		 
		 
		while($x <= 40) 	//while($x <= 377)
		{
		  echo $y."<br>";

			$sql2 = "INSERT INTO `nsedb_timestamplist` (`timestamplist_serial`, `timestamplist_timestamp`, `timestamplist_point`, `timestamplist_formatteddate`, `timestamplist_status`, `timestamplist_enlistdate`) VALUES (NULL, '$y', '$x', '$currentdate', '0', '$enlistdate')";
			$retval2 = mysqli_query($con, $sql2);
		  
		  $x+=1;	$y+=60; 
		}
	}








?>	