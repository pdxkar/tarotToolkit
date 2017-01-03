<!DOCTYPE html>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="displayCard.js"></script>
</head>
<body>

<?php
	$user_name = "root";
	$password = "";
	$database = "tarottool";
	$server = "127.0.0.1";
	
	$db_handle = mysqli_connect($server, $user_name, $password);
	$db_found = mysqli_select_db($db_handle, $database);
	
	if ($db_found) {
		$SQL = "SELECT * FROM cards";
		$result = mysqli_query($db_handle, $SQL);
		
		while ( $db_field = mysqli_fetch_assoc($result) ) {
		
		print $db_field['cardId'] . "<BR>";
		print $db_field['cardNumber'] . "<BR>";
		print $db_field['cardName'] . "<BR>";
		print $db_field['cardSuit'] . "<BR>";
		print $db_field['cardDescription'] . "<BR>";
		print $db_field['cardImageUrl'] . "<BR>";
	}
	
	mysqli_close($db_handle);
	
	}
	else {
		print "Database NOT Found ";
		mysql_close($db_handle);
	}
?>

	<h1>Celtic Cross Position 1</h1>
	<img src="celticCrossSpread_pos1.jpg" alt="celticCrossSpreadPosition1" style="width:304px;height:228px;">
		<div class="centered">
			<div id="bulletPoints">
			    <ul class="left">
				    <li>HEART OF THE MATTER</li>
				    <li>PRESENT ENVIRONMENT (OUTER)</li>
				</ul>
				<ul class="right">
				    <li>PRESENT ENVIRONMENT (INNER)</li>
				    <li>PRIMARY FACTOR</li>
			    </ul>
			</div>
			
			<div class="leftColumn">
				<p>Heart of the Matter</p>
					<ul class="noBullet">
						<li>central issue</li>
						<li>major concern</li>
						<li>basic worry or upset</li>
						<li>primary focus</li>
						<li>focal point</li>
						<li>fundamental problem</li>
					</ul>
				<p>Present Environment (Outer)</p>
					<ul class="noBullet">
						<li>“that which covers you” —traditional</li>
						<li>surrounding circumstances</li>
						<li>immediate problem at hand</li>
						<li>what’s going on around you</li>
						<li>what you’re dealing with</li>
						<li>external factors</li>
					</ul>
			</div>
			<div class="rightColumn">
				<p>Present Environment (Inner)</p>
					<ul class="noBullet">
						<li>internal factors</li>
						<li>how you feel about the situation</li>
						<li>key personal quality</li>
						<li>basic state of mind</li>
						<li>emotional state</li>
						<li>what’s going on inside of you</li>
					</ul>
				<p>Primary Factor</p>
					<ul class="noBullet">
						<li>major influence</li>
						<li>dominant characteristic</li>
						<li>outstanding feature</li>
						<li>most important element</li>
						<li>most striking quality</li>
					</ul>
			</div>
		</div>
	<div class="centered">
	<p>Select the card in your Celtic Cross' position 1:</p>
	<form>
	    <select name="optone" id="deckSel" size="1">
	        <option value="" selected="selected">Select Deck</option>
	    </select>
	    <br>
	    <br>
	    <select name="opttwo" id="suitSel" size="1">
	        <option value="" selected="selected">Please select Deck first</option>
	    </select>
	    <br>
	    <br>
	    <select name="optthree" id="cardSel" size="1">
	        <option value="xxx" selected="selected">Please select Suit first</option>
	    </select>
	    <br/>
	    <input type="button" onclick="getOption()" value="Click xxx Me!">
	</form>
	<p id="theCard"></p>
	</body>
</html>