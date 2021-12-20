<?php
$username = "root";
$password = "";
$hostname = "localhost"; 

/*
//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");


//select a database to work with
$selected = mysql_select_db("onedb",$dbhandle) 
  or die("Could not select examples");
*/
$con=mysqli_connect($hostname,$username,$password,"nsedb");


$con->query('set character_set_client=utf8');
$con->query('set character_set_connection=utf8');
$con->query('set character_set_results=utf8');
$con->query('set character_set_server=utf8');


?>



<?php //include "timeago.php"; ?> 