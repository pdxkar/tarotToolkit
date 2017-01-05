
<?php
		$user_name = "root";
		$password = "";
		$database = "tarottool";
		$server = "127.0.0.1";
		
		$db_handle = mysqli_connect($server, $user_name, $password);
		$db_found = mysqli_select_db($db_handle, $database);
		
		$majorArcanaCards = [];
		$pentacleCards = [];
		$cupCards = [];
		$wandCards = [];
		$swordCards = [];
		
		if ($db_found) {
			$SQL = "SELECT * FROM cards";
			$result = mysqli_query($db_handle, $SQL);
			
			while ( $db_field = mysqli_fetch_assoc($result) ) {
				
				$suit = $db_field['cardSuit'];
				
				switch ($suit) {
					case 1:
						//code to be executed if n=label1;
						//print $db_field['cardName'] . " is major arcana.<BR>";
						//$majorArcanaCards[] = $db_field['cardName'];
						array_push($majorArcanaCards,$db_field['cardName']);
						break;
					case 2:
						//code to be executed if n=label2;
						//print $db_field['cardName'] . " is a pentacle.<BR>";
						//$pentacleCards[] = $db_field['cardName'];
						array_push($pentacleCards,$db_field['cardName']);
						break;
					case 3:
						//code to be executed if n=label3;
						//print $db_field['cardName'] . " is a cup.<BR>";
						//$cupCards[] = $db_field['cardName'];
						array_push($cupCards,$db_field['cardName']);
						break;
					case 4:
						//code to be executed if n=label3;
						//print $db_field['cardName'] . " is a wand.<BR>";
						//$wandCards[] = $db_field['cardName'];
						array_push($wandCards,$db_field['cardName']);
						break;
					case 5:
						//code to be executed if n=label3;
						//print $db_field['cardName'] . " is a sword.<BR>";
						array_push($swordCards,$db_field['cardName']);
						//$swordCards[] = $db_field['cardName'];
						break;
					default:
						//	code to be executed if n is different from all labels;
						print $db_field['cardName'] . " has a weird suit.<BR>";
				}
				
				
			
			//	print $db_field['cardId'] . "<BR>";
			//	print $db_field['cardName'] . "<BR>";
			//	print $db_field['cardSuit'] . "<BR>";

		}
		
		mysqli_close($db_handle);
		
		}
		else {
			print "Database NOT Found ";
			mysql_close($db_handle);
		}
	?>
	

