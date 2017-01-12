<?php
include 'db.inc.php';
include 'card.php';

$cardId = $_POST["cardId"];
$card;

if(!empty($_POST["cardId"])) {

	//Fetch the card with the chosen cardId
	$st = $app['pdo']->prepare(
			'SELECT cards.cardId, 
					cards.deckId, 
					cards.cardNumber, 
					cards.cardName, 
					cards.suitId, 
					cards.cardDescription, 
					cards.cardImageUrl from cards where cardId = :cardId');

	$array = array (
			'cardId' => $cardId
	);

	$st->execute ( $array );
	
	$row = $st->fetch (PDO::FETCH_ASSOC);
	
	$cardId = $row ['cardId'];
	$deckId = $row ['deckId'];
	$cardNumber = $row ['cardNumber'];
	$cardName = $row ['cardName'];
	$suitId = $row ['suitId'];
	$cardDescription = $row ['cardDescription'];
	$cardImageUrl = $row ['cardImageUrl'];
	

	echo "<div id=\"cardInfo\">
	<div id=\"cardName\">$cardName</div>
	<div id=\"cardImageUrl\"><img src=\"$cardImageUrl\" alt=\"W3Schools.com\" style=\"width:208px;height:284px;\"></div>
	<div id=\"cardDescription\">$cardDescription</div>
	<div style=\"clear: both\"></div>
	</div>";

	}
		
		?>


