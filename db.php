<?php
	$user_name = "root";
	$password = "";
	$database = "tarottool";
	$server = "127.0.0.1";
	
	$db_handle = mysql_connect($server, $user_name, $password);
	$db_found = mysql_select_db($database, $db_handle);
	
	if ($db_found) {
		$SQL = "SELECT * FROM cards";
		$result = mysql_query($SQL);
		
		while ( $db_field = mysql_fetch_assoc($result) ) {
		
		print $db_field['cardId'] . "<BR>";
		print $db_field['cardNumber'] . "<BR>";
		print $db_field['cardName'] . "<BR>";
		print $db_field['cardSuit'] . "<BR>";
		print $db_field['cardDescription'] . "<BR>";
		print $db_field['cardImageUrl'] . "<BR>";
	}
	
	mysql_close($db_handle);
	
	}
	else {
		print "Database NOT Found ";
		mysql_close($db_handle);
	}
?>