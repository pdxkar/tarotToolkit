<?php
include 'db.inc.php';
include 'card.php';

$cardId = $_POST["cardId"];
$isReversed = $_POST["isReversed"];

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
		
		echo "<div id=\"cardOfTheDayInfo\">";
		if($isReversed == "reversed"){
			echo "<div id=\"cardOfTheDayNameAndAlignmentContainer\">";
			echo "<div id=\"cardOfTheDayNameReversed\">$cardName</div>";
			echo "<div id=\"cardAlignment\">($isReversed)</div>";
			echo "</div>";
		} else {
			echo "<div id=\"cardOfTheDayNameUpright\" style=\"text-align:center;\">$cardName</div>";
		}
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
	$bulletArray = array(); 
	
	while ($row = $st2->fetch (PDO::FETCH_ASSOC)){
		
		$cardActionBulletText = $row ['cardActionBulletText'];
		$bulletArray[] = $cardActionBulletText;

	}
	
	if(sizeof($bulletArray) > 0){
		//how many bullet points?
		$numberOfBulletPoints = sizeof($bulletArray);
		//width = 100 / number of bullet points (i.e. 4 bullets => 100/4 = width = 25%)
		$widthOfBulletDiv = abs(90/$numberOfBulletPoints);
		
		echo "<div id=\"cardBullets\" >";
		echo "<ul>";
		
		for ($x = 0; $x < $numberOfBulletPoints; $x++){
			echo "<li style=\"width: ";
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
						cardactionbulletdetails.cardactionbulletid ASC,
						cardactionbulletdetails.isbulletlistheader DESC');
		
		$array = array (
				'cardId' => $cardId
		);
		
		$st3->execute ( $array );
		
		echo "<div>";
		echo "<div>";
		echo "<ul>";
	
		while ($row = $st3->fetch (PDO::FETCH_ASSOC)){
	
			$isBulletListHeader = $row ['isBulletListHeader'];
			$cardActionBulletDetailText = $row ['cardActionBulletDetailText'];
			
			if($isBulletListHeader){	
	
				echo "</ul>";
				echo "</div>";
				echo "</div>";
				echo "<div class=\"actionContainer\" style=\"width: ";
				echo $widthOfBulletDiv+2;
				echo "%;\">";
				echo "<div class=\"actionHeader\">";
				echo $cardActionBulletDetailText;
				echo "</div>";
				echo "<div id=\"actionListItem\">";
				echo "<ul>";
			} else {
	
				echo "<li>$cardActionBulletDetailText</li>";
	
			}
		}
		
		echo "</ul>";
		echo "</div>";
		echo "</div>";
		
		echo "<div style=\"clear: both\"></div>";
	}
	
	//Card Description
	//Fetch the card with the chosen cardId
	$st4 = $app['pdo']->prepare(
			'SELECT	cards.cardName,
					cards.cardDescription,
					cards.inReadings,
					cards.cardImageUrl from cards where cardId = :cardId');

	$array = array (
			'cardId' => $cardId
	);

	$st4->execute ( $array );

	$row = $st4->fetch (PDO::FETCH_ASSOC);

	$cardName = $row ['cardName'];
	$cardDescription = $row ['cardDescription'];
	$inReadings = $row ['inReadings'];
	$cardImageUrl = $row ['cardImageUrl'];


	echo "<div id=\"cardInfo\">";
	echo "<div id=\"cardOfTheDayDescription\">";
	if($isReversed == "reversed"){
		echo "<img src=\"$cardImageUrl\" alt=\"W3Schools.com\" style=\"width:208px;height:300px;-moz-transform: scaleY(-1); -webkit-transform: scaleY(-1); transform: scaleY(-1); filter: flipv; \">";
	} else {
	echo "<img src=\"$cardImageUrl\" alt=\"W3Schools.com\" style=\"width:208px;height:300px;\">";
	}
	echo "$cardDescription";
	echo "<br />";
	echo "<br />";
	echo "$inReadings";
	echo "</div>";
	
	//Is the card reversed?  Include an explanation of reversed cards
	$reversedCardsGroupId = 14;
	
	if($isReversed == "reversed"){
		$st6 = $app['pdo']->prepare(
			'SELECT cardGroupName, cardGroupDescription
			FROM cardgroups
			WHERE cardGroupId = :cardGroupId');
		
		$array = array (
				'cardGroupId' => $reversedCardsGroupId
		);
		
		$st6->execute ( $array );


		$row = $st6->fetch (PDO::FETCH_ASSOC);
		
		$cardGroupName = $row ['cardGroupName'];
		$cardGroupDescription = $row ['cardGroupDescription'];
		echo "<div id=\"cardOfTheDayDescription\">";
		echo "<div id=\"groupName\">";
		echo $cardGroupName;
		echo "</div>";
		echo $cardGroupDescription;
		echo "</div>";
	}
	//General Information relevant to the card of the day
	//General Group Information relevant to the card of the day (i.e suit and/or King/Queen etc.
	$st5 = $app['pdo']->prepare(
			'SELECT cardGroupName, cardGroupDescription
			FROM cardsCardGroups
			JOIN cards ON cards.cardId = cardsCardGroups.cardId
			JOIN cardGroups ON cardGroups.cardGroupId = cardsCardGroups.cardGroupId
			WHERE cards.cardId = :cardId');
		
	$array = array (
			'cardId' => $cardId
	);
	
	$st5->execute ( $array );
	
	while ($row = $st5->fetch (PDO::FETCH_ASSOC)){
	
		$cardGroupName = $row ['cardGroupName'];
		$cardGroupDescription = $row ['cardGroupDescription'];
		echo "<div id=\"cardOfTheDayDescription\">";
		echo "<div id=\"groupName\">";
		echo $cardGroupName;
		echo "</div>";
		echo $cardGroupDescription;
		echo "</div>";
	
	}
	

	echo "</div>";
	echo "<div style=\"clear: both\"></div>";
	echo "</div>";
	echo "</div>";
	echo "</div>";
}

?>