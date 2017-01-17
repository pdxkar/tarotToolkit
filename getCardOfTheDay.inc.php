<?php
include 'db.inc.php';
include 'card.php';

$cardId = $_POST["cardId"];

if(!empty($_POST["cardId"])) {
	
	//Get and display Card name
	$st1 = $app['pdo']->prepare(
			'SELECT cards.cardName
					from cards
					WHERE cards.cardId = :cardId');
			
	$array = array ('cardId' => $cardId	);
	
	$st1->execute ( $array );
	while ($row = $st1->fetch (PDO::FETCH_ASSOC)){
		
		$cardName = $row ['cardName'];
		
		echo "<div id=\"cardInfo\">
		<div id=\"cardOfTheDayName\">$cardName</div>
		</div>";
	}
	
	//Bullet Points
	//get the bullet points from the cardactionbullets table
	$st2 = $app['pdo']->prepare(
			'SELECT cardactionbullets.cardActionBulletText
					from cardactionbullets
					WHERE cardactionbullets.cardId = :cardId
					ORDER BY
					cardactionbullets.cardActionBulletId');
	
	$array = array (
			'cardId' => $cardId
	);
	
	$st2->execute ( $array );
	
	//put the bullet points into an array so that they can be counted
	//declare the bullet point array
	$bulletArray; 
	

	
	while ($row = $st2->fetch (PDO::FETCH_ASSOC)){
		
		$cardActionBulletText = $row ['cardActionBulletText'];
		$bulletArray[] = $cardActionBulletText;

	}
	
	//how many bullet points?
	$numberOfBulletPoints = sizeof($bulletArray);
	//width = 100 / number of bullet points (i.e. 4 bullets => 100/4 = width = 25%)
	$widthOfBulletDiv = abs(90/$numberOfBulletPoints);
	
	echo "<div id=\"cardBullets\" >";
	echo "<ul>";
	
	for ($x = 0; $x < $numberOfBulletPoints; $x++){
		//echo "<li>$bulletArray[$x]</li>";
		echo "<li style=\"width: ";
		//echo "30%;";
		echo $widthOfBulletDiv;
		echo "%;\">";
		echo "$bulletArray[$x]</li>";
	}
	
	echo "</ul>";
	echo "</div>";

	echo "<div style=\"clear: both\"></div>";
	
	//Actions
	//get all of the bullet details associated with this card Id
	$st3 = $app['pdo']->prepare(
			'SELECT cardactionbulletdetails.isBulletListHeader,
					cardactionbulletdetails.cardActionBulletDetailText
					from cardactionbulletdetails
					WHERE cardactionbulletdetails.cardId = :cardId
					ORDER BY 
					cardactionbulletdetails.cardactionbulletdetailid');
	
	$array = array (
			'cardId' => $cardId
	);
	
	$st3->execute ( $array );
	while ($row = $st3->fetch (PDO::FETCH_ASSOC)){

		$isBulletListHeader = $row ['isBulletListHeader'];
		$cardActionBulletDetailText = $row ['cardActionBulletDetailText'];
		
		if($isBulletListHeader){	
			echo "<div>
			<div><h3>$cardActionBulletDetailText</h3></div>
			<div style=\"clear: both\"></div>
			</div>";
		} else {
			echo "<div>
			<div>$cardActionBulletDetailText</div>
			<div style=\"clear: both\"></div>
			</div>";
		}
	}
	
	//Card Description
	//Fetch the card with the chosen cardId
	$st4 = $app['pdo']->prepare(
			'SELECT	cards.cardName,
					cards.cardDescription,
					cards.cardImageUrl from cards where cardId = :cardId');

	$array = array (
			'cardId' => $cardId
	);

	$st4->execute ( $array );

	$row = $st4->fetch (PDO::FETCH_ASSOC);

	$cardName = $row ['cardName'];
	$cardDescription = $row ['cardDescription'];
	$cardImageUrl = $row ['cardImageUrl'];


	echo "<div id=\"cardInfo\">
	<div>Description</div>
	<div id=\"cardImageUrl\"><img src=\"$cardImageUrl\" alt=\"W3Schools.com\" style=\"width:208px;height:300px;\"></div>
	<div id=\"cardDescription\">$cardDescription</div>
	<div style=\"clear: both\"></div>
	</div>";

}

?>