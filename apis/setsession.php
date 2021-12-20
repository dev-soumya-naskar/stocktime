<?php session_start(); ?>
<?php

	echo $BUFFERVAR = $_REQUEST["BUFFERVAR"];	
	$_SESSION["BUFFERVAR"] = $BUFFERVAR;

?>