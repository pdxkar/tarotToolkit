<?php
    include 'db.inc.php';

	//$st = $app['pdo']->prepare('SELECT recipeid,title,poster,shortdesc from recipes order by recipeid desc limit 0,5');
	
    //Fetches all the Decks
    $st = $app['pdo']->prepare('SELECT deckId, deckName from decks order by deckId desc limit 0,100');
    $st->execute();
    $resultDecks = $st->fetchAll();
    
    //Fetches all the suits
  //  $st = $app['pdo']->prepare('SELECT suitId, deckId, suitName from suits where deckId = $deckId order by suitId desc limit 0,100');
   // $st->execute();
  //  $resultSuits = $st->fetchAll();
    
    //Fetches all the cards
    $st = $app['pdo']->prepare('SELECT cardId, deckId, cardNumber, cardName, suitId, cardDescription, cardImageUrl from cards order by cardId desc limit 0,100');
	$st->execute();
	$resultCard = $st->fetchAll(); 
	
	
	
	//Cards
// 	$majorArcanaCards = [];
// 	$pentacleCards = [];
// 	$cupCards = [];
// 	$wandCards = [];
// 	$swordCards = [];
	
	//is this unnecessary?
		//$titles = array();
/* 	while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
		$app['monolog']->addDebug('Row ' . $row['cardName']);
		
		//is this unnecessary?
		//$titles[] = $row;
		
		$cardId = $row['cardId'];
		$cardNumber = $row['cardNumber'];
		$cardName = $row['cardName'];
		$cardSuit = $row['cardSuit'];
		$cardDescription = $row['cardDescription'];
		$cardImageUrl = $row['cardImageUrl'];
		
		switch ($cardSuit) {
			case 1:
				//code to be executed if n=label1;
				//print $db_field['cardName'] . " is major arcana.<BR>";
				//$majorArcanaCards[] = $db_field['cardName'];
				//array_push($majorArcanaCards,$db_field['cardName']);
				array_push($majorArcanaCards,$cardName);
				break;
			case 2:
				//code to be executed if n=label2;
				//print $db_field['cardName'] . " is a pentacle.<BR>";
				//$pentacleCards[] = $db_field['cardName'];
				//array_push($pentacleCards,$db_field['cardName']);
				array_push($pentacleCards,$cardName);
				break;
			case 3:
				//code to be executed if n=label3;
				//print $db_field['cardName'] . " is a cup.<BR>";
				//$cupCards[] = $db_field['cardName'];
				//array_push($cupCards,$db_field['cardName']);
				array_push($cupCards,$cardName);
				break;
			case 4:
				//code to be executed if n=label3;
				//print $db_field['cardName'] . " is a wand.<BR>";
				//$wandCards[] = $db_field['cardName'];
				//array_push($wandCards,$db_field['cardName']);
				array_push($wandCards,$cardName);
				break;
			case 5:
				//code to be executed if n=label3;
				//print $db_field['cardName'] . " is a sword.<BR>";
				//array_push($swordCards,$db_field['cardName']);
				//$swordCards[] = $db_field['cardName'];
				array_push($swordCards,$cardName);
				break;
			default:
				//	code to be executed if n is different from all labels;
				//print $db_field['cardName'] . " has a weird suit.<BR>";
				print $cardName . " has a weird suit.<BR>";
		} */
		
		//diplay data in the web page
		//first create an HTML link
		//echo "<a href=\"index.php?content=showCard&id=$cardId\">$cardName</a> submitted by $cardSuit<br>\n";

	//}

?>